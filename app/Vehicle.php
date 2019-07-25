<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function type()
    {
        return $this->hasOne('App\Type', 'id','spectype_id');
    }
}
