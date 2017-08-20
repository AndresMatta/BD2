<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Flight;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()
            ->where('user_id', auth()->id())
            ->where('accomplished', false)
            ->get();
    	return view('reservations.index', ['reservations' => $reservations]);
    }

    public function create(Flight $flight)
    {
        return view('reservations.create', ['flight' => $flight]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'flight_id' => 'required|exists:flights,id',
            'number_of_seats' => 'required',
        ]);
        
        $reservation = Reservation::create([
        	'cod' => $this->newCod(),
            'user_id' => auth()->id(),
            'flight_id' => request('flight_id'),
            'number_of_seats' => request('number_of_seats'),
            'accomplished' => false
        ]);

        $reservation->flight->updateSeats($reservation->number_of_seats);

        return redirect($reservation->path());
    }

    public function show(Reservation $reservation)
    {
    	return view('reservations.show', ['reservation' => $reservation]);
    }

    public function destroy(Reservation $reservation)
    {   
        $reservation->flight->restoreSeat($reservation->number_of_seats);
        $reservation->delete();

        return redirect('/reservations');
    }
    public function newCod()
    {   
        $count =  Reservation::count() + 1;
        
        return "RS" . $count;
    }
}
