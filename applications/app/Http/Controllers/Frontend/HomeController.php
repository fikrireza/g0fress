<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProgramEvents;
use App\Models\ProdukKategori;
use App\Models\News;

use App;
use DB;
use DateTime;


class HomeController extends Controller
{
    //
    function index(){

    	$items = [];
    	$client = new \GuzzleHttp\Client;
	    $response = $client->get('https://www.instagram.com/dessurya/media');
	    $items = json_decode((string) $response->getBody(), true)['items'];
	    // dd($items);

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

		$callKategory = ProdukKategori::select('nama_kategori', 'slug', 'img_url', 'img_alt')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->get();
        
        if (App::getLocale() == 'id') {

			$callProgramEvent = ProgramEvents::select('judul_promosi_ID as judul', 'img_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('show_homepage', 1)->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->limit(15)->get();

			$callNews = News::select('judul_ID as judul', 'deskripsi_ID as deskripsi', 'slug')->where('show_homepage', 1)->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->limit(6)->get();
    	}

    	elseif (App::getLocale() == 'en') {

    		$callProgramEvent = ProgramEvents::select('judul_promosi_EN as judul', 'img_url', 'img_alt', 'slug', 'deskripsi_ID as deskripsi')->where('show_homepage', 1)->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->limit(15)->get();

			$callNews = News::select('judul_EN as judul', 'deskripsi_EN as deskripsi', 'slug')->where('show_homepage', 1)->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->limit(6)->get();
    	}

	    
	    
    	return view('frontend.home.index',compact('items','callProgramEvent','callKategory','callNews'));
    }
}
