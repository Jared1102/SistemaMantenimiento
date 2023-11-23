@extends('layouts.app')

@section('container')
<div class="container mt-5 w-75 rounded p-3 bg-light">
    <h1 class="text-center">Nueva Rutina de Mantenimiento</h1>
    <div class="container">
        <form action="{{route('RutinasStore')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 mt-2 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('RutinasIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection