@extends('layouts.app')

@section('container')
<div class="container mt-5 w-75 rounded p-3 bg-light">
    <h1 class="text-center">Editar Vehículo</h1>
    <div class="container">
        <form action="{{route('VehiculosUpdate', $vehiculo->id)}}" method="POST">
            @csrf @method('PATCH')
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{old('marca', $vehiculo->marca)}}">
                @error('marca')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo', $vehiculo->modelo)}}">
                @error('modelo')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <input type="text" name="anio" id="anio" class="form-control" value="{{old('anio', $vehiculo->anio)}}">
                @error('anio')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="placas" class="form-label">Placas</label>
                <input type="text" name="placas" id="placas" class="form-control" value="{{old('placas', $vehiculo->placas)}}">
                @error('placas')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mb-3 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('VehiculosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
    
@endsection