<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FlightTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_vuelo_tiene_un_avion_designado()
	{
		$flight = create('App\Flight');
		$this->assertInstanceOf('App\Plane', $flight->plane);
	}

	/** @test */
	function un_vuelo_tiene_un_aeropuerto_de_salida_designado()
	{
		$flight = create('App\Flight');
		$this->assertInstanceOf('App\Airport', $flight->departureAirport);    	
	}

	/** @test */
	function un_vuelo_tiene_un_aeropuerto_de_llegada_designado()
	{
		$flight = create('App\Flight');
		$this->assertInstanceOf('App\Airport', $flight->arrivalAirport);    	
	}

	/** @test */
	function un_vuelo_puede_tener_muchas_reservaciones()
	{
		$flight = create('App\Flight');
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection', $flight->reservations
		);    	
	}
}
