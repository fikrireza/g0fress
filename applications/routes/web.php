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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('redirect', 'SocialAuthController@redirectFB')->name('redirectFB');
Route::get('/callback', 'SocialAuthController@callBackFB')->name('callBackFB');

Route::get('analytics', 'AnalyticsFBController@index')->name('analytics.index');


/* first campaign : kuisioner hello go fress */

	Route::get('/hello', 'FirstCampaignController@signInPage')->name('first-campaign-sign-in');
	Route::get('/hello/pertanyaan-dari-kami', 'FirstCampaignController@pertanyaanPage')->name('first-campaign-pertanyaan-dari-kami');
	Route::get('/hello/hello/terimakasih', 'FirstCampaignController@thanksPage')->name('first-campaign-terimakasih');

/* end first campaign : kuisioner hello go fress */
