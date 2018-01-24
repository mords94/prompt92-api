<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UsersRelationshipResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'emails' => new EmailsResource($this->emails)
        ];
    }
}
