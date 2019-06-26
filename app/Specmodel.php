<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specmodel extends Model
{
    public function brands()
    {
        return $this->belongsTo('App\Brand', 'brand_id','id');
    }
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
