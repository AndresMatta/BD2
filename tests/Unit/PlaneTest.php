<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlaneTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_avion_se_utiliza_para_muchos_vuelos()
	{
		$plane = create('App\Plane');
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection', $plane->flights
		);
	}

	/** @test */
	function un_avion_posee_muchos_asientos()
	{
		$plane = create('App\Plane');
		$this->assertInstanceOf(
			'Illuminate\Database\Eloquent\Collection', $plane->seats
		);  	
	}
}
