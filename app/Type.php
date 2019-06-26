<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function spareparts()
    {
        return $this->hasMany('App\Sparepart');
    }
    public function brands()
    {
        return $this->hasMany('App\Brand');
    }
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
