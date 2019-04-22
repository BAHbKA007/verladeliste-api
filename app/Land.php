<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    public $timestamps = false;

    public function lieferant()
    {
        return $this->hasMany('App\Lieferant', 'land_id');
    }
}
