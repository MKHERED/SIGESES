@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Estación</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    
</head>
<body>
  <div class="p-4 p-md-5 mb-4" style="background-image:url('{{ asset('storage').'/'.$estacion->imagen_n}}');background-repeat: no-repeat; background-size: cover; width:100%; height:500px">
    <div class="col-md-6 px-0">
      
      <h1 class="text-light display-4 fst-italic">
        <b>
          {{$estacion->nombre}}
        </b> 
      </h1>
      <p class="lead my-3 text-light">{{$estacion->ubicacion}}</p>
    </div>
  </div>
  <div class="container-xxl rounded bg-light card">
    <h2 class="text-center mt-3 mb-3">Datos de la estación {{$estacion->nombre}}</h2>
    <div class="row">
      <div class="col-md-5 col-lg-6">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label" for="Nombre">Nombre de la estacion</label>
            <input type="text" id="Nombre" class="form-control" value="{{$estacion->nombre}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Siglas">Siglas</label>
            <input type="text" id="Siglas" class="form-control" value="{{$estacion->siglas}}" disabled>
          </div>
          <div class="col-sm-12">
            <label class="form-label" for="Ubicacion">Ubicacion</label>
            <input type="text" style="height:fit-content;width: 100%;" id="Ubicacion" class="form-control" value="{{$estacion->ubicacion}}" disabled>
          </div>
        </div>
        
        <div class="row g-3 mt-1">

          <div class="col-ms-12 text-center">
            <p class="form-label">Coordenadas</p>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Coor">Longitud</label>
            <input type="text" id="Coor" class="form-control"  value="{{$estacion->longitud}}" disabled>
          </div>       
          <div class="col-sm-6">
            <label class="form-label" for="Latitud">Latitud</label>
            <input type="text" id="Latitud" class="form-control" value="{{$estacion->latitud}}" disabled>
          </div>       
          <div class="col-sm-6">
            <label class="form-label" for="Altitud">Altura</label>
            <input type="text" id="Altitud" class="form-control" value="{{$estacion->altitud}}" disabled>
          </div> 

          <div class="col-ms-12 text-center">
            <p class="form-label">Ubicación Nacional</p>
          </div>
          
          <div class="col-sm-6">
            <label class="form-label" for="Estado">Estado</label>
            <input type="text" id="Estado" class="form-control" value="{{$estacion->estado}}" disabled>
          </div>       
          <div class="col-sm-6">
            <label class="form-label" for="Region">Region</label>
            <input type="text" id="Region" class="form-control" value="{{$estacion->region}}" disabled>
          </div>  
          
          <div class="col-ms-12 text-center">
            <p class="form-label">Funcionamiento</p>
          </div>

          <div class="col-sm-5">
            <label class="form-label" for="Opera">Operativida</label>
            <input type="text" id="Opera" class="form-control" value="{{$estacion->operativa}}" disabled>
          </div>
          
          <div class="col-ms-12 text-center">
            <p class="form-label">Componentes instalados</p>
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="Siglas">Siglas</label>
            <input type="text" id="Siglas" class="form-control" value="{{$estacion->siglas}}" disabled>
          </div>       
          <div class="col-sm-6">
            <label class="form-label" for="Siglas">Siglas</label>
            <input type="text" id="Siglas" class="form-control" value="{{$estacion->siglas}}" disabled>
          </div>
        </div>

      </div>


        
        <!-- ----------------------------------------------------------Separacion -->    
      
      <div class="col-md-6">
        aqui poner imagenes  
      </div>


    </div>
  </div>







</body>












@endsection