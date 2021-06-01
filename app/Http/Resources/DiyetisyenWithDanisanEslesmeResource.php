<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiyetisyenWithDanisanEslesmeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            // 'id'=>$this->id,
            'adi'=>$this->adi,
            'soyad'=>$this->soyad,

            'diyetisyenler'=>DiyetisyenResource::collection($this->eslesmediyetisyen),



        ];
    }
}
