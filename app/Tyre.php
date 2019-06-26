<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    public function types()
    {
        return $this->belongsTo('App\Tyretype', 'type_id','id');
    }
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
