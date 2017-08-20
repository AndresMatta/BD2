<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    public function flights()
    {
    	return $this->hasMany(Flight::class);
    }

    public function seats()
    {
    	return $this->hasMany(Seat::class);
    }
}
