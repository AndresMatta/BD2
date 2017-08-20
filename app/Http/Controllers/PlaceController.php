<?php

namespace App\Http\Controllers;

use App\Place;
use App\Flight;
use App\Seat;
use App\Reservation;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
    	$places = Place::latest()->where('user_id', auth()->id())->get();

    	return view('places.index', ['places' => $places]); 
    }

    public function store(Request $request)
    {
    	$flight = Flight::find(request('flight_id'));

    	$this->validate($request, [
            'flight_id' => 'required|exists:flights,id',
        ]);

        $this->newPlace(request('reservation_id'), $flight);

        return redirect('/places');	
    }

    public function show(Place $place)
    {
        return view('places.show', ['place' => $place]);
    }

    public function newCod()
    {   
        $count =  Place::count() + 1;
        
        return "PL" . $count;
    }

    public function newPlace($reservationId, Flight $flight)
    {
        $plane = $flight->plane->id;
        
         if ($reservationId) {

            $reservation = Reservation::find($reservationId);

            for ($i=0; $i < $reservation->number_of_seats; $i++) {
                
                $seat = Seat::create([
                    'cod' => 'ST' . (Seat::count() + 1),
                    'plane_id' => $plane
                ]);

                $place = Place::create([
                    'cod' => $this->newCod(),
                    'user_id' => auth()->id(),
                    'flight_id' => request('flight_id'),
                    'seat_id' => $seat->id
                ]);       
            }

            return $reservation->accomplished();
        }

        $seat = Seat::create([
                'cod' => 'ST' . (Seat::count() + 1),
                'plane_id' => $plane
            ]);

        $place = Place::create([
                'cod' => $this->newCod(),
                'user_id' => auth()->id(),
                'flight_id' => request('flight_id'),
                'seat_id' => $seat->id
        ]);

        return $flight->updateSeats(1);
    }

}
