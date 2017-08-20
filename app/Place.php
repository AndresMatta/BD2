<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];
    
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function flight()
    {
    	return $this->belongsTo(Flight::class);
    }

    public function seat()
    {
    	return $this->belongsTo(Seat::class);
    }
}
