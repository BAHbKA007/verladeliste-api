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
        return $this->hasMany('App\Lieferant');
    }

    public function artikel()
    {
        return $this->hasMany('App\Artikel');
    }

    public function gebinde()
    {
        return $this->hasMany('App\Gebinde');
    }

    public function entladung()
    {
        return $this->hasMany('App\Entladung');
    }
}
