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


Route::get('loginCampaign', 'SocialAuthController@redirectFB')->name('redirectFB');
Route::get('/callback', 'SocialAuthController@callBackFB')->name('callBackFB');


Route::get('analytics', 'AnalyticsFBController@index')->name('analytics.index');


Route::get('analytics/testing', 'AnalyticsFBController@testing')->name('analytics.testing');
Route::get('analytics/get-json', 'AnalyticsFBController@getJson')->name('analytics.getJson');


// First Campaign : kuisioner hello go fress
Route::get('/hello', 'FirstCampaignController@signInPage')->name('first-campaign-sign-in');
Route::get('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPage')->name('first-campaign-pertanyaan-dari-kami');
Route::post('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPageStore')->name('post.first-campaign-pertanyaan-dari-kami');
Route::get('/hello/terimakasih', 'FirstCampaignController@thanksPage')->name('first-campaign-terimakasih');
Route::get('/hello/syarat-ketentuan', function(){
      return view('pages.firstCampaign.syarat-ketentuan');
  });
Route::get('hello/test-email', 'FirstCampaignController@testemail');
/* end first campaign : kuisioner hello go fress */

// Auth::routes();
Route::post('login-process', 'Auth\LoginController@loginProcess')->name('login');
Route::get('admin/logout-process', 'Auth\LoginController@logoutProcess')->name('logout');
// END Auth::routes()

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.pages');

//Verify User CMS
Route::get('admin/verify/{confirmation_code}', 'Backend\UserController@verify')->name('verify.index');
Route::post('admin/verify', 'Backend\UserController@store')->name('verify.store');

//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['isAdministrator']], function () {
  Route::get('admin/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
  Route::get('admin/dashboard/get-fb', 'Backend\DashboardController@getFB')->name('analytics.getFB');

  // Produk
  Route::get('admin/produk', 'Backend\ProdukController@index')->name('produk.index');
  Route::get('admin/produk/tambah', 'Backend\ProdukController@tambah')->name('produk.tambah');
  Route::post('admin/produk/tambah', 'Backend\ProdukController@store')->name('produk.store');
  Route::get('admin/produk/lihat/{id}', 'Backend\ProdukController@lihat')->name('produk.lihat');
  Route::get('admin/produk/ubah/{id}', 'Backend\ProdukController@ubah')->name('produk.ubah');
  Route::post('admin/produk/ubah', 'Backend\ProdukController@edit')->name('produk.edit');
  Route::get('admin/produk/publish/{id}', 'Backend\ProdukController@publish')->name('produk.publish');

  // Produk Kategori
  Route::get('admin/produk-kategori', 'Backend\ProdukKategoriController@index')->name('produkKategori.index');
  Route::get('admin/produk-kategori/tambah', 'Backend\ProdukKategoriController@tambah')->name('produkKategori.tambah');
  Route::post('admin/produk-kategori/tambah', 'Backend\ProdukKategoriController@store')->name('produkKategori.store');
  Route::get('admin/produk-kategori/lihat/{id}', 'Backend\ProdukKategoriController@lihat')->name('produkKategori.lihat');
  Route::get('admin/produk-kategori/ubah/{id}', 'Backend\ProdukKategoriController@ubah')->name('produkKategori.ubah');
  Route::post('admin/produk-kategori/ubah', 'Backend\ProdukKategoriController@edit')->name('produkKategori.edit');
  Route::get('admin/produk-kategori/publish/{id}', 'Backend\ProdukKategoriController@publish')->name('produkKategori.publish');

  // News
  Route::get('admin/news', 'Backend\NewsController@index')->name('news.index');
  Route::get('admin/news/tambah', 'Backend\NewsController@tambah')->name('news.tambah');
  Route::post('admin/news/tambah', 'Backend\NewsController@store')->name('news.store');
  Route::get('admin/news/lihat/{id}', 'Backend\NewsController@lihat')->name('news.lihat');
  Route::get('admin/news/ubah/{id}', 'Backend\NewsController@ubah')->name('news.ubah');
  Route::post('admin/news/ubah', 'Backend\NewsController@edit')->name('news.edit');
  Route::get('admin/news/publish/{id}', 'Backend\NewsController@publish')->name('news.publish');
  Route::get('admin/news/homepage/{id}', 'Backend\NewsController@homepage')->name('news.homepage');

  // Program & Events
  Route::get('admin/program-events', 'Backend\ProgramEventsController@index')->name('programEvents.index');
  Route::get('admin/program-events/tambah', 'Backend\ProgramEventsController@tambah')->name('programEvents.tambah');
  Route::post('admin/program-events/tambah', 'Backend\ProgramEventsController@store')->name('programEvents.store');
  Route::get('admin/program-events/lihat/{id}', 'Backend\ProgramEventsController@lihat')->name('programEvents.lihat');
  Route::get('admin/program-events/ubah/{id}', 'Backend\ProgramEventsController@ubah')->name('programEvents.ubah');
  Route::post('admin/program-events/ubah', 'Backend\ProgramEventsController@edit')->name('programEvents.edit');
  Route::get('admin/program-events/publish/{id}', 'Backend\ProgramEventsController@publish')->name('programEvents.publish');
  Route::get('admin/program-events/homepage/{id}', 'Backend\ProgramEventsController@homepage')->name('programEvents.homepage');

  // Program & Events Kategori
  Route::get('admin/program-events-kategori', 'Backend\ProgramEventsKategoriController@index')->name('programEventsKategori.index');
  Route::get('admin/program-events-kategori/tambah', 'Backend\ProgramEventsKategoriController@tambah')->name('programEventsKategori.tambah');
  Route::post('admin/program-events-kategori/tambah', 'Backend\ProgramEventsKategoriController@store')->name('programEventsKategori.store');
  Route::get('admin/program-events-kategori/lihat/{id}', 'Backend\ProgramEventsKategoriController@lihat')->name('programEventsKategori.lihat');
  Route::get('admin/program-events-kategori/ubah/{id}', 'Backend\ProgramEventsKategoriController@ubah')->name('programEventsKategori.ubah');
  Route::post('admin/program-events-kategori/ubah', 'Backend\ProgramEventsKategoriController@edit')->name('programEventsKategori.edit');
  Route::get('admin/program-events-kategori/publish/{id}', 'Backend\ProgramEventsKategoriController@publish')->name('programEventsKategori.publish');

  // Inbox Message
  Route::get('admin/inbox', 'Backend\InboxController@index')->name('inbox.index');

  // Akses log
  Route::get('admin/logAkses', 'Backend\LogAksesController@index')->name('logAkses.index');

  // Slider Image Home
  Route::get('admin/slider', 'Backend\SliderHomeController@index')->name('slider.index');
  Route::get('admin/slider/tambah', 'Backend\SliderHomeController@tambah')->name('slider.tambah');
  Route::post('admin/slider/tambah', 'Backend\SliderHomeController@store')->name('slider.store');
  Route::get('admin/slider/ubah/{id}', 'Backend\SliderHomeController@ubah')->name('slider.ubah');
  Route::post('admin/slider/ubah', 'Backend\SliderHomeController@edit')->name('slider.edit');
  Route::get('admin/slider/publish/{id}', 'Backend\SliderHomeController@publish')->name('slider.publish');
  Route::get('admin/slider/delete/{id}', 'Backend\SliderHomeController@delete')->name('slider.delete');

  // Web Head Banner
  Route::get('admin/banner', 'Backend\BannerController@index')->name('banner.index');
  Route::get('admin/banner/tambah', 'Backend\BannerController@tambah')->name('banner.tambah');
  Route::post('admin/banner/tambah', 'Backend\BannerController@store')->name('banner.store');
  Route::get('admin/banner/ubah/{id}', 'Backend\BannerController@ubah')->name('banner.ubah');
  Route::post('admin/banner/ubah', 'Backend\BannerController@edit')->name('banner.edit');

  // Profile User
  Route::get('admin/profile', 'Backend\ProfileController@index')->name('profile.index');
  Route::post('admin/profile/password', 'Backend\ProfileController@changePassword')->name('profile.password');
  Route::post('admin/profile', 'Backend\ProfileController@changeProfile')->name('profile.user');

  // Campaign Hello
  Route::get('admin/campaign/hello', 'Backend\Campaign1Controller@index')->name('hello.index');
  Route::get('admin/campaign/pertanyaan_1', 'Backend\Campaign1Controller@getPertanyaan_1')->name('hello.pertanyaan_1');
  Route::get('admin/campaign/pertanyaan_2', 'Backend\Campaign1Controller@getPertanyaan_2')->name('hello.pertanyaan_2');
  Route::get('admin/campaign/pertanyaan_3', 'Backend\Campaign1Controller@getPertanyaan_3')->name('hello.pertanyaan_3');
  Route::get('admin/campaign/pertanyaan_4', 'Backend\Campaign1Controller@getPertanyaan_4')->name('hello.pertanyaan_4');

  //Social Media
  Route::get('admin/social-account', 'Backend\SocialMediaController@index')->name('social.index');
  Route::get('admin/social-account/tambah', 'Backend\SocialMediaController@tambah')->name('social.tambah');
  Route::post('admin/social-account/tambah', 'Backend\SocialMediaController@store')->name('social.store');
  Route::get('admin/social-account/ubah/{id}', 'Backend\SocialMediaController@ubah')->name('social.ubah');
  Route::post('admin/social-account/ubah', 'Backend\SocialMediaController@edit')->name('social.edit');
  Route::get('admin/social-account/publish/{id}', 'Backend\SocialMediaController@publish')->name('social.pubish');
  Route::get('admin/social-account/delete/{id}', 'Backend\SocialMediaController@delete')->name('social.delete');

  // Kontak
  Route::get('admin/kontak', 'Backend\KontakController@index')->name('kontak.index');
  Route::get('admin/kontak/tambah', 'Backend\KontakController@tambah')->name('kontak.tambah');
  Route::post('admin/kontak/tambah', 'Backend\KontakController@store')->name('kontak.store');
  Route::get('admin/kontak/ubah/{id}', 'Backend\KontakController@ubah')->name('kontak.ubah');
  Route::post('admin/kontak/ubah', 'Backend\KontakController@edit')->name('kontak.edit');

  // Tentang
  Route::get('admin/tentang', 'Backend\TentangController@index')->name('tentang.index');
  Route::get('admin/tentang/tambah', 'Backend\TentangController@tambah')->name('tentang.tambah');
  Route::post('admin/tentang/tambah', 'Backend\TentangController@store')->name('tentang.store');
  Route::get('admin/tentang/ubah/{id}', 'Backend\TentangController@ubah')->name('tentang.ubah');
  Route::post('admin/tentang/ubah', 'Backend\TentangController@edit')->name('tentang.edit');

  // Tentang sertifikat dan achievements
  Route::get('admin/tentang-galeri', 'Backend\TentangController@indexGaleri')->name('tentangGaleri.index');
  Route::get('admin/tentang-galeri/upload', 'Backend\TentangController@tambahGaleri')->name('tentangGaleri.tambah');
  Route::post('admin/tentang-galeri/upload', 'Backend\TentangController@uploadGaleri')->name('tentangGaleri.store');
  Route::get('admin/tentang-galeri/ubah/{id}', 'Backend\TentangController@ubahGaleri')->name('tentangGaleri.ubah');
  Route::post('admin/tentang-galeri/ubah', 'Backend\TentangController@editGaleri')->name('tentangGaleri.edit');
  Route::get('admin/tentang-galeri/delete/{id}', 'Backend\TentangController@deleteGaleri')->name('tentangGaleri.delete');

  // User
  Route::get('admin/users', 'Backend\UserController@index')->name('users.index');
  Route::get('admin/users/reset/{id}', 'Backend\UserController@reset')->name('users.reset');
  Route::post('admin/users', 'Backend\UserController@new')->name('users.new');

  // Afiliasi
  Route::get('admin/afiliasi', 'Backend\AfiliasiController@index')->name('afiliasi.index');
  Route::get('admin/afiliasi/tambah', 'Backend\AfiliasiController@tambah')->name('afiliasi.tambah');
  Route::post('admin/afiliasi/tambah', 'Backend\AfiliasiController@store')->name('afiliasi.store');
  Route::get('admin/afiliasi/ubah/{id}', 'Backend\AfiliasiController@ubah')->name('afiliasi.ubah');
  Route::post('admin/afiliasi/ubah', 'Backend\AfiliasiController@edit')->name('afiliasi.edit');
  Route::get('admin/afiliasi/publish/{id}', 'Backend\AfiliasiController@publish')->name('afiliasi.pubish');
  Route::get('admin/afiliasi/delete/{id}', 'Backend\AfiliasiController@delete')->name('afiliasi.delete');

  // Facebook Apps
  Route::get('admin/facebook', 'Backend\FacebookController@index')->name('facebook.index');
  Route::get('admin/facebook/ubah/{id}', 'Backend\FacebookController@ubah')->name('facebook.ubah');
  Route::post('admin/facebook/ubah', 'Backend\FacebookController@edit')->name('facebook.edit');

});
//----------------------- BACKEND -----------------------//



// FRONTEND
// Route::get('/', '')->name('');
Route::get('bahasa/{bhs}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');

Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

Route::get('/contact', 'Frontend\ContactController@index')->name('frontend.contact');
Route::post('/contact', 'Frontend\ContactController@store')->name('frontend.contact.post');

Route::get('/tentang', 'Frontend\AboutController@index')->name('frontend.about');

// News
Route::get('/news', 'Frontend\NewsController@index')->name('frontend.news');
Route::get('/news/{slug}', 'Frontend\NewsController@view')->name('frontend.news.view');

// Produk
Route::get('/produk', 'Frontend\ProdukController@index')->name('frontend.produk');
Route::get('/produk/callData/{id}', 'Frontend\ProdukController@callData')->name('frontend.produk.callData');
Route::get('/produk/{slug}', 'Frontend\ProdukController@indexView')->name('frontend.produk.view');
Route::get('/produk/{slug}/{sdSlug}', 'Frontend\ProdukController@indexViewSpesifik')->name('frontend.produk.view.spesik');

// Program & Event
Route::get('/program-events', 'Frontend\EventsController@index')->name('frontend.program-event');
Route::get('/program-events/more-events', 'Frontend\EventsController@indexEvents')->name('frontend.program-event.events');
Route::get('/program-events/more-events-vidio', 'Frontend\EventsController@indexEventsVidio')->name('frontend.program-event.events-vidio');
Route::get('/program-events/event/{slug}', 'Frontend\EventsController@eventsView')->name('frontend.program-event.view');
