<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hotel extends JsonResource
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
            'id' =>$this->id,
            'name' =>$this->name,
            'region_id' =>$this->region_id,
            'general' =>$this->general,
            'mice' =>$this->mice,
            'luxury' =>$this->luxury,
            'created_at' =>$this->created_at,
        ];
    }

    public function with($request){
        return [
            'version' => '1.0.0',
            'author_mail' => url('http://google.com')
        ];
    }
}
