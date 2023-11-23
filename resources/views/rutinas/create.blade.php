@extends('layouts.app')

@section('container')
    <h1 class="text-center">Nueva Rutina de Mantenimiento</h1>
    <div class="container w-75">
        <form action="{{route('RutinasStore')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
                @error('descripcion')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{route('RutinasIndex')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection