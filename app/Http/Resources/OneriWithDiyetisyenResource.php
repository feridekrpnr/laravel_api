<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OneriWithDiyetisyenResource extends JsonResource
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
            'id'   => $this->id,
            'oneri_aciklama'  =>$this->oneri_aciklama,
            'oneri_kalori'    =>$this->oneri_kalori,
            'diyetisyenler'   =>DiyetisyenResource::collection($this->getOneriDiyetisyen),

        ];

    }
}
