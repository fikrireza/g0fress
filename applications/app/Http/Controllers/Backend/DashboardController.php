<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\ProdukKategori;
use App\Models\News;
use App\Models\ProgramEvents;
use App\Models\ProgramEventsKategori;
use App\Models\SliderHome;

class DashboardController extends Controller
{


    public function index()
    {
        $getProduk = Produk::get();
        $getProdukKategori = ProdukKategori::get();

        $getNews = News::get();

        $getProgram = ProgramEvents::get();
        $getProgramKategori = ProgramEventsKategori::get();

        $getSlider = SliderHome::get();

        return view('backend.dashboard.index', compact('getProduk', 'getProdukKategori', 'getNews', 'getProgram', 'getProgramKategori', 'getSlider'));
    }
}
