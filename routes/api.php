<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//list articles
Route::get('articles','ArticleController@index');

//list single article
Route::get('article/{id}', 'ArticleController@show');

//create new article
Route::post('article','ArticleController@store');

//update article
Route::put('article','ArticleController@store');

//delete article
Route::delete('article/{id}', 'ArticleController@destroy');

//
//list hotels
Route::get('hotels','HotelsController@index');

//list search hotels
Route::get('hotels/{searchName}','HotelsController@searchLike');

//list single article
Route::get('hotel/{id}', 'HotelsController@show');

//define min unused hotelid
Route::get('hotel/id/min', 'HotelsController@idMin');
//create new article
Route::post('hotel','HotelsController@store');

//update article
Route::put('hotel','HotelsController@edit');

//delete article
Route::delete('hotel/{id}', 'HotelsController@destroy');

//
//list regions
Route::get('regions','RegionsController@index');

//list single region
Route::get('region/{id}', 'RegionsController@show');

//create new region
Route::post('region','RegionsController@store');

//update region
Route::put('region','RegionsController@store');

//delete region
Route::delete('Regions/{id}', 'RegionsController@destroy');
