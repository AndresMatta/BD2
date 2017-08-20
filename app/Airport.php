<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function flightsDeparting()
    {
    	return $this->hasMany(Flight::class, 'departure_airport');
    }

    public function flightsArrived()
    {
    	return $this->hasMany(Flight::class, 'arrival_airport');
    }
}
