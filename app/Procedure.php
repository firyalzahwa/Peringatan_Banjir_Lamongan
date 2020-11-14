<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    public $timestamps = false;
    
    public function detail_procedure() {
        return $this->hasMany(DetailProcedure::class, 'sop_id');
    }
}
