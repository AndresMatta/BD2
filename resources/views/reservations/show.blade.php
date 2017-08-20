@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Reservación</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        Número de reserva: {{ $reservation->cod }} <br>
                        Código del vuelo: {{ $reservation->flight->cod }} <br>
                        Cantidad de plazas reservadas: {{ $reservation->number_of_seats }} <br>
                        Destino: {{ $reservation->flight->arrivalAirport->location }} <br>
                        Fecha: {{ $reservation->flight->departure_time }}    
                    </div>
                     
                     <div class="col-md-6">
                         <form action="/places" method="POST">
                         {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="flight_id" value="{{ $reservation->flight->id }}">
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                <button type="submit" class="btn btn-default">Obtener plazas</button>
                            </div>
                         </form>

                         <form action="{{ $reservation->path() }}" method="POST">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Eliminar Reserva</button>
                            </div>
                         </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


