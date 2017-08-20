<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SeatTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_asiento_pertence_a_un_avion()
	{
		$seat = create('App\Seat');
		$this->assertInstanceOf('App\Plane', $seat->plane);	
	}
}
