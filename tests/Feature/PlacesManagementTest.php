<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlacesManagementTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_usuario_puede_obtener_sus_plazas()
	{
		$this->signIn();

		$place = create('App\Place', ['user_id' => auth()->id()]);

		$this->get('/places')
			->assertSee($place->cod);		
	}
}
