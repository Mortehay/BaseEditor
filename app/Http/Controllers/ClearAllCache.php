<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClearAllCache extends Controller
{
    public function clearAllCache(){
        $cache_log = [];
        //Clear Cache facade value:
        try {
            $exitCode = Artisan::call('cache:clear');
            array_push($cache_log ,'<h1>Cache facade value cleared</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>Cache facade value was not cleared - $e</h1>');
        }
        /*//Reoptimized class loader:
        try {
            $exitCode = $exitCode = Artisan::call('optimize');
            array_push($cache_log , '<h1>Reoptimized class loader</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>Сlass loade was not кeoptimized - $e</h1>');
        }*/
        /*//Route cache:
        try {
            $exitCode = Artisan::call('route:cache');
            array_push($cache_log , '<h1>Routes cached</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>Routes was not cached - $e</h1>');
        }*/
        //Clear Route cache:
        try {
            $exitCode = Artisan::call('route:clear');
            array_push($cache_log , '<h1>Route cache cleared</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>Route cache  was not cleared - $e</h1>');
        }
        /*//Clear View cache
        try {
            $exitCode = Artisan::call('view:clear');
            array_push($cache_log , '<h1>View cache cleared</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>View cache was not cleared - $e</h1>');
        }*/
        //Clear Config cache:
        try {
            $exitCode = Artisan::call('config:cache');
            array_push($cache_log , '<h1>Clear Config cleared</h1>');
        } catch (Exception $e) {
            array_push($cache_log , '<h1>Clear Config  was not cleared - $e</h1>');
        }
        return view('clearAllCache',compact('cache_log'));
    }
}
