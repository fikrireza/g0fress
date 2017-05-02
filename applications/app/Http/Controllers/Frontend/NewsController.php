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

    	$callNews = News::select('judul_ID as judul', 'deskripsi_ID as deskripsi', 'slug', 'tanggal_post' ,'img_url','img_alt')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->paginate(2);

		$callNewsList = News::select('judul_ID as judul', 'slug', 'tanggal_post')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('tanggal_post', 'desc')->get();

    	return view('frontend.news.index',compact('callNews','callNewsList'));
    }
    function view($slug){

    	$callNews = News::select('judul_ID as judul', 'deskripsi_ID as deskripsi', 'tanggal_post' ,'img_url','img_alt')->where('slug', $slug)->first();
    	// dd($callNews);
    	return view('frontend.news.view',compact('callNews'));
    }

}
