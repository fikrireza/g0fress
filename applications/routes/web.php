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


Route::get('/home', 'HomeController@index');

Route::get('loginCampaign', 'SocialAuthController@redirectFB')->name('redirectFB');
Route::get('/callback', 'SocialAuthController@callBackFB')->name('callBackFB');

Route::get('analytics', 'AnalyticsFBController@index')->name('analytics.index');


// First Campaign : kuisioner hello go fress
Route::get('/hello', 'FirstCampaignController@signInPage')->name('first-campaign-sign-in');
Route::get('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPage')->name('first-campaign-pertanyaan-dari-kami');
Route::post('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPageStore')->name('post.first-campaign-pertanyaan-dari-kami');
Route::get('/hello/terimakasih', 'FirstCampaignController@thanksPage')->name('first-campaign-terimakasih');


Route::get('/hello/syarat-ketentuan', function(){
      return view('pages.firstCampaign.syarat-ketentuan');
  });

// Auth::routes()
Route::get('admin/login', function () {
  return view('backend/auth/login');
})->name('login.pages');
Route::get('logout-process', 'Auth\LoginController@logoutProcess')->name('logout');
Route::post('login-process', 'Auth\LoginController@loginProcess')->name('login');
// END Auth::routes()


//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['isAdministrator']], function () {
  Route::get('admin/dashboard', function(){
      return view('backend.dashboard.index');
  });

  Route::get('admin', function(){
      return view('backend.auth.login');
  });
});

// Produk
Route::get('admin/produk', 'Backend\ProdukController@index')->name('produk.index');
Route::get('admin/produk/tambah', 'Backend\ProdukController@tambah')->name('produk.tambah');
Route::post('admin/produk/tambah', 'Backend\ProdukController@store')->name('produk.store');
Route::get('admin/produk/lihat/{id}', 'Backend\ProdukController@lihat')->name('produk.lihat');
Route::get('admin/produk/ubah/{id}', 'Backend\ProdukController@ubah')->name('produk.ubah');
Route::post('admin/produk/ubah', 'Backend\ProdukController@edit')->name('produk.edit');

// Produk Kategori
Route::get('admin/produk-kategori', 'Backend\ProdukKategoriController@index')->name('produkKategori.index');
Route::get('admin/produk-kategori/tambah', 'Backend\ProdukKategoriController@tambah')->name('produkKategori.tambah');
Route::post('admin/produk-kategori/tambah', 'Backend\ProdukKategoriController@store')->name('produkKategori.store');
Route::get('admin/produk-kategori/lihat/{id}', 'Backend\ProdukKategoriController@lihat')->name('produkKategori.lihat');
Route::get('admin/produk-kategori/ubah/{id}', 'Backend\ProdukKategoriController@ubah')->name('produkKategori.ubah');
Route::post('admin/produk-kategori/ubah', 'Backend\ProdukKategoriController@edit')->name('produkKategori.edit');

// News
Route::get('admin/news', 'Backend\NewsController@index')->name('news.index');
Route::get('admin/news/tambah', 'Backend\NewsController@tambah')->name('news.tambah');
Route::post('admin/news/tambah', 'Backend\NewsController@store')->name('news.store');
Route::get('admin/news/lihat/{id}', 'Backend\NewsController@lihat')->name('news.lihat');
Route::get('admin/news/ubah/{id}', 'Backend\NewsController@ubah')->name('news.ubah');
Route::post('admin/news/ubah', 'Backend\NewsController@edit')->name('news.edit');

// Program & Events
Route::get('admin/program-events', 'Backend\ProgramEventsController@index')->name('programEvents.index');
Route::get('admin/program-events/tambah', 'Backend\ProgramEventsController@tambah')->name('programEvents.tambah');
Route::post('admin/program-events/tambah', 'Backend\ProgramEventsController@store')->name('programEvents.store');
Route::get('admin/program-events/lihat/{id}', 'Backend\ProgramEventsController@lihat')->name('programEvents.lihat');
Route::get('admin/program-events/ubah/{id}', 'Backend\ProgramEventsController@ubah')->name('programEvents.ubah');
Route::post('admin/program-events/ubah', 'Backend\ProgramEventsController@edit')->name('programEvents.edit');

// Program & Events Kategori
Route::get('admin/program-events-kategori', 'Backend\ProgramEventsKategoriController@index')->name('programEventsKategori.index');
Route::get('admin/program-events-kategori/tambah', 'Backend\ProgramEventsKategoriController@tambah')->name('programEventsKategori.tambah');
Route::post('admin/program-events-kategori/tambah', 'Backend\ProgramEventsKategoriController@store')->name('programEventsKategori.store');
Route::get('admin/program-events-kategori/lihat/{id}', 'Backend\ProgramEventsKategoriController@lihat')->name('programEventsKategori.lihat');
Route::get('admin/program-events-kategori/ubah/{id}', 'Backend\ProgramEventsKategoriController@ubah')->name('programEventsKategori.ubah');
Route::post('admin/program-events-kategori/ubah', 'Backend\ProgramEventsKategoriController@edit')->name('programEventsKategori.edit');


// Inbox Message
Route::get('admin/inbox', 'Backend\InboxController@index')->name('inbox.index');


// Akses log
Route::get('admin/logAkses', 'Backend\LogAksesController@index')->name('logAkses.index');

//----------------------- BACKEND -----------------------//



// FRONTEND
// Route::get('/', '')->name('');

Route::get('/', 'Frontend\HomeController@index')->name('frontend.home.index');
