@extends('layouts.app')

@section('container')
    <div class="container mt-5 p-3 dashboard bg-light">
        <h1 class="text-center mb-4">Mantenimientos proximos</h1>
        @if (count($mantenimientos)>0)
        <table class="table table-bordered table-responsive table-striped">
            <caption>Mantenimientos</caption>
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
        @else
            <p class="text-center">No hay mantenimientos pendientes. <a href="{{route('MantenimientosIndex')}}">Programe un mantenimiento.</a></p>
        @endif
        
    </div>
@endsection