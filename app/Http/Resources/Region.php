<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Region extends JsonResource
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
            'tom' =>$this->tom,
            'cat_order' =>$this->cat_order,
            'order_mainland' =>$this->order_mainland,
            'order_islands' =>$this->order_islands,
            'order_exotic' =>$this->order_exotic,
            'order_luxury' =>$this->order_luxury,
            'order_mice' =>$this->order_mice,
        ];
    }

    /*public function with($request){
        return [
            'version' => '1.0.0',
            'author_mail' => url('http://google.com')
        ];
    }*/
}