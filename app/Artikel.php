<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public $timestamps = false;

    public function we()
    {
        return $this->hasMany('App\We');
    }
}
