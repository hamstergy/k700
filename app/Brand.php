<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function types()
    {
        return $this->belongsTo('App\Type', 'type_id','id');
    }
    public function models()
    {
        return $this->hasMany('App\Specmodel');
    }
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
