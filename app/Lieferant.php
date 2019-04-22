<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieferant extends Model
{
    public $timestamps = false;

    public function land()
    {
        return $this->belongsTo('App\Land');
    }

    public function we()
    {
        return $this->belongsTo('App\We');
    }
}
