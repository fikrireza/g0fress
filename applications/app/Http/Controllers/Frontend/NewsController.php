<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;

use App;
use DB;
use DateTime;

class NewsController extends Controller
{
    function index(){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

        if (App::getLocale() == 'id') {
            $callNewsJudul = 'judul_ID as judul';
            $callNewsDeskripsi = 'deskripsi_ID as deskripsi';

            $callNewsListJudul = 'judul_ID as judul';
        }
        else if (App::getLocale() == 'en') {
            $callNewsJudul = 'judul_EN as judul';
            $callNewsDeskripsi = 'deskripsi_EN as deskripsi';
            
            $callNewsListJudul = 'judul_EN as judul';
        }

    	$callNews = News::select(
                $callNewsJudul, 
                $callNewsDeskripsi, 
                'slug', 
                'tanggal_post',
                'img_url',
                'img_alt'
            )
            ->where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('id', 'desc')
            ->paginate(2);

		$callNewsList = News::select(
                $callNewsListJudul, 
                'slug', 
                'tanggal_post'
            )
            ->where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('tanggal_post', 'desc')
            ->get();

    	return view('frontend.news.index',compact('callNews','callNewsList'));
    }
    function view($slug){

        if (App::getLocale() == 'id') {
            $callNewsJudul = 'judul_ID as judul';
            $callNewsDeskripsi = 'deskripsi_ID as deskripsi';
        }
        else if (App::getLocale() == 'en') {
            $callNewsJudul = 'judul_EN as judul';
            $callNewsDeskripsi = 'deskripsi_EN as deskripsi';
        }

    	$callNews = News::select(
                $callNewsJudul, 
                $callNewsDeskripsi, 
                'tanggal_post',
                'img_url',
                'img_alt'
            )
            ->where('slug', $slug)
            ->first();

    	return view('frontend.news.view',compact('callNews'));
    }

}
