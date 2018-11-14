<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Regions;
use Auth;
use App\Http\Resources\Region as RegionResource;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['only' => ['hotels', 'hotelsheet', 'regions']]);
        //$this->middleware('auth');
        //print_r(Auth::user());
        /*if(Auth::user() ==''){
            exit("<script>alert('you are not authorized');</script><script>window.location = '/';</script>");
        }*/
    }

    public function index()
    {
        // get regions
        $regions = Regions::all()->sortBy('name');
        // returnn collection of regions as a resource
        return  RegionResource::collection($regions);
    }

    public function regions()
    {
        $regions= DB::table('regions')->get();
        return view('pages.regions',compact( 'regions'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a region article
        $region = Regions::findOrFail($id);
        // return a single region as resource
        return new RegionResource($region);
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
