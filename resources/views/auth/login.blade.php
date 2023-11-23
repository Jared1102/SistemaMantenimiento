@extends('layouts.app_principal')

@section('container')
<div class="contenedor" style="align-items: center">
    <div class="center_fondo">
        <div class="fondo">
            <div class="contendor-form login">
                <h2>Login</h2>
                <form action="{{route('LoginStore')}}" method="post">
                    @csrf
                    @if (session('mensaje'))
                        <div class="alerta">
                            {{session('mensaje')}}
                        </div>
                    @endif
                    <div class="contenedor-input">
                        <span class="icono">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                              </svg>
                        </span>
                        <input type="text" name="username" id="username" required>
                        <label for="username">Usuario</label>
                        @error('username')
                            <div class="alerta">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <div class="contenedor-input">
                        <span class="icono">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                              </svg>
                        </span>
                        <input type="password" name="password" id="password" required>
                        <label for="password">Contraseña</label>
                        @error('password')
                            <div class="alerta">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
    
                    <button type="submit" class="btn-login">Iniciar Sesion</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
{{-- <h1 class="text-center text-light">Login</h1>
<div class="container w-75 text-light">
    <form action="{{route('LoginStore')}}" method="POST">
        @csrf
        <div class="form-group mt-2">

            @if(session('mensaje'))
                    <div style="color:red">{{session('mensaje')}}</div>
            @endif

            <label for="username" class="form-label">Usuario</label>
            <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}" placeholder="Escribe tu usuario">
            @error('username')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Escribe tu contraseña">
            @error('password')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            <a href="{{route('Index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div> --}}
@endsection