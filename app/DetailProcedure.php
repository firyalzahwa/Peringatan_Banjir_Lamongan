<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProcedure extends Model
{
    protected $table ='detail_procedure';
    protected $fillable = ['id', 'nama'];

    public function procedure() {
        return $this->belongsTo(Procedure::class, 'sop_id');
    }
}