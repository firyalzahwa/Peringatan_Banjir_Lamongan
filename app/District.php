<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    
    public function villages() {
        return $this->hasMany('App\Village');
    }

    public function rivers() {
        return $this->hasMany('App\River');
    }
}
