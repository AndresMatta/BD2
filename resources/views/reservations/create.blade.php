@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Realizar Reservación</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/reservations">
                        {{ csrf_field() }}
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Información de reserva
                            </div>
                            <div class="panel-body">
                                <div class="col-md-6">  
                                    Cliente: {{ auth()->user()->first_name }}  {{ auth()->user()->last_name }} <br>
                                    Código de vuelo: {{ $flight->cod }} <br>
                                    Destino: {{ $flight->arrivalAirport->location}} <br>
                                </div>
                                
                                <div class="col-md-6">
                                    Salida: {{ $flight->departure_time }} <br>
                                    Llegada: {{ $flight->arrival_time }} <br>
                                    Asientos disponibles: {{ $flight->available_seats }}
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                        <div class="form-group{{ $errors->has('number_of_seats') ? ' has-error' : '' }}">
                            <label for="number_of_seats" class="col-md-4 control-label">Cantidad de asientos</label>

                            <div class="col-md-6">
                                <input id="number_of_seats" type="number" class="form-control" name="number_of_seats" value="{{ old('number_of_seats') }}" required autofocus max="{{ 
                                    $flight->available_seats}}" min="1">

                                @if ($errors->has('number_of_seats'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_seats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
