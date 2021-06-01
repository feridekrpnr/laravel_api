<?php

namespace App\Http\Resources;

use App\Models\KaloriHesaplama;
use Illuminate\Http\Resources\Json\JsonResource;

class KaloriHesaplamaWithTüketilenBesinlerResource extends JsonResource
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
            'tarih'=>$this->tarih,

            'kalori_hesaplama'=>KaloriHesaplamaResource::collection($this->kaloritüketilen),
            'besinler'=>BesinlerResource::collection($this->tuketilenler),
            'ogunler'=>OgunResource::collection($this->ogundetuketilenler),


        ];
    }
}
