<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class River extends Model
{
    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->format('d M Y H:i');
    }

    
}
