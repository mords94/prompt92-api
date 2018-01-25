<?php

namespace App\Http\Resources;

use App\Helpers\Traits\ResourcePaginationTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;


class UsersResource extends ResourceCollection
{

    use ResourcePaginationTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
            'links' => $this->paginationLinks(),
            'meta' => $this->paginationMeta(),
        ];
    }


}
