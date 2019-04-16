<?php

namespace App\Http\Resources;
use App\Land;

use Illuminate\Http\Resources\Json\JsonResource;

class Lieferant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nummer' => $this->nummer,
            'rabatt' => $this->rabatt,
            'land' => [
                'land_id' => $this->land_id,
                'land_name' => Land::select('lands.name')->where('id', $this->land_id)->pluck('name')[0]
            ]
        ];
    }
}
