@extends('layouts.app')

@section('container')
<div class="container mt-5 w-75 rounded p-3 bg-light">
    <h1 class="text-center">Nuevo Mantenimiento</h1>
    <div class="container">
        <form action="{{route('MantenimientosStore')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="rutina" class="form-label">Rutina de Mantenimiento</label>
                
                <select name="rutina" class="form-select">
                    <option value="" selected></option>
                    @foreach ($rutinas as $rutina)
                        <option value="{{$rutina->id}}">{{$rutina->descripcion}}</option>
                    @endforeach
                </select>
                @error('rutina')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vehiculo" class="form-label">Vehículo</label>
                <select name="vehiculo" class="form-select">
                    <option value="" selected></option>
                    @foreach ($vehiculos as $vehiculo)
                        <option value="{{$vehiculo->id}}">{{$vehiculo->marca}} {{$vehiculo->modelo}} {{$vehiculo->anio}} Placas: {{$vehiculo->placas}}</option>
                    @endforeach
                </select>
                @error('vehiculo')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha')}}">
                @error('fecha')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-2 mb-3 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('MantenimientosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection