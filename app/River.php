<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class River extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'id_dist',
    	'kecamatan',
    	'jum_sungai'
    ];
    
    public function district() {
        return $this->hasMany('App\District');
    }

    public function rivers() {
        return $this->hasMany('App\River');
    }
}