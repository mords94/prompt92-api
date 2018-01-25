<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EmailResource extends Resource
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
            'type'          => 'emails',
            'id'            => (string)$this->id,
            'attributes'    => [
                'address' => $this->address,
            ],
        ];
    }
}
