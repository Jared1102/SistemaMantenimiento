<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style="background-color: #007BFF;">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{route('Index')}}">
            <span class="text-primary fs-4 fw-bold">Sistema</span>
        </a> --}}
        <a class="navbar-brand" href="{{route('Index')}}">
          <img src="{{Vite::asset('resources/img/calendario.png')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          Sistema de Mantenimiento
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('LoginIndex')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
              </svg>
              Iniciar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
</nav>