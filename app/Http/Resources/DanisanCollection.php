<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DanisanCollection extends ResourceCollection
{
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
                'total_danisanlar'=>$this->collection->count(),
                'danisan' => 'value'
            ]
        ];
    }
}
