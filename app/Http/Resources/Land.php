<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Land extends JsonResource
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
            'land_id' => $this->id,
            'land_name' => $this->name
        ];

    }
}
