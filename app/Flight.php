<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function plane()
    {
    	return $this->belongsTo(Plane::class);
    }

    public function departureAirport()
    {
    	return $this->belongsTo(Airport::class, 'departure_airport');
    }

    public function arrivalAirport()
    {
    	return $this->belongsTo(Airport::class, 'arrival_airport');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function updateSeats($places)
    {
        $seats = $this->available_seats;
        $this->available_seats = $seats - $places;
        $this->save();
    }

    public function restoreSeat($seats)
    {
        $this->available_seats += $seats;
        $this->save(); 
    }
}
