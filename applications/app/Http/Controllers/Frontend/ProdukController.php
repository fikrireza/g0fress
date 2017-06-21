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

		if (App::getLocale() == 'id') {
            $callKategoryDeskripsi = 'deskripsi_ID as deskripsi';
        }
        else if (App::getLocale() == 'en') {
            $callKategoryDeskripsi = 'deskripsi_EN as deskripsi';
        }

		$callKategory = ProdukKategori::select(
				'nama_kategori', 
				'slug', 
				'img_url', 
				'img_alt', 
				$callKategoryDeskripsi,
				DB::raw('(select count(kategori_id) from amd_produk where amd_produk.kategori_id = amd_produk_kategori.id and amd_produk.flag_publish = 1) as count_kategori_id_and_flag_publish')
			)
			->where('flag_publish', '1')
			->whereDATE('tanggal_post', '<=', $format_date)
			->orderBy('id', 'desc')
			->get();


    	return view('frontend.produk.index',compact('callKategory'));
    }

    function indexView($slug){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

		$callProduk = Produk::leftJoin('amd_produk_kategori', 'amd_produk_kategori.id', '=', 'amd_produk.kategori_id')
			->select(
				'amd_produk_kategori.nama_kategori as nama_kategori', 
				'amd_produk.id as id_produk', 
				'amd_produk.img_url as img_url_produk',
				'amd_produk.img_alt as img_alt_produk'
			)
			->where('amd_produk_kategori.slug', $slug)
			->where('amd_produk.flag_publish', '1')
			->whereDATE('amd_produk.tanggal_post', '<=', $format_date)
			->orderBy('amd_produk.id', 'desc')
			->get();

		if ($callProduk == null) {
            abort('errors.404');
        }

    	return view('frontend.produk.indexView',compact('callProduk'));
    }

    function indexViewSpesifik($slug, $sdSlug){

    	$date = new DateTime;
		$format_date = $date->format('Y-m-d');

		$callProduk = Produk::leftJoin('amd_produk_kategori', 'amd_produk_kategori.id', '=', 'amd_produk.kategori_id')
			->select(
				'amd_produk_kategori.nama_kategori as nama_kategori', 
				'amd_produk.id as id_produk', 
				'amd_produk.img_url as img_url_produk',
				'amd_produk.img_alt as img_alt_produk'
			)
			->where('amd_produk_kategori.slug', $slug)
			->where('amd_produk.flag_publish', '1')
			->whereDATE('amd_produk.tanggal_post', '<=', $format_date)
			->orderBy('amd_produk.id', 'desc')
			->get();

		if ($callProduk == null) {
            abort('errors.404');
        }

    	return view('frontend.produk.indexView',compact('callProduk', 'sdSlug'));
    }

    function callData($id){
    	if (App::getLocale() == 'id') {
            $callKategoryDeskripsi = 'deskripsi_ID as deskripsi';
        }
        else if (App::getLocale() == 'en') {
            $callKategoryDeskripsi = 'deskripsi_EN as deskripsi';
        }
        
    	if (is_numeric($id)) {
	    	$callProduk = Produk::select(
	    		'ingredient', 
	    		$callKategoryDeskripsi, 
	    		'img_url', 
	    		'img_alt', 
	    		'img_url_kiri', 
	    		'img_alt_kiri', 
	    		'img_url_kanan', 
	    		'img_alt_kanan'
	    	)->find($id);
    	}
    	else{
    		$callProduk = Produk::select(
	    		'ingredient', 
	    		$callKategoryDeskripsi, 
	    		'img_url', 
	    		'img_alt', 
	    		'img_url_kiri', 
	    		'img_alt_kiri', 
	    		'img_url_kanan', 
	    		'img_alt_kanan'
	    	)->where('slug', $id)->first();
    	}

    	$view = view('frontend.produk.ajax-call-data',compact('callProduk'))->render();

        return response()->json(['html'=>$view]);
    }
}
