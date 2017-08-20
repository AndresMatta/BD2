@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis plazas</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Destino</th>
                                <th>Fecha</th>
                                <th>Avión</th>
                                <th>Asiento</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td>{{ $place->cod }}</td>
                                    <td>{{ $place->flight->arrivalAirport->location }}</td>
                                    <td>{{ $place->flight->departure_time }}</td>
                                    <td>{{ $place->flight->plane->name }}</td>
                                    <td>{{ $place->seat->cod }}</td>
                                    <td><a href="/places/{{$place->id}}">Ver</a></td>
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