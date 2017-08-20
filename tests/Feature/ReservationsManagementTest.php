<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReservationsManagementTest extends TestCase
{
    use DatabaseMigrations;

	/** @test */
	function un_usuario_autorizado_puede_realizar_una_reservacion()
	{
		$this->signIn();

		$reservation = make('App\Reservation');

		$response = $this->post('/reservations', $reservation->toArray());

		$this->get($response->headers->get('Location'))
			->assertSee(strval($reservation->number_of_seats));
	}

	/** @test */
	function un_usuario_autorizado_puede_consultar_sus_reservaciones()
	{
		$this->signIn();

		$userReservation = create('App\Reservation', ['user_id' => auth()->id()]);
		$reservation = create('App\Reservation', ['number_of_seats' => 11 ]);

		$this->get('/reservations')
			->assertSee(strval($userReservation->number_of_seats))
		  	->assertDontSee(strval($reservation->number_of_seats));
	}
}
