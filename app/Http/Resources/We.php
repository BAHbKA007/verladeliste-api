<?php

namespace App\Http\Resources;
use App\Lieferant;
use App\Artikel;
use App\Gebinde;
use App\Entladung;

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
            'produkt' => Artikel::find($this->artikel_id),
            'gebinde' => Gebinde::find($this->gebinde_id),
            'paletten' => $this->paletten,
            'menge' => $this->menge,
            'lieferant' => Lieferant::find($this->lieferant_id),
            'preis' => $this->preis,
            'entladung' => Entladung::find($this->entladung_id),
            'ankunft' => $this->ankunft,
            'verladung' => $this->verladung,
            'lkw_id' => $this->lkw_id,
            'we_nr' => $this->we_nr,
            'ls_nr' => $this->ls_nr
        ];    
    }
}
