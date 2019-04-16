<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entladung extends Model
{
    public function we()
    {
        return $this->hasMany('App\We');
    }
}
