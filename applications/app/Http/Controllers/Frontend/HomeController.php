<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ProgramEvents;
use App\Models\ProdukKategori;
use App\Models\News;
use App\Models\SliderHome;

use App;
use DB;
use DateTime;


class HomeController extends Controller
{
    function index(){

    	$items = [];
    	$client = new \GuzzleHttp\Client;
	    $response = $client->get('https://www.instagram.com/dessurya/media');
	    $items = json_decode((string) $response->getBody(), true)['items'];

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');
        
        $callSlider = SliderHome::select('img_url', 'img_alt')->where('flag_publish', '1')->orderBy('posisi', 'asc')->get();

		$callKategory = ProdukKategori::select('nama_kategori', 'slug', 'img_url', 'img_alt')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->get();
        
        if (App::getLocale() == 'id') {
            $callProgramEventJudul = 'judul_promosi_ID as judul';
            $callProgramEventDeskripsi = 'deskripsi_ID as deskripsi';
            
            $callNewsJudul = 'judul_ID as judul';
            $callNewsDeskripsi = 'deskripsi_ID as deskripsi';
        }

        elseif (App::getLocale() == 'en') {
            $callProgramEventJudul = 'judul_promosi_EN as judul';
            $callProgramEventDeskripsi = 'deskripsi_EN as deskripsi';
            
            $callNewsJudul = 'judul_EN as judul';
            $callNewsDeskripsi = 'deskripsi_EN as deskripsi';
        }

		$callProgramEvent = ProgramEvents::select(
                $callProgramEventJudul, 
                'img_url', 
                'img_alt', 
                'slug', 
                $callProgramEventDeskripsi
            )
            ->where('show_homepage', 1)
            ->where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('id', 'desc')
            ->limit(15)
            ->get();

		$callNews = News::select(
                $callNewsJudul, 
                $callNewsDeskripsi, 
                'slug'
            )
            ->where('show_homepage', 1)
            ->where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
	    
    	return view('frontend.home.index',compact('items','callSlider','callProgramEvent','callKategory','callNews'));
    }
}
