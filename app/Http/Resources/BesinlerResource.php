<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BesinlerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'besin_adi'=>$this->besin_adi,
            'besin_kalori'=>$this->besin_kalori,
        ];

    }
}
