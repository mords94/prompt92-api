<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type'          => 'users',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->name,
            ],
            'relationships' => new UsersRelationShipResource($this),
            'links'         => [
                'self' => route('users.show', ['user' => $this->id]),
            ],
        ];
    }
}