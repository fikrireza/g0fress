<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use App\Models\TentangGaleri;
use App\Models\Distribution;
use App\Models\Kota;

use App;
use DB;

class AboutController extends Controller
{
    function index(){
    	if (App::getLocale() == 'id') {
            $deskripsi = 'deskripsi_ID as deskripsi';
            $visi = 'visi_deskripsi_ID as visi';
            $misi = 'misi_deskripsi_ID as misi';
        }
        elseif (App::getLocale() == 'en') {
        	$deskripsi = 'deskripsi_EN as deskripsi';
            $visi = 'visi_deskripsi_EN as visi';
            $misi = 'misi_deskripsi_EN as misi';
        }

    	$callAbout = Tentang::select(
    		$deskripsi,
    		$misi,
    		$visi
    	)->first();

    	$callImg = TentangGaleri::select(
            'cer_ach', 
            'img_url', 
            'img_alt'
        )
        ->where('flag_publish', '1')
        ->get();

        $callProv = Kota::select(
            'id',
            'nama_kota',
            DB::raw('(select count(id_provinsi) from amd_distribution where amd_distribution.id_provinsi = amd_kota.id) as count_city')
        )
        ->get();
        
        $callCity = Distribution::select(
            'id_provinsi',
            'nama_kota'
        )
        ->where('flag_publish', '1')
        ->get();

        $callCityOut = Distribution::leftJoin('amd_kota', 'amd_kota.id', '=', 'amd_distribution.id_provinsi')
        ->select(
            'amd_distribution.nama_kota as nama_kota'
        )
        ->where('amd_distribution.flag_publish', '1')
        ->where('amd_kota.nama_kota', 'like', '%mancanegara%')
        ->get();

    	return view('frontend.about.index', compact(
            'callAbout',
            'callImg',
            'callProv',
            'callCity',
            'callCityOut'
        ));
    }
}
