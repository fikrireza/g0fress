<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/home', 'HomeController@index');

Route::get('loginCampaign', 'SocialAuthController@redirectFB')->name('redirectFB');
Route::get('/callback', 'SocialAuthController@callBackFB')->name('callBackFB');

Route::get('analytics', 'AnalyticsFBController@index')->name('analytics.index');


// First Campaign : kuisioner hello go fress
Route::get('/hello', 'FirstCampaignController@signInPage')->name('first-campaign-sign-in');
Route::get('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPage')->name('first-campaign-pertanyaan-dari-kami');
Route::post('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPageStore')->name('post.first-campaign-pertanyaan-dari-kami');
Route::get('/hello/terimakasih', 'FirstCampaignController@thanksPage')->name('first-campaign-terimakasih');


// BACKEND
Route::get('admin/dashboard', function(){
    return view('backend.dashboard.index');
});

Route::get('admin', function(){
    return view('backend.auth.login');
});

Auth::routes();

Route::get('admin/produk', 'Backend\ProdukController@index')->name('produk.index');
Route::get('admin/produk/tambah', 'Backend\ProdukController@tambah')->name('produk.tambah');
Route::post('admin/produk/tambah', 'Backend\ProdukController@store')->name('produk.store');



//FRONTEND
=======
// FRONTEND
// Route::get('/', '')->name('');

Route::get('/', 'Frontend\HomeController@index')->name('frontend.home.index');
