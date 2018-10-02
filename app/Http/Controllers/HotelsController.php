<?php

namespace App\Http\Controllers;
use DB;
use Auth;
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

    public function __construct()
    {
        //$this->middleware('auth')->only('hotels');
        $this->middleware('auth',['only' => ['hotels', 'hotelsheet']]);
    }

    public function hotels()
    {
        return view('pages.hotels');
    }

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
        $hotel = $request->isMethod('put') ? Hotels::findOrFail($request->hotel_id) : new Hotel;
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
    public function edit(Request $request)
    {
        $hotel = $request->isMethod('put') ? Hotels::findOrFail($request->input('id')) : new Hotel;
        $hotel->id = $request->input('id');
        $hotel->name = $request->input('name');
        $hotel->region_id = $request->input('region_id');
        $hotel->general = $request->input('general');
        $hotel->mice = $request->input('mice');
        $hotel->luxury = $request->input('luxury');
        //print_r($hotel);
        //$hotel->save();
        if($hotel->save()){
            return  new HotelResource($hotel);
        }
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

    public function idMin()
    {
        //returns minimal unused hotel id
        $tempRange = range(1,20000,1);
        $usedIds = Hotels::select('id')->orderBy('id')->get()->toArray();
        $usedIdsArray = [];
        foreach($usedIds as $ids){
            array_push($usedIdsArray , $ids['id']);
        }
        $unusedIds = array_diff($tempRange, $usedIdsArray);
        return min($unusedIds);
    }
}
