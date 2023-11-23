<nav class="navbar navbar-expand-lg sticky-top text-light" style="background-color: #007BFF;">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{route('MuroIndex')}}">
            <span class="text-dark fs-4 fw-bold">Sistema</span>
        </a> --}}
        <a class="navbar-brand" href="{{route('MuroIndex')}}">
          <img src="{{Vite::asset('resources/img/calendario.png')}}" alt="Logo" width="32" height="26" class="d-inline-block align-text-top">
          Sistema de Mantenimiento
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('VehiculosIndex')}}">
              <img src="{{Vite::asset('resources/img/vehiculo.png')}}" alt="Vehiculo" width="32" height="26" class="d-inline-block align-text-top">
              Vehículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('RutinasIndex')}}">
              <img src="{{Vite::asset('resources/img/rutina.png')}}" alt="Vehiculo" width="32" height="26" class="d-inline-block align-text-top">
              Rutinas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('MantenimientosIndex')}}">
              <img src="{{Vite::asset('resources/img/programacion.png')}}" alt="Vehiculo" width="32" height="26" class="d-inline-block align-text-top">
              Programación de Mantenimientos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                  </svg>
                  {{auth()->user()->username}}
                </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <form action="{{route('LogoutStore')}}" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-sm">Cerrar Sesión</button>
                </form></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>