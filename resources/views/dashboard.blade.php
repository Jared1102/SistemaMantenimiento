@extends('layouts.app')

@section('container')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Mantenimientos proximos</h1>
        <table class="table table-bordered table-responsive table-striped">
            <tr class="table-primary">
                <th>Rutina</th>
                <th>Vehiculo</th>
                <th>Proxima fecha de rutina</th>
                <th>Quedan</th>
            </tr>
            @foreach ($mantenimientos as $mantenimiento)
                @if ($mantenimiento->diasFaltantes<=28)
                <tr>
                    <td>
                        {{$mantenimiento->rutina->descripcion}}
                    </td>
                    <td>
                        {{$mantenimiento->vehiculo->marca}} {{$mantenimiento->vehiculo->modelo}} {{$mantenimiento->vehiculo->anio}} Placas: {{$mantenimiento->vehiculo->placas}}
                    </td>
                    <td>
                        {{$mantenimiento->fecha}}
                    </td>
                    <td>
                        @if ($mantenimiento->diasFaltantes==0)
                            Es hoy.
                        @else 
                            {{$mantenimiento->diasFaltantes}} dias
                        @endif
                    </td>
                </tr>
                @endif    
                
            @endforeach
        </table>
    </div>
@endsection