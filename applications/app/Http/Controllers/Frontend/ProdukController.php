<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukKategori;

use App;
use DB;
use DateTime;

class ProdukController extends Controller
{
    function index(){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

		$callKategory = ProdukKategori::select('nama_kategori', 'slug', 'img_url', 'img_alt')->where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->get();


    	return view('frontend.produk.index',compact('callKategory'));
    }
}
