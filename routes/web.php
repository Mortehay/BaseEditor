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
Auth::routes();
Route::get('clear-all-cache', 'ClearAllCache@clearAllCache')->name('$cache_log');

Route::get('/', function(){
    return redirect('/login');
});

//Route::get('/', 'LoginController@index');
//Route::post('/login/checklogin', 'LoginController@checklogin');

//Route::get('/login/logout', 'LoginController@logout');

//Route::redirect('/', '/hotelsheet', 301);
//Route::get('/hotelsheet','HotelSheet@hotelList')->name('hotelsheet');

//Route::get('/hotelsheet','HotelSheet@hotelList')->name('hotelsheet');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hotels', 'HotelsController@hotels');
Route::get('/hotelsheet','HotelSheet@hotelList');
Route::get('/you-registred', function(){
    return view('auth.thanks');
});
//Route::post('login/{token}/adduser/{email}', 'Auth\RegisterController@addUser');
Route::get('/display-curve', 'DisplayCurveController@index');