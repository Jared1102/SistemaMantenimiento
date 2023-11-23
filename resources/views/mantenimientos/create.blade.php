@extends('layouts.app')

@section('container')
    <h1 class="text-center">Nuevo Mantenimiento</h1>
    <div class="container w-75">
        <form action="{{route('MantenimientosStore')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rutina" class="form-label">Rutina de Mantenimiento</label>
                <select name="rutina" class="form-select">
                    @foreach ($rutinas as $rutina)
                        <option value="{{$rutina->id}}">{{$rutina->descripcion}}</option>
                    @endforeach
                </select>
                @error('rutina')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="vehiculo" class="form-label">Vehículo</label>
                <select name="vehiculo" class="form-select">
                    @foreach ($vehiculos as $vehiculo)
                        <option value="{{$vehiculo->id}}">{{$vehiculo->marca}} {{$vehiculo->modelo}} {{$vehiculo->anio}} Placas: {{$vehiculo->placas}}</option>
                    @endforeach
                </select>
                @error('vehiculo')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha')}}">
                @error('fecha')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('MantenimientosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection