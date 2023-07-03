@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/album.css') }}">
<script src="{{asset('js/estadoslist.js') }}"></script>



<div class="Box">
    <h6 class="text-center m-1">Estaciones</h6>
</div>
    <main>
    <div class="album py-0 bg-body-tertiary" >
        <div class="container">
           
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @foreach ($estaciones as $estacion)
        <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
        <div class="col btn btn-light" role="link" onclick='window.location="{{route('estaciones.show', $estacion->id)}}"'>
        <div class="card shadow-sm small">
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
              <div class="p-1 m-1 btn-group">   
                &nbsp;
                <p class="m-1 small"><b>Longitud: <br></b>{{ $estacion->longitud }}</p>
                &nbsp;
                <p class="m-1 small"><b>Latitud: <br></b>{{ $estacion->latitud }}</p>
                &nbsp;
                <p class="m-1 small"><b>Altitud: <br></b>{{ $estacion->altitud }}</p>
              </div>

              <div class="d-flex justify-content-end align-items-center">
                <small class="text-body-secondary"><b>Actualizado: </b> {{ $estacion->updated_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach 

        </div>
        
@endsection