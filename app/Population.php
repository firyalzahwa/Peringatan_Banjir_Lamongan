<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
 	protected $table ='populations';
    protected $fillable = ['id', 'village_id', 'total'];

    public function procedure() {
        return $this->belongsTo('App\Village','village_id');
    }
}
