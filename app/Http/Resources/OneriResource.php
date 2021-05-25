<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OneriResource extends JsonResource
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
            'oneri_tarih'=> $this->oneri_tarih,
            'oneri_aciklama'=> $this->oneri_aciklama,
            
        ];
    }
}
