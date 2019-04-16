<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class We extends Model
{
    public function lkw()
    {
        return $this->belongsTo('App\Lkw');
    }

    public function lieferant()
    {
        return $this->hasOne('App\Lieferant');
    }

}
