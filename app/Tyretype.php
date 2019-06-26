<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyretype extends Model
{
    public function types()
    {
        return $this->hasMany('App\Types');
    }
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
