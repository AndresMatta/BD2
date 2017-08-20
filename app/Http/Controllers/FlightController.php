<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
    	$flights = Flight::latest()->paginate(5);

    	return view('flights.index', ['flights' => $flights]);
    }
}
