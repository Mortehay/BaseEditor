<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HotelSheet extends Controller
{
    public function hotelList()
    {
        $hotels = DB::table('hotels')->get();
        $regions= DB::table('regions')->get();
        return view('hotelsheet',compact('hotels', 'regions'));
    }

}
