<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema</title>
        

        @vite(['resources/js/app.js','resources/css/app.css','resources/css/app.css'])
        
    </head>
    <body style="background-image: url({{Vite::asset('resources/img/bienvenida.jpg')}})">
        @include('partials.menuprincipal')
        @if (session('status'))
            <div class="container mt-3" id="statusMessage">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
            <script>
                setTimeout(function() {
                    var statusMessage = document.getElementById('statusMessage');
                    if (statusMessage) {
                        statusMessage.classList.add('hidden');
                        setTimeout(function() {
                            statusMessage.style.display = 'none';
                        }, 500);
 
                    }
                }, 3000);
            </script>
        @endif         
        @yield('container')
        @yield('js')
    </body>
</html>