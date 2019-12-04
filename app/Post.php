<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}
