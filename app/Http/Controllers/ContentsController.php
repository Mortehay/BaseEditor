<?php

namespace App\Http\Controllers;
use DB;
use Schema;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\CatalogueContents;

use App\Http\Resources\Content as ContentResource;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = -1, $year = -1, $region = -1, $subregion = -1)
    {

        ($type == 'general')?($catalogue = 'catalogue'):($catalogue = $type);
        if(Schema::hasTable($catalogue.'_'.$year)){
            $cataloge_contents = DB::table('catalogue_contents')
                ->join('hotels','catalogue_contents.hotel_id', '=', 'hotels.id')
                ->join($catalogue.'_'.$year,$catalogue.'_'.$year.'.'.'hotel_id', '=', 'hotels.id')
                ->join('regions',$catalogue.'_'.$year.'.'.'block', '=', 'regions.id')
                ->join('sub_regions',$catalogue.'_'.$year.'.'.'area', '=', 'sub_regions.id')
                ->select('catalogue_contents.*','hotels.name','regions.name as region','sub_regions.name as subregion','regions.id as block','sub_regions.id as subblock')
                ->where('catalogue_contents'.'.'.$type,  1)
                ->where('catalogue_contents'.'.'.'year',  $year)
                ->where('regions.id',  $region )
                ->where('sub_regions.id',  $subregion)
                ->get();
            return $cataloge_contents;
        }

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
        //
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
