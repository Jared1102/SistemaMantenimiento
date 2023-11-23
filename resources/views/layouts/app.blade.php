<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema</title>
        <link rel="preload" as="style" href="http://localhost:8000/build/assets/app-041e359a.css" />
        <link rel="modulepreload" href="http://localhost:8000/build/assets/app-14070805.js" />
        <link rel="stylesheet" href="http://localhost:8000/build/assets/app-041e359a.css" />
        <script type="module" src="http://localhost:8000/build/assets/app-14070805.js"></script>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        @include('partials.navegacion')
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
