<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieferant extends Model
{
    public function land()
    {
        return $this->belongsTo('App\Land');
    }
}
