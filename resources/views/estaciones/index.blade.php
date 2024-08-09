@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/album.css') }}">
<script src="{{asset('js/estadoslist.js') }}"></script>
<script src="{{asset('js/gestion.js') }}"></script>



<div class="Box">
    
</div>
    <main>
    <div class="album py-2 bg-body-tertiary" >
        <div class="container">
           
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        
        @foreach ($estaciones as $estacion)
        <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
        <div class="col-sm-12 col-md-6 col-lg-4" role="link" onclick='window.location="{{route('estaciones.show', $estacion->id)}}"'>
        <div class="card shadow-sm text-center">
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage').'/'.$estacion->imagen_n}}" width="100%" height="225" alt="Foto de {{ $estacion->nombre }}">
            <div class="card-body small">
              <p class="card-text h5">{{ $estacion->nombre }}</p>
                <div class="p-2 card-body bg-light">
                    <h6 class="text-center">Ubicación</h6>
                    <p class="card-text p-1">{{ $estacion->ubicacion }}</p>

                </div>
              <div class="m-1 btn-group">
                <p class="p-1 m-1"><b>Siglas: </b>{{ $estacion->siglas}}</p>              
                <p class="p-1 m-1"><b>Operativa: </b>{{ $estacion->operativa}}</p>                
              </div> 
              <div class="m-1 btn-group">
                <p class="p-1 m-1"><b>Ubicación Estadal: </b> {{ $estacion->estado }}</p>
                
              </div>
              <br>
              <div class="p-1 m-1 btn-group">   
                &nbsp;
                <p class="m-1 small"><b>Longitud: <br></b>{{ $estacion->longitud }}</p>
                &nbsp;
                <p class="m-1 small"><b>Latitud: <br></b>{{ $estacion->latitud }}</p>
                &nbsp;
                <p class="m-1 small"><b>Altitud: <br></b>{{ $estacion->elevacion }}</p>
              </div>

              <div class="d-flex justify-content-end align-items-center">
                <small id="actua" class="text-body-secondary"><b>Actualizado: </b> {{ $estacion->updated_at}}</small>

                <script>
                    var valor = @json($estacion->updated_at);
                    var objeto = document.getElementById('actua');

                    qSmall(objeto, valor)
                </script>
              </div>
            </div>
          </div>
        </div>

        @endforeach 
        @if ($estaciones == [])
        <div class="position-absolute top-50 start-50 translate-middle text-center" >
        @if (Auth::user()->tipo_usuario)
        
          <a href="{{ route('estaciones.create') }}" style="text-decoration: none !important;">
            <svg id="Layer_1" height="25" viewBox="0 0 24 24" width="25" data-name="Layer 1"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 21a9 9 0 1 1 9-9 9.01 9.01 0 0 1 -9 9zm5-9a1.5 1.5 0 0 1 -1.5 1.5h-2v2a1.5 1.5 0 0 1 -3 0v-2h-2a1.5 1.5 0 0 1 0-3h2v-2a1.5 1.5 0 0 1 3 0v2h2a1.5 1.5 0 0 1 1.5 1.5z" fill='#2EA043'/></svg>
            <p class="text-dark" >
              Registre una nueva estación
            </p>

          </a>
        @else
        <svg id="Layer_1" height="25" viewBox="0 0 24 24" width="25" data-name="Layer 1"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 21a9 9 0 1 1 9-9 9.01 9.01 0 0 1 -9 9zm5-9a1.5 1.5 0 0 1 -1.5 1.5h-2v2a1.5 1.5 0 0 1 -3 0v-2h-2a1.5 1.5 0 0 1 0-3h2v-2a1.5 1.5 0 0 1 3 0v2h2a1.5 1.5 0 0 1 1.5 1.5z" fill='#2EA043'/></svg>
        <p class="text-dark" >Pidale a un administrador que registre una nueva estación</p>

       
        @endif
       </div>
        @endif
        </div>
        
@endsection
