<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use DateTime;
use App\Models\ProdukKategori;
use App\Models\Produk;
use App\Models\Inbox;
use App\Models\Banner;

use Auth;
use DB;
use Route;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $date = new DateTime;
        $format_date = $date->format('Y-m-d');

        $navCallKategory = ProdukKategori::where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('id', 'desc')
            ->select(
                    'id',
                    'nama_kategori',
                    'slug',
                    DB::raw('(select count(kategori_id) from amd_produk where amd_produk.kategori_id = amd_produk_kategori.id and amd_produk.flag_publish = 1) as count_kategori_id_and_flag_publish')
                )
            ->get();

        $navCallProduk = Produk::where('flag_publish', '1')
            ->whereDATE('tanggal_post', '<=', $format_date)
            ->orderBy('id', 'desc')
            ->get();

        view()->share('navCallKategory', $navCallKategory);
        view()->share('navCallProduk', $navCallProduk);

        // Notifikasi New Inbox
        $getNotifInbox = Inbox::where('read', 0)->orderBy('created_at', 'desc')->get();
        view()->share('getNotifInbox', $getNotifInbox);

        // for banner head
        $url = Request::getRequestUri();
        $thisUrl = explode('/', $url);
        $checkThis = $thisUrl[2];

        $callBanner = Banner::where('halaman', $checkThis)->first();
        if(!$callBanner){
            $forBanner = 'picture/firstCampaign/background-rainbow.png';
        }
        else{
            $forBanner = 'images/banner/'.$callBanner->img_url;
        }

        if($checkThis != "" || $checkThis == "contact"){
            view()->share('forBanner', $forBanner);
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
