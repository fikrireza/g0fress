<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use DateTime;
use App\Models\ProdukKategori;
use App\Models\Produk;

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
        $navCallKategory = ProdukKategori::where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->get();

        $navCallProduk = Produk::where('flag_publish', '1')->whereDATE('tanggal_post', '<=', $format_date)->orderBy('id', 'desc')->get();

        view()->share('navCallKategory', $navCallKategory);
        view()->share('navCallProduk', $navCallProduk);
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
