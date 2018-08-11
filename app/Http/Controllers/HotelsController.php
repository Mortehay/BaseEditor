<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Hotels;
use App\Http\Resources\Hotel as HotelResource;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get hotels
        $hotels = Hotels::orderBy('created_at','desc')->paginate(50);
        // returnn collection of hotels as a resource
        return  HotelResource::collection($hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store hotel data
        $hotel = $request->isMethod('put') ? Hotel::findOrFail($request->hotel_id) : new hotel;
       /* $hotel->id = $request->input('hotel_id');
        $hotel->title = $request->input('name');
        $hotel->body = $request->input('');*/
       /* if($hotel->save()){
            return  new HotelResource($hotel);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a hotel
        $hotel = Hotels::findOrFail($id);
        // return a single hotel as resource
        return new HotelResource($hotel);
    }

    public function searchLike($searchName)
    {
        // search hotels like name
        $hotels = Hotels::where('name', 'like', '%'.$searchName.'%')->paginate(50);
        // returnn collection of hotels as a resource
        return  HotelResource::collection($hotels);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
