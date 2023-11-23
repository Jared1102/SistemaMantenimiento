@extends('layouts.app')

@section('container')
<div class="container mt-5 w-75 rounded p-3 bg-light">
    <h1 class="text-center">Editar Mantenimiento</h1>
    <div class="container">
        <form action="{{route('MantenimientosUpdate', $mantenimiento->id)}}" method="POST">
            @csrf @method('PATCH')
            <div class="mb-3">
                <label for="rutina" class="form-label">Rutina de Mantenimiento</label>
                <select name="rutina" class="form-select">
                    @foreach ($rutinas as $rutina)
                        <option value="{{$rutina->id}}" @if ($rutina->id==$mantenimiento->rutinas_id)
                            selected
                        @endif>
                            {{$rutina->descripcion}}
                        </option>
                    @endforeach
                </select>
                @error('rutina')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vehiculo" class="form-label">Vehículo</label>
                <select name="vehiculo" class="form-select">
                    @foreach ($vehiculos as $vehiculo)
                        <option value="{{$vehiculo->id}}" @if($vehiculo->id==$mantenimiento->vehiculos_id) selected @endif>
                            {{$vehiculo->marca}} {{$vehiculo->modelo}} {{$vehiculo->anio}} Placas: {{$vehiculo->placas}}
                        </option>
                    @endforeach
                </select>
                @error('vehiculo')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Nombre</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $mantenimiento->fecha)}}">
                @error('fecha')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 mt-2 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('MantenimientosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection