@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vuelos</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Hora de salida</th>
                                <th>Hora de llegada</th>
                                <th>Asientos disponibles</th>
                                <th>Sale de</th>
                                <th>Llega a</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <td>{{ $flight->cod }}</td>
                                    <td>{{ $flight->departure_time }}</td>
                                    <td>{{ $flight->arrival_time }}</td>
                                    <td>{{ $flight->available_seats }}</td>
                                    <td>{{ $flight->departureAirport->location }}</td>
                                    <td>{{ $flight->arrivalAirport->location }}</td>
                                    @if($flight->available_seats > 0)
                                    <td>
                                    <a href="/reservations/create/{{ $flight->id }}"><button class="btn btn-default">Reservar</button></a>
                                    <form action="/places" method="POST">
                                     {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                                            <input type="hidden" name="reservation_id" value="">
                                            <button type="submit" class="btn btn-default">Obtener plaza</button>
                                        </div>
                                     </form>
                                    </td>
                                    @else
                                        <td>
                                            <cite>No tiene asientos disponibles.</cite>
                                        </td>       
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{ $flights->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
