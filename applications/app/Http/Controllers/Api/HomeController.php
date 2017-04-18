<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\ProgramEvents;
use App\Models\ProgramEventsKategori;
use App\Models\News;
use App\Models\Tentang;
use App\Models\Afiliasi;

class HomeController extends Controller
{

    public function index()
    {
        $today = date('Y-m-d');

        $getHome['tentang'] = Tentang::get();

        $getHome['produkKategori'] = ProdukKategori::where('flag_publish', 1)
                                                    ->where('tanggal_post', '<=', $today)
                                                    ->get();

        $getHome['produk']   = Produk::where('flag_publish', 1)
                                      ->where('tanggal_post', '<=', $today)
                                      ->get();

        $getHome['programEvents'] = ProgramEvents::where('show_homepage', 1)
                                                  ->where('flag_publish', 1)
                                                  ->where('tanggal_post', '>=', $today)
                                                  ->get();

        $getHome['news']  = News::where('show_homepage', 1)
                                ->where('flag_publish', 1)
                                ->where('tanggal_post', '<=', $today)
                                ->get();

        $getHome['afiliasi'] = Afiliasi::where('flag_publish', 1)->get();

        return $getHome;
    }


}
