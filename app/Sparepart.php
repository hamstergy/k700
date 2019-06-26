<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
    public function types()
    {
        return $this->belongsTo('App\Type', 'type_id','id');
    }
}
