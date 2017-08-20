<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FlightsManagementTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_usuario_puede_ver_los_vuelos_disponibles()
	{
		$this->signIn();

		$flight = create('App\Flight');

		$this->get('/flights')
			->assertSee($flight->cod);

	}
}
