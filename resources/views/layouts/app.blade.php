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
    <script src="{{asset('js/gestion.js')}}"></script>

    <!-- Scripts  -->
    <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
    <!------------------------------------------------------------------------------------------------------>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <style>
        .z-5000 {
            z-index: 5000;
        }
    </style>   
</head>
<body class="p-0">

    <div id="app"  
    @if (Route::is('login'))
         style="height:90%"
    @endif >
        <nav class="navbar small navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top z-5000">
            @if (Route::is('login') | Route::is(''))
            <div class="container justify-content-center d-block">            
                    <div class="text-center justify-content-center mb-0 pb-0">
                        <h2 class="h2  fw-normal text-light text" style="text-decoration: underline; text-decoration-color:orange;">Bienvenido al <b style="color:orange;">SIGESES</b></h2>  
                        <p class="small text-light pb-0 mb-0">Sistema de Gestión de Estaciones Sismologicas</p>
                    </div>

            @else
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/home') }}" style="text-decoration: underline; text-decoration-color:orange;" >
                        {{ config('app.name', 'SIGESES') }}
                    </a>                    
            @endif
                @if(Route::is('estaciones.visita') || Route::is('estaciones.visitas') || Route::is('estaciones.vEdit') || Route::is('details.index'))
                    <h7 class="navbar-brand text-light">
                        <a class="text-light" href="{{route('estaciones.show', $estacion->id)}}" style="text-decoration-color:orange;"> 
                        @if (isset($visit))    
                            {{$visit->siglas}}
                        @else
                            {{$estacion->siglas}}
                        @endif
                        </a>
                    </h7>                                 
                @endif
                @if (Route::is('estaciones.index'))
                    <h7 class="navbar-brand text-light"><b style="text-decoration: underline; text-decoration-color:orange;">Estaciones</b></h7>
                @endif

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
                @if (Route::is('estaciones.edit'))
                    <h6 class="navbar-brand text-light p-0 m-0">Edición</h6> 
                @endif

                @if (!(Route::is('login')))
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav ms-auto">
                    @if (Route::is('estaciones.index'))
                        @if (!$estaciones == [])
                            <form action="{{route('estaciones.index')}}" method="get">
                           
                                <div class="text-center input-group">
                                    <select type="list" class="form-control-sm border-warning bg-dark text-light " id="buscador"   name="buscador" value="all">
                                            <option value="all">Todos</option>
                                        @foreach ($estaciones as $estacion)
                                            <option value="{{$estacion->siglas}}">{{$estacion->nombre}}: {{$estacion->siglas}}</option>
                                        @endforeach
                                           
                                    </select>
                                    <input class="btn btn-dark border-warning btn-sm p-1" style=" width:55px" type='submit' value='Buscar'>
                                </div>
                            </form>
                                        
                        @endif                        
                    @endif

                    </ul>
                    <!-- <ul class='navbar-nav ms-auto'>

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        @if (!(Route::is('login') || Route::is('home') || Route::is('estaciones.index') ||  Route::is('estaciones.show')))
                        
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:history.back()" > < Volver</a>
                            </li>                            
                        
                        @endif

                        <!-- Authentication Links -->
                        @if (Route::is('estaciones.index') || Route::is('panel.index') || Route::is('panel.detail') || Route::is('panel.document') || Route::is('panel.show') || Route::is('estaciones.visita') || Route::is('estaciones.visitas') || Route::is('estaciones.vEdit') || Route::is('details.index'))

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->tipo_usuario)
                                            <a class="dropdown-item" href="{{ route('estaciones.create') }}">Nueva Estación</a>
                                            @if (Auth::user()->username == 'root')
                                                <a class="dropdown-item" href="{{ route('register') }}">Crear Usuario</a>
                                            @endif
                                            
                                            
                                        @endif
                                        <a class="dropdown-item" href="">Actualizar</a>
                                        
                                        <a class="dropdown-item" href="{{ route('home') }}">Mapa</a>
                                    </div>
                            </li>
                            @if (Auth::user()->tipo_usuario && !(Route::is('panel.index')) && !(Route::is('panel.detail')) && !(Route::is('panel.document')) && !(Route::is('panel.show')) && !(Route::is('estaciones.visita')) && !(Route::is('estaciones.visitas')) && !(Route::is('estaciones.vEdit')) && !(Route::is('details.index')))
                                <a class="nav-link" href="{{ route('panel.index') }}" role="button">Panel de administracion</a>                                
                            @endif
                            
                            {{-- && !(Route::is('estaciones.index')) && !(Route::is('estaciones.update')) && !(Route::is('estaciones.create')) && !(Route::is('estaciones.edit')) && !(Route::is('estaciones.visita')) && !(Route::is('estaciones.visitas')) && !(Route::is('estaciones.vEdit')) && !(Route::is('details.index')) && !(Route::is('estaciones.show'))  --}}
                            @if (Auth::user()->tipo_usuario && !(Route::is('estaciones.index')) && !(Route::is('estaciones.update')) && !(Route::is('estaciones.create')) && !(Route::is('estaciones.edit')) && !(Route::is('estaciones.visita')) && !(Route::is('estaciones.visitas')) && !(Route::is('estaciones.vEdit')) && !(Route::is('details.index')) )
                                <a class="nav-link" href="{{ route('estaciones.index') }}" role="button">Estaciones: Pagina Principal</a>
                            @endif
                                
                            @if(Route::is('estaciones.visita') || Route::is('estaciones.visitas') || Route::is('estaciones.vEdit') || Route::is('details.index'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('estaciones.show', $estacion->id)}}" > 
                                    @if (isset($visit))    
                                        {{$visit->siglas}}
                                    @else
                                        {{$estacion->siglas}}
                                    @endif
                                    </a>
                                </li>                                 
                            @endif

                            @endif

                        @if (Route::is('estaciones.show'))
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('estaciones.index') }}" role="button">Estaciones</a>
                        </li>
                        <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Opciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->tipo_usuario)
                                            <a class="dropdown-item" href="{{ route('estaciones.edit', $estacion->id)}}">Editar estación</a>
                                            <a class="dropdown-item" href="{{route('update',$estacion->id)}}">Subir documentos</a>
                                            @endif
                                        
                                        <a class="dropdown-item" href="{{ route('estaciones.visita', $estacion->id) }}">Visitas</a>
                                        
                                        <a class="dropdown-item" href="{{ route('home') }}">Mapa</a>
                                    </div>
                            </li>   
                        @endif
                        @if (Route::is('home') || Route::is('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('estaciones.index') }}">Estaciones</a>
                                <!---------------------------------------- Poner una lista de todas -------------------------------------------->
                            </li>
                            
                        @endif
                        @if (Route::is('estaciones.edit'))
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('estaciones.index') }}"  style="text-decoration: underline; text-decoration-color:red;">Cancelar</a>
                            </li>
                            
                        @endif
                        
                            @guest
                            @else
                            <li class="nav-item dropdown">
                           
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    @if (Route::is('estaciones.create'))
                                        <a class="dropdown-item" href="{{ route('estaciones.index') }}">Estaciones</a>
                                    @endif
                                    <a class="dropdown-item" href="{{route ('home')}}">Inicio</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
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
        <!-- -webkit-fill-available -->
        @if (Session::has('mensaje'))


        <div id="mensaje">
            <style>
                #Box {
                    z-index: 5000;
                }
            </style>
            <div id="Box" class="d-grid position-absolute" style="width: 100%; justify-content: center; margin-top: 0px ;">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong>Información &nbsp;</strong> {{Session::get('mensaje')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>            
        </div>

    
        <script>

            let to = mensaje.clientHeight + Box.clientHeight;
            //let toa =Box.clientHeight;

            function llamada() {
                animate({
                        duration: 2000,
                        timing: makeEaseOut(quad),
                        draw(progress) {
                            Box.style.top = to * progress + 'px'
                        }
                    }); 
            }
            llamada()
            function llamada2() {
                animate({
                        duration: 2000,
                        timing: makeEaseOut(quad),
                        draw(progress) {
                            toa = Box.clientHeight;
                            Box.style.top = (toa *-progress) + toa + 'px'
                            Box.style.opacity = (100 * -progress) + 100

                            if (Box.style.opacity <= 0 ) {
                                Box.remove()
                            }                           
                        }
                    });

            }
            var n = 0;
            var time = window.setInterval(function(){
            n++;
            console.log(n)
                
            if (n==3) {
               llamada2()
            }
            if (n==4) {
                
                clearInterval(time);
            }
        },1000)

        </script>
        @endif
        @if (Route::is('panel.index') || Route::is('panel.document') || Route::is('panel.detail') || Route::is('panel.show') || Route::is('panel.user') || Route::is('panel.buscar'))
        <!--  -->
        <div class="row gx-0 ">
            <nav class="nav justify-content-around container-lg mt-1">
                <div class="nav-item d-flex ">
                    <h4 class="align-self-center" id="lugar"></h4>
                </div>
                <div class="nav-item col-4 m-1">
                    @if (Route::is('panel.detail'))
                    <form action="{{route('panel.detail')}}" method="post">
                    @csrf
                        <div class="input-group row">
                            <label class="input-group-text border-warning col-auto">Filtro: </label>
                            <select class="form-control small p-1 border-warning col-auto" type="list" name="detail" >
                                        <option class="" value="all">Todas</option>
                                        <option class="" value="antena_gps_">Antena GPS</option>
                                        <option class="" value="banco_baterias_">Banco Baterias</option>
                                        <option class="" value="BUC_">BUC</option>
                                        <option class="" value="digitalizador_">Digitalizador</option>
                                        <option class="" value="LNB_">LNB</option>
                                        <option class="" value="panel_solar_">Panel solar</option>
                                        <option class="" value="parabolica_">Parabolica</option>
                                        <option class="" value="regulador_voltaje_">Regulador de voltaje</option>
                                        <option class="" value="sensor_">Sensor</option>
                                        <option class="" value="transceptor_">Transceptor</option>
                                        <option class="" value="trompeta_">Trompeta</option>  
                            </select>
                            <input type="text" class="form-control border-warning col-auto" placeholder="Serial" name="serial">
                            <button class="btn btn-warning form-control text-center col-12" type="submit">Buscar</button>
                        </div>
                    
                    </form>




                    @elseif (Route::is('panel.index') || Route::is('panel.document') || Route::is('panel.buscar') || Route::is('panel.user'))
                        <form action="{{Route('panel.buscar')}}" method="post">
                            @csrf
                            <div class="input-group small">
                                <input type="text" class="form-control border-warning small " id="buscador" name="buscar" placeholder="Nombre de la estación o sus siglas">
                                <input type="text" id="seccion" name="seccion" hidden>

                                <input class="btn border-warning bg-warning text-light btn-sm p-1" style=" width:55px" type="submit" value="Buscar">
                            </div>
                        </form>                    
                    @endif

                </div>
                <div class="nav nav-tabs mb-3 nav-item small" id="nav-tab" role="tablist">
                    <button class="nav-link p-0 " id="Estaciones" data-bs-toggle="tab"  type="button"  role="tab">
                        <a class="nav-link text-dark" href="{{ route('panel.index') }}">Estaciones</a>
                    </button>
                    <button class="nav-link p-0" id="Documentos" data-bs-toggle="tab"  type="button" role="tab">
                        <a class="nav-link text-dark" href="{{ route('panel.document') }}">Documentos</a>

                    </button>
                    <button class="nav-link p-0 " id="Componentes" data-bs-toggle="tab" type="button" role="tab">
                        <a class="nav-link text-dark" href="{{ route('panel.detail') }}">Componentes</a>

                    </button> 
                    
                    @if (Auth::user()->username == 'root')

                        <button class="nav-link p-0" id="Usuarios" data-bs-toggle="tab"  type="button" role="tab" >
                            <a class="nav-link text-dark" href="{{ route('panel.user') }}">Usuarios</a>

                        </button>
                    @endif

                    <script>
                        @if (Route::is('panel.document'))
                            var v = 'Documentos';
                        @elseif (Route::is('panel.detail'))
                            var v = 'Componentes';                   
                        @elseif (Route::is('panel.user'))
                            var v = 'Usuarios';
                            var b = document.getElementById('buscador')
                            b.placeholder = 'Nombre de usuario o cedula de identidad';
                            @if (isset($seccion))
                                var s = String(@json($seccion))
                                var sc = document.getElementById('seccion');
                                sc.value = s;                                  
                            @endif
                        @elseif (Route::is('panel.index'))
                            var v = 'Estaciones';
                        @elseif (Route::is('panel.buscar'))
                            var a = String(@json($buscar));
                            var v = 'Busqueda realizada:' ;
                            var b = document.getElementById('buscador')
                            b.value = a;

                            @if (isset($seccion))
                                var s = String(@json($seccion))
                                var sc = document.getElementById('seccion');
                                sc.value = s;                                  
                            @endif
                        @endif

                        if (v) {
                            if (v != 'Estaciones') {
                                var lu = document.getElementById('lugar');
                                lu.insertAdjacentText('beforeend', v);     
                            }
                           
                           var bt = document.getElementById(v);
                           bt.classList.add('active');

                           var sc = document.getElementById('seccion');
                           sc.value = v;
                        }

                    </script>
                </div>
            </nav>

            <section class="col-12 align-items-end ">
                @yield('content')
            </section> 
        </div>
       
            
            
        @else
            @yield('content')
        @endif          
        
    </div>

     {{-- aqui iba el js de boostrap min js --}}
     <script src="{{asset('js/cheatsheet.js') }}"></script>
</body>
</html>
