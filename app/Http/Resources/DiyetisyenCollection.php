<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DiyetisyenCollection extends ResourceCollection
{
    public $collection = 'App\Http\Recources\DiyetisyenRecource';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=> $this->collection,
            'meta'=>[
                'total_diyetisyenler'=>$this->collection->count(),
                'diyetisyen' => 'value'
            ]
            ];
    }
}
