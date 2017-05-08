<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use App\Models\TentangGaleri;

use App;

class AboutController extends Controller
{
    function index(){
    	if (App::getLocale() == 'id') {
            $deskripsi = 'deskripsi_ID as deskripsi';
            $visi = 'visi_deskripsi_ID as visi';
            $misi = 'misi_deskripsi_ID as misi';
        }
        elseif (App::getLocale() == 'en') {
        	$deskripsi = 'deskripsi_ID as deskripsi';
            $visi = 'visi_deskripsi_ID as visi';
            $misi = 'misi_deskripsi_ID as misi';
        }

    	$callAbout = Tentang::select(
    		$deskripsi,
    		$misi,
    		$visi,
    		'img_url',
    		'img_alt'
    	)->first();

    	$callImg = TentangGaleri::select(
            'cer_ach', 
            'img_url', 
            'img_alt'
        )
        ->where('flag_publish', '1')
        ->get();

    	return view('frontend.about.index', compact('callAbout','callImg'));
    }
}
