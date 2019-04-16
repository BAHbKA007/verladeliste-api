<?php

namespace App\Http\Resources;
use App\Lieferant;

use Illuminate\Http\Resources\Json\JsonResource;

class We extends JsonResource
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
            'id' => $this->id,
            'produkt' => $this->produkt,
            'gebinde' => $this->gebinde,
            'paletten' => $this->paletten,
            'menge' => $this->menge,
            'lieferant' => [
                'id' => $this->lieferant_id,
                'name' => Lieferant::select('lieferants.name')->where('id', $this->lieferant_id)->pluck('name')[0]
            ],
            'preis' => $this->preis,
            'entladung' => $this->entladung,
            'ankunft' => $this->ankunft,
            'verladung' => $this->verladung,
            'lkw_id' => $this->lkw_id,
            'we_nr' => $this->we_nr,
            'ls_nr' => $this->ls_nr
        ];    
    }
}
