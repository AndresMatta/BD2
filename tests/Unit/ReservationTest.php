<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReservationTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function una_reserva_pertenece_a_un_usuario()
	{
		$reservation = create('App\Reservation');

		$this->assertInstanceOf('App\User', $reservation->owner);
	}

	/** @test */
  	function la_reservacion_es_para_un_vuelo()
  	{
  		$reservation = create('App\Reservation');

  		$this->assertInstanceOf('App\Flight', $reservation->flight);    	
  	}  	
}
