<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #e2e2e2;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('MuroIndex')}}">
            <span class="text-dark fs-4 fw-bold">Sistema</span>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('VehiculosIndex')}}">Vehículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('RutinasIndex')}}">Rutinas de Mantenimiento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('MantenimientosIndex')}}">Programación de Mantenimientos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-dark">Usuario: {{auth()->user()->username}}</span>
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