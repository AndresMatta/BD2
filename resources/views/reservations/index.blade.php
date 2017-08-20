@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reservaciones</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Destino</th>
                                <th>Fecha</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->cod }}</td>
                                    <td>{{ $reservation->flight->arrivalAirport->location }}</td>
                                    <td>{{ $reservation->flight->departure_time }}</td>
                                    <td><a href="/reservations/{{ $reservation->id }}">Ver</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection