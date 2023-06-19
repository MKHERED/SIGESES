<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGESES') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/signin.css') }}">
    <link rel="website icon" href="{{asset('recursos/icon.png')}}">

    <!-- Scripts  -->
    <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar small navbar-expand-sm navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="text-decoration: underline; text-decoration-color:orange;" >
                    {{ config('app.name', 'SIGESES') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest


                        @else
                        @if (Route::is('estaciones.index'))
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('estaciones.create') }}">Nueva Estación</a>
                                        <a class="dropdown-item" href="">Actualizar</a>
                                        <a class="dropdown-item" href="">Visitas</a>
                                        <a class="dropdown-item" href="{{ route('home') }}">Mapa</a>
                                    </div>
                            </li>
                            
                        @endif
                        @if (Route::is('estaciones.show'))
                        <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <!-- <a class="dropdown-item" href="{{ route('estaciones.create') }}">Nueva Estación</a> -->
                                        <a class="dropdown-item" href="{{ route('estaciones.edit', $estacion->id)}}">Editar estación</a>
                                        <a class="dropdown-item" href="">Visitas</a>
                                        <a class="dropdown-item" href="{{ route('home') }}">Mapa</a>
                                    </div>
                            </li>   
                        @endif
                        @if (Route::is('home'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('estaciones.index') }}">Estaciónes</a>
                                <!---------------------------------------- Poner una lista de todas -------------------------------------------->
                            </li>
                            
                        @endif
                        

                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    @if (Route::is('estaciones.create'))
                                        <a class="dropdown-item" href="{{ route('estaciones.index') }}">Estaciónes</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route ('home')}}">Inicio</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
