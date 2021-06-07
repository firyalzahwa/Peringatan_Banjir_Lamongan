<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landheight extends Model
{
    protected $fillable = [ 'village_id', 'total'];
    public $timestamps = false;

    public function village() {
        return $this->belongsTo('App\Village');
    }

    
}
