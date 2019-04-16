<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class We extends Model
{
    public function lkw()
    {
        return $this->belongsTo('App\Lkw');
    }

    public function liferant()
    {
        return $this->hasMany('App\lieferant');
    }
}
