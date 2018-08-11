<?php

namespace App\Http\Resources;

use App\Hotels;
use DB;
use Illuminate\Http\Resources\Json\JsonResource;

class Content extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'        =>$this->hotel_id,
            'year'      =>$this->year,
            'general'   =>$this->general,
            'luxury'    =>$this->luxury,
            'mice'      =>$this->mice,
            //'name'      =>(Hotels::all()->where('id','=',$this->hotel_id))
            //'name'      =>((DB::table('hotels')->select('name')->where('id','=',$this->hotel_id)->get())[0])->name
            //'name'      =>Hotel::collection($this->id)
            /*$this->mergeWhen($this->Hotel()->exists() , function(){
                return ['name' => $this->Hotel()->id];
            })*/
        ];
    }

}
