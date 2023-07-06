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
    <script src="{{asset('js/estadoslist.js') }}"></script>
    <script src="{{asset('js/gestion.js') }}"></script>
    
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
  <div class="container-xl rounded bg-light card mb-1">
    <h2 class="text-center mt-3 mb-3">Datos de la estación {{$estacion->nombre}}</h2>
    <div class="row mb-3">
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
            <p class="form-label"><b>Coordenadas</b></p>
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
            <p class="form-label"><b>Ubicación Nacional</b></p>
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
            <p class="form-label"><b>Funcionamiento</b> </p>
          </div>

          <div class="col-sm-5">
            <label class="form-label" for="Opera">Operativa</label>
            <input type="text" id="Opera" class="form-control" value="{{$estacion->operativa}}" disabled>
          </div>
          <div class="mt-3 row col-ms-12 text-center">
            <p class="form-label"><b>Componentes</b></p>
          </div>
          <div class="mt-3 row col-ms-12 border-bottom" style="margin-left: 0px;">
            <div class="col-sm-3 ">
              <p class="form-label"> <b>Serial</b></p>
            </div>
            <div class="col-sm-3">
              <p class="form-label"> <b>Fabricante</b></p>
            </div>
            <div class="col-sm-5 text-center">
              <p class="form-label"> <b>Descripción</b></p>
            </div>
          </div>
          @if ($detail->antena_gps == " ")
            <div class="col-ms-15 text-center">
              <p class="bg-dark border rounded text-light">Por favor registre los componentes
                <a href="{{route('details.index', $estacion->id )}}" style="text-decoration: none; color:white; " class="p-1 m-1 btn small btn-success" rel="noopener noreferrer">Ingresar</a>
              </p>
            </div>
          @endif
          

          <!-- -------------------------------------------------------------- -->
          
          <div class="">
            <label class="form-label" for="antena_gps">Antena GPS</label>
          </div>
  
          <div class="col-sm-3">
            <input type="text" id="antena_gps" class="form-control" value="{{$detail->antena_gps}}" disabled>
          </div>  
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->antena_gps_fab}}" disabled>
          </div>      
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->antena_gps_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Antena_Parabolica">Antena Parabolica</label>
          </div>
          
          <div class="col-sm-3">
            <input type="text" id="Antena_Parabolica" class="form-control" value="{{$detail->antena_parabolica}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->antena_parabolica_fab}}" disabled>
          </div> 
         <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->antena_parabolica_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Digitalizador">Digitalizador</label>
          </div>

          <div class="col-sm-3">  
            <input type="text" id="Digitalizador" class="form-control" value="{{$detail->digitalizador}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->digitalizador_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->digitalizador_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Modem_Satelital">Modem Satelital</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Modem_Satelital" class="form-control" value="{{$detail->modem_satelital}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->modem_satelital_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->modem_satelital_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Trompeta_Satelital">Trompeta Satelital</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Trompeta_Satelital" class="form-control" value="{{$detail->trompeta_satelital}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->trompeta_satelital_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->trompeta_satelital_esp}}" disabled>
          </div>
          
          <!-- -------------------------------------------------------------- -->
          <div class="border-bottom"></div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Bateria">Bateria</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Bateria" class="form-control" value="{{$detail->bateria}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->bateria_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->bateria_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div>
            <label class="form-label" for="Regulador_Carga">Regulador de Carga</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Regulador_Carga" class="form-control" value="{{$detail->regulador_carga}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->regulador_carga_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->regulador_carga_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
          <div class="">
            <label class="form-label" for="Controlador_Carga">Controlador de Carga</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Controlador_Carga" class="form-control" value="{{$detail->controlador_carga}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->controlador_carga_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->controlador_carga_esp}}" disabled>
          </div>

          <!-- -------------------------------------------------------------- -->

          <div class="">
            <label class="form-label" for="Panel_Solar">Panel Solar</label>
          </div>          
          <div class="col-sm-3">
            <input type="text" id="Panel_Solar" class="form-control" value="{{$detail->panel_solar}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->panel_solar_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->panel_solar_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->
  
          <div class="">
            <label class="form-label" for="Sismometro">Sismometro</label>
          </div>
          <div class="col-sm-3">
            <input type="text" id="Sismometro" class="form-control" value="{{$detail->sismometro}}" disabled>
          </div>
          <div class="col-sm-3">
            <input type="text" id="none" class="form-control" value="{{$detail->sismometro_fab}}" disabled>
          </div> 
          <div class="col-sm-6">
            <input type="text" style="height:fit-content;width: 100%;" id="none" class="form-control" value="{{$detail->sismometro_esp}}" disabled>
          </div>
          <!-- -------------------------------------------------------------- -->


        </div>
          <!-- -------------------------------------------------------------- -->

      </div class="mb-3 pb-3">


        
        <!-- ----------------------------------------------------------Separacion -->    
      
      <div id="imagenes" class="col-md-6">
        @foreach ($link_docs->take(6) as $link_doc)
          <a target="_blank" class="text-center d-grid" style="justify-items: center; text-decoration: none; color:black;" href="{{asset('storage').'/'.$link_doc->direccion}}">
          @if(in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif')))
            <img class = "mt-1 mb-1 rounded" src="{{asset('storage').'/'.$link_doc->direccion}}" alt="{{$link_doc->created_at}}" width="100%" height="300px">
          
            @elseif(in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'bin')))
            <!-- Los iconos son de https:  www.flaticon.es packs file-formats-9  asi para que no lo reconozca el navegador-->
            
            @if (in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('pdf')))
              <div class="col">
                <img class = "row mt-1 mb-1 rounded" src="{{asset('recursos/iconos files/pdf.png')}}" alt="{{$link_doc->nombre}}" width="160px" height="160px">
                <label class="" for="">{{$link_doc->nombre}}</label>                  
              </div>
              
              

            @elseif (in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('doc', 'dotx','docx')))
              <div class="col">
                <img class="row mt-1 mb-1 rounded" src="{{asset('recursos/iconos files/docx.png')}}" alt="{{$link_doc->nombre}}" width="160px" height="160px">
                <label class="" for="">{{$link_doc->nombre}}</label>                
              </div>

              
            
            @elseif (in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('xls', 'xlsx')))
              <div class="col">
                <img class = "row mt-1 mb-1 rounded" src="{{asset('recursos/iconos files/excel.png')}}" alt="{{$link_doc->nombre}}" width="160px" height="160px">
                <label class="" for="">{{$link_doc->nombre}}</label>                
              </div>

              
            @endif
          
          @else
            <p>Este archivo no es una imagen ni un PDF {{$link_doc->nombre}}</p>            
           
          @endif
          </a>
        @endforeach
        
          <script>
            var img = document.getElementById('imagenes')
            img = img.childElementCount;
            url = "{{route('update',$estacion->id)}}"
            ImagenVerif(img, url);
          </script>
          
      </div>


    </div>
  </div>







</body>












@endsection