<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlaceTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function una_plaza_pertenece_a_un_usuario()
	{
		$place = create('App\Place');
		$this->assertInstanceOf('App\User', $place->owner);
	}

	/** @test */
	function una_plaza_pertenece_a_un_vuelo()
	{
		$place = create('App\Place');
		$this->assertInstanceOf('App\Flight', $place->flight);   	
	}

	/** @test */
	function una_plaza_posee_un_numero_de_asiento()
	{
		$place = create('App\Place');
		$this->assertInstanceOf('App\Seat', $place->seat);    	
	}
}
