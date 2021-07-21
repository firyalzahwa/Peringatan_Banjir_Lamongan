<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
 	protected $table ='populations';
    protected $fillable = ['id','dist_id','village_id', 'total'];

    public function procedure() {
        return $this->belongsTo('App\District','dist_id');
    }

    public function district() {
        return $this->belongsTo('App\District','dist_id');
    }
}
