@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tarjeta de embarque</div>

                <div class="panel-body">
                    <div class="col-md-6">
                    <p>
                        Cliente: {{ $place->owner->first_name }} {{ $place->owner->first_name }} <br> 
                        Número de cédula: {{ $place->owner->ced }} <br> 
                        Código de vuelo: {{ $place->flight->cod }} <br>
                        Lugar de salida: {{ $place->flight->departureAirport->location }} <br> 
                        Lugar de llegada: {{ $place->flight->arrivalAirport->location }} <br>
                    </p>

                    </div>
                     
                     <div class="col-md-6">
                        Fecha de salida: {{ $place->flight->departure_time }} <br>
                        Fecha de llegada: {{ $place->flight->arrival_time }} <br>
                        Avión designado: {{ $place->flight->plane->name }} <br>
                        Número de asiento: {{ $place->seat->cod }}
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


