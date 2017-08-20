<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
	protected $guarded = [];

    public function plane()
    {
    	return $this->belongsTo(Plane::class);
    }

    public function newCode()
    {
    	$count = $this->count() + 1;

    	return "ST" . $count;
    }
}
