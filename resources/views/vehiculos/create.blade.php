@extends('layouts.app')

@section('container')
    <h1 class="text-center">Nuevo Vehículo</h1>
    <div class="container w-75">
        <form action="{{route('VehiculosStore')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{old('marca')}}">
                @error('marca')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{old('modelo')}}">
                @error('modelo')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="anio" class="form-label">Año</label>
                <input type="text" name="anio" id="anio" class="form-control" value="{{old('anio')}}">
                @error('anio')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="placas" class="form-label">Placas</label>
                <input type="text" name="placas" id="placas" class="form-control" value="{{old('placas')}}">
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