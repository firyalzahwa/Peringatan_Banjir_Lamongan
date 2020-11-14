<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProcedure extends Model
{
    public $timestamps = false;

    public function procedure() {
        return $this->belongsTo(Procedure::class, 'sop_id');
    }
}
