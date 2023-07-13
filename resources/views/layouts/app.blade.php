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


    <link rel="stylesheet" href="{{asset('css/cheatsheet.css')}}"> 

    <!-- Scripts  -->
    <!-- <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script> -->
    
</head>
<body class="p-0">
    <div id="app">
        <nav class="navbar small navbar-expand-sm navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="text-decoration: underline; text-decoration-color:orange;" >
                    {{ config('app.name', 'SIGESES') }}
                </a>
                @if (Route::is('panel.index'))
                    <h7 class="navbar-brand text-light"><b style="text-decoration: underline; text-decoration-color:orange;">Estaciones</b></h7>
                          
                @endif

                @if (Route::is('panel.show') && isset($nombres) && !is_array($nombres))
                    <h7 class="navbar-brand text-light ">Documentos de la estación <b style="text-decoration: underline; text-decoration-color:orange;">{{$nombres->nombre_estacion}} </b></h7>
                          
                @endif
                
                <!-- En caso de Error -->
                @if (Route::is('panel.show') && isset($error) && !is_array($error))
                    <h7 class="navbar-brand text-light ">Documentos de la estación <b style="text-decoration: underline; text-decoration-color:orange;">{{$error}} </b></h7>
                @endif 
                

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
                        @if (Route::is('estaciones.index') || Route::is('panel.index') || Route::is('panel.detail') || Route::is('panel.document') || Route::is('panel.show') )
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->tipo_usuario)
                                            <a class="dropdown-item" href="{{ route('estaciones.create') }}">Nueva Estación</a>
                                            <a class="dropdown-item" href="{{ route('register') }}">Crear Usuario</a>
                                            
                                        @endif
                                        <a class="dropdown-item" href="">Actualizar</a>
                                        
                                        <a class="dropdown-item" href="{{ route('home') }}">Mapa</a>
                                    </div>
                            </li>
                            @if (Auth::user()->tipo_usuario && !(Route::is('panel.index')) && !(Route::is('panel.detail')) && !(Route::is('panel.document')) && !(Route::is('panel.show')))
                            <a id="navbarDropdown" class="nav-link" href="{{ route('panel.index') }}" role="button">Panel de administracion</a>                                
                            @endif
                            @if (Auth::user()->tipo_usuario && !(Route::is('estaciones.index')) && !(Route::is('estaciones.show')) && !(Route::is('estaciones.update')) && !(Route::is('estaciones.create')) && !(Route::is('estaciones.edit')))
                                <a id="navbarDropdown" class="nav-link" href="{{ route('estaciones.index') }}" role="button">Estaciones: Pagina Principal</a>
                            @endif
                            
                            @endif

                        @if (Route::is('estaciones.show'))
                        <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->tipo_usuario)
                                            <a class="dropdown-item" href="{{ route('estaciones.edit', $estacion->id)}}">Editar estación</a>
                                        @endif
                                        
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
        <div id="Box" class="bg-dark">
            <div class="box text-light text-center text-bold dark">    
                @if (Session::has('mensaje'))
                    {{ Session::get('mensaje')}}
                @endif
            </div>
        </div>
        @if (Route::is('panel.index') || Route::is('panel.document') || Route::is('panel.detail') || Route::is('panel.show'))
        <!--  -->
        <div class="row">
            <aside class="aside bd-code-snippet col-2">
                <ul class="list-group">
                    @if (Route::is('panel.index'))
                        <li class="list-group-item bg-warning">
                                <a class="btn btn-link eneable" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.index') }}">Estaciones</a>
                        </li>                       
                    @else
                        <li class="list-group-item ">
                                <a class="btn btn-link eneable" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.index') }}">Estaciones</a>
                        </li>                        
                    @endif


                    @if (Route::is('panel.document') || Route::is('panel.show'))
                        <li class="list-group-item bg-warning" >
                                <a class="btn btn-link" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.document') }}">Documentos</a>
                        </li>   
                    @else
                        <li class="list-group-item" >
                                <a class="btn btn-link" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.document') }}">Documentos</a>
                        </li>                        
                    @endif

                    
                    
                    @if (Route::is('panel.detail'))
                        <li class="list-group-item bg-warning" >
                                <a class="btn btn-link" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.detail') }}">Componentes</a>
                        </li>                        
                    @else
                        <li class="list-group-item" >
                                <a class="btn btn-link" style="width: 100%; text-decoration: none; color: black;" href="{{ route('panel.detail') }}">Componentes</a>
                        </li>                         
                    @endif


                </ul>
            </aside>    
            <section class="col-9">
                @yield('content')
            </section> 
        </div>
       
            
            
        @else
            @yield('content')
        @endif          
        
    </div>

     <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('js/cheatsheet.js') }}"></script>
</body>
</html>
