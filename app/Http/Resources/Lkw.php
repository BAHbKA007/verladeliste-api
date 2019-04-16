<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lkw extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        //     'lkw' => $this->lkw,
        //     'frachtkosten' => $this->frachtkosten,
        //     'ankunft' => $this->ankunft,
        //     'wes' => We::collection($this->we),
        //     'spedition' => $this->spedition,
        //     'kommentar' => $this->kommentar
        // ];
        return We::collection($this->we);
    }
}
