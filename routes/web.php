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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('clear-all-cache', 'ClearAllCache@clearAllCache')->name('$cache_log');

Route::get('/', 'LoginController@index');
Route::post('/login/checklogin', 'LoginController@checklogin');
Route::get('/hotelsheet', 'LoginController@successlogin');
Route::get('/login/logout', 'LoginController@logout');

//Route::redirect('/', '/hotelsheet', 301);
//Route::get('/hotelsheet','HotelSheet@hotelList')->name('hotelsheet');
Route::get('/hotels', function(){
    return view('hotels');
});
//Route::get('/hotelsheet','HotelSheet@hotelList')->name('hotelsheet');
