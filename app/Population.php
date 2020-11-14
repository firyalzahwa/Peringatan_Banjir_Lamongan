<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    public $timestamps = false;
    
    public function village() {
        return $this->belongsTo('App\Village');
    }

}
