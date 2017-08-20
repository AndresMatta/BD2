<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AirportTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_aeropuerto_es_usado_para_la_salida_de_vuelos()
	{
		$airport = create('App\Airport');
		$this->assertInstanceof(
			'Illuminate\Database\Eloquent\Collection', $airport->flightsDeparting);
	}

	/** @test */
	function un_aeropuerto_es_usado_para_la_llegada_de_vuelos()
	{
		$airport = create('App\Airport');
		$this->assertInstanceof(
			'Illuminate\Database\Eloquent\Collection', $airport->flightsArrived);
	}
}
