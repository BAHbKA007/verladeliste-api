<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lkw extends Model
{
    public function we()
    {
        return $this->hasMany('App\We', 'lkw_id');
    }
}
