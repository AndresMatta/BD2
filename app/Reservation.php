<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $guarded = [];

	public function path()
    {
        return "/reservations/{$this->id}";
    }

    public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function flight()
	{
		return $this->belongsTo(Flight::class);
	}

	public function accomplished()
	{
		$this->accomplished = true;

		$this->save();
	}
}
