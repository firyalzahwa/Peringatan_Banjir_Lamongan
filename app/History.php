<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public $timestamps = false;

    public function village() {
        return $this->belongsTo('App\Village');
    }
}
