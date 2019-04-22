<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lkw extends Model
{
    public $timestamps = false;

    public function we()
    {
        return $this->hasMany('App\We', 'lkw_id');
    }
}
