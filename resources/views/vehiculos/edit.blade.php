@extends('layouts.app')

@section('container')
    <h1 class="text-center mt-5">Editar Vehículo</h1>
    <div class="container w-75">
        <form action="{{route('VehiculosUpdate', $vehiculo->id)}}" method="POST">
            @csrf @method('PATCH')
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{old('marca', $vehiculo->marca)}}">
                @error('marca')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo', $vehiculo->modelo)}}">
                @error('modelo')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="anio" class="form-label">Año</label>
                <input type="text" name="anio" id="anio" class="form-control" value="{{old('anio', $vehiculo->anio)}}">
                @error('anio')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="placas" class="form-label">Placas</label>
                <input type="text" name="placas" id="placas" class="form-control" value="{{old('placas', $vehiculo->placas)}}">
                @error('placas')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('VehiculosIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection