<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class HotelSheet extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hotelList()
    {
       /* if(!isset(Auth::user()->email)){
            return redirect()->route('login');
        }*/
        $hotels = DB::table('hotels')->get();
        $regions= DB::table('regions')->get();
        return view('pages.hotelsheet',compact('hotels', 'regions'));
    }

}
