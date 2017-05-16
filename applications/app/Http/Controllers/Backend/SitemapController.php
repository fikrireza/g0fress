<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Produk;

class SitemapController extends Controller
{


    public function index()
    {
        $now = date('Y-m-d');
        $getNews = News::where('flag_publish', 1)->where('tanggal_post', '<=', $now)->get();

        return response()->view('sitemap', [  'getNews' => $getNews
                                          ])->header('Content-Type', 'text/xml');
    }
}
