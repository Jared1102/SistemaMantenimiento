@extends('layouts.app')

@section('container')
<div class="container mt-5 w-75 rounded p-3 bg-light">
    <h1 class="text-center">Nuevo Vehículo</h1>
    <div class="container">
        <form action="{{ route('VehiculosStore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') }}">
                @error('marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}">
                @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <input type="text" name="anio" id="anio" class="form-control @error('anio') is-invalid @enderror" value="{{ old('anio') }}">
                @error('anio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="placas" class="form-label">Placas</label>
                <input type="text" name="placas" id="placas" class="form-control @error('placas') is-invalid @enderror" value="{{ old('placas') }}">
                @error('placas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('VehiculosIndex') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection