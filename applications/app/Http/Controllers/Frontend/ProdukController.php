<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;

use App;
use DB;
use DateTime;

class ProdukController extends Controller
{
    function index(){

  //   	$date = new DateTime;
		// $format_date = $date->format('Y-m-d');

  //   	$callNews = News::select('judul_ID as judul', 'deskripsi_ID as deskripsi', 'slug', 'tanggal_post' ,'img_url','img_alt')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->paginate(2);


    	return view('frontend.produk.index'/*,compact('callNews')*/);
    }
}
