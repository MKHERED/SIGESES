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
  <div class="container-xl  rounded bg-light card mb-1">
    <h2 class="text-center mt-3 mb-3">Datos de la estación {{$estacion->nombre}}</h2>
    <div class="row mb-3">
      <div class="col-md-5 col-lg-6">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label" for="Nombre">Nombre de la estación</label>
            <input type="text" id="Nombre" class="form-control" value="{{$estacion->nombre}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Siglas">Siglas</label>
            <input type="text" id="Siglas" class="form-control" value="{{$estacion->siglas}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Estado">Estado</label>
            <input type="text" id="Estado" class="form-control" value="{{$estacion->estado}}" disabled>
          </div> 
          <div class="col-sm-6">
            <label class="form-label" for="Ubicacion">Ubicación</label>
            <input type="text" style="height:fit-content;width: 100%;" id="Ubicacion" class="form-control" value="{{$estacion->ubicacion}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="municipio">Municipio</label>
            <input type="text" style="height:fit-content;width: 100%;" id="municipio0" class="form-control" value="{{$estacion->municipio}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="instalacion">Instalada</label>
            <input type="text" style="height:fit-content;width: 100%;" id="instalacion" class="form-control" value="" disabled>
          </div>
          <script>
              quita('instalacion', @json($estacion->created_at))
          </script>

        </div>
        
        <div class="row g-3 mt-1">

          <div class="col-ms-12 text-center">
            <p class="form-label"><b>Coordenadas</b></p>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Latitud">Latitud</label>
            <input type="text" id="Latitud" class="form-control" value="{{$estacion->latitud}}" disabled>
          </div>      
          <div class="col-sm-6">
            <label class="form-label" for="Coor">Longitud</label>
            <input type="text" id="Coor" class="form-control"  value="{{$estacion->longitud}}" disabled>
          </div>       
 
          <div class="col-sm-6">
            <label class="form-label" for="Altitud">Elevación</label>
            <input type="text" id="Altitud" class="form-control" value="{{$estacion->elevacion}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="azimut">Azimut</label>
            <input type="text" id="azimut" class="form-control" value="{{$estacion->azimut}}" disabled>
          
          </div>       
          <div class="col-sm-12 text-center">
            <p class="form-label"><b>Datos generales</b></p>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="Region">Segmento Satelital</label>
            <input type="text" id="Region" class="form-control" value="{{$estacion->seg_satelital}}" disabled>
          </div>          
          <div class="col-sm-6">
            <label class="form-label" for="Region">Frecuencia Asignada</label>
            <input type="text" id="Region" class="form-control" value="{{$estacion->frecuencia}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="">Nivel</label>
            <input type="text" id="" class="form-control" value="{{$estacion->nivel}}" disabled>
          </div> 
          <div class="col-sm-6">
            <label class="form-label" for="">Nº Carina</label>
            <input type="text" id="" class="form-control" value="{{$estacion->carina}}" disabled>
          </div> 

          <div class="col-ms-12 text-center">
            <p class="form-label"><b>Estado de la estación</b> </p>
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="Opera">Operativa</label>
            <input type="text" id="Opera" class="form-control" value="{{$estacion->operativa}}" disabled>
          </div>

          <div class="col-sm-6">
            <label class="form-label" for="">Custodio</label>
            <input type="text" id="" class="form-control" value="{{$estacion->custodio}}" disabled>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="">Dependencia</label>
            <input type="text" id="" class="form-control" value="{{$estacion->dependencia}}" disabled>
          </div> 
          <div class="col-sm-6">
            <label class="form-label" for="">Telefono</label>
            <input type="text" id="" class="form-control" value="{{$estacion->tlf_custodio}}" disabled>
          </div> 
          
          
          @if (($detail->id == '') && (Auth::user()->tipo_usuario))
            <div class="col-ms-15 text-center">
              <p class="bg-dark border rounded text-light">Por favor registre los componentes
                <a href="{{route('details.index', $estacion->id )}}" style="text-decoration: none; color:white; " class="p-1 m-1 btn small btn-success" rel="noopener noreferrer">Ingresar</a>
              </p>
            </div>
          @endif

          <div class="col small">
            <p class="text-center" ><b>Equipos</b></p>
            <table class="table table-bordered">
            <thead >
              <tr class="border-0">
                <th scope="col" class="border-0">Marca - Cantidad</th>
                <th scope="col" class="border-0">Modelo</th>
                <th scope="col" class="border-0">Watts</th>
                <th scope="col" class="border-0">Frecuencia / Banda</th>
                <th scope="col" class="border-0">Serial</th>
                <th scope="col" class="border-0">Fecha</th>

              </tr>
            </thead>

            <tbody>
              <tr><td colspan="6" class="text-center bg-dark text-light">Transmisión</td></tr>
              <tr><th colspan="6" class="" >Transceptor</th></tr>
              <tr>
                <td >{{$detail->transceptor_marca}}</td>
                <td>{{$detail->transceptor_modelo}}</td>
                <td>--</td>
                <td>--</td>
                <td>{{$detail->transceptor_serial}}</td>
                <td>{{$detail->transceptor_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >GPS</th></tr>
              <tr>
                <td >{{$detail->antena_gps_marca}}</td>
                <td>{{$detail->antena_gps_modelo}}</td>
                <td>--</td>
                <td></td>
                <td>{{$detail->antena_gps_serial}}</td>
                <td>{{$detail->antena_gps_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Parabolica</th></tr>
              <tr>
                <td >{{$detail->parabolica_marca}}</td>
                <td>@if ($detail['parabolica_diametro'])
                      {{$detail->parabolica_diametro}} mts
                    @endif
                </td>
                <td>--</td>
                <td>--</td>
                <td>{{$detail->parabolica_serial}}</td>
                <td>{{$detail->parabolica_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >BUC</th></tr>
              <tr>
                <td >{{$detail->BUC_marca}}</td>
                <td>{{$detail->BUC_modelo}}</td>
                <td>--</td>
                <td>{{$detail->BUC_frecuencia}}</td>
                <td>{{$detail->BUC_serial}}</td>
                <td>{{$detail->BUC_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >LNB</th></tr>
              <tr>
                <td >{{$detail->LNB_marca}}</td>
                <td>{{$detail->LNB_modelo}}</td>
                <td>--</td>
                <td>{{$detail->LNB_frecuencia}} / {{$detail->LNB_banda}} </td>
                <td>{{$detail->LNB_serial}}</td>
                <td>{{$detail->LNB_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Trompeta</th></tr>
              <tr>
                <td >{{$detail->trompeta_marca}}</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>{{$detail->trompeta_serial}}</td>
                <td>{{$detail->trompeta_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Digitalizador</th></tr>
              <tr>
                <td >{{$detail->digitalizador_marca}}</td>
                <td>{{$detail->digitalizador_modelo}}</td>
                <td>--</td>
                <td>--</td>
                <td>{{$detail->digitalizador_serial}}</td>
                <td>{{$detail->digitalizador_fecha}}</td>
              </tr>

              <tr><td colspan="6" class="text-center bg-dark text-light">Sensor</td></tr>
              <tr>
                <td >{{$detail->sensor_marca}}</td>
                <td>{{$detail->sensor_modelo}}</td>
                <td>--</td>
                <td>{{$detail->sensor_sen}}</td>
                <td>{{$detail->sensor_serial}}</td>
                <td>{{$detail->sensor_fecha}}</td>
              </tr>

              <tr><td colspan="6" class="text-center bg-dark text-light">Energia</td></tr>
              <tr><th colspan="6" class="" >Regulador de Voltaje</th></tr>
              <tr>
                <td>{{$detail->regulador_voltaje_marca}}</td>
                <td>{{$detail->regulador_voltaje_modelo}}</td>
                <td>{{$detail->regulador_voltaje_watts}}</td>
                <td>--</td>
                <td>{{$detail->regulador_voltaje_serial}}</td>
                <td>{{$detail->regulador_voltaje_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Banco de Baterias</th></tr>
              <tr>
                <td >{{$detail->banco_baterias_marca}} - {{$detail->banco_baterias_cantidad}}</td>
                <td>{{$detail->banco_baterias_modelo}}</td>
                <td>{{$detail->banco_baterias_watts}}</td>
                <td>--</td>
                <td>{{$detail->banco_baterias_serial}}</td>
                <td>{{$detail->banco_baterias_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Panel Sorlar 1</th></tr>
              <tr>
                <td >{{$detail->panel_solar_a_marca}}</td>
                <td>{{$detail->panel_solar_a_modelo}}</td>
                <td>{{$detail->panel_solar_a_watts}}</td>
                <td>--</td>
                <td>{{$detail->panel_solar_a_serial}}</td>
                <td>{{$detail->panel_solar_a_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Panel Sorlar 2</th></tr>
              <tr>
                <td >{{$detail->panel_solar_b_marca}}</td>
                <td>{{$detail->panel_solar_b_modelo}}</td>
                <td>{{$detail->panel_solar_b_watts}}</td>
                <td>--</td>
                <td>{{$detail->panel_solar_b_serial}}</td>
                <td>{{$detail->panel_solar_b_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Panel Sorlar 3</th></tr>
              <tr>
                <td >{{$detail->panel_solar_c_marca}}</td>
                <td>{{$detail->panel_solar_c_modelo}}</td>
                <td>{{$detail->panel_solar_c_watts}}</td>
                <td>--</td>
                <td>{{$detail->panel_solar_c_serial}}</td>
                <td>{{$detail->panel_solar_c_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Panel Sorlar 4</th></tr>
              <tr>
                <td>{{$detail->panel_solar_d_marca}}</td>
                <td>{{$detail->panel_solar_d_modelo}}</td>
                <td>{{$detail->panel_solar_d_watts}}</td>
                <td>--</td>
                <td>{{$detail->panel_solar_d_serial}}</td>
                <td>{{$detail->panel_solar_d_fecha}}</td>
              </tr>
              <tr><th colspan="6" class="" >Panel Sorlar 5</th></tr>
              <tr>
                <td >{{$detail->panel_solar_e_marca}}</td>
                <td>{{$detail->panel_solar_e_modelo}}</td>
                <td>{{$detail->panel_solar_e_watts}}</td>
                <td>--</td>
                <td>{{$detail->panel_solar_e_serial}}</td>
                <td>{{$detail->panel_solar_e_fecha}}</td>
              </tr>

            </table>
          </div>
 

        </div>
      </div>
        <!-- ----------------------------------------------------------Separacion -->    
        
      <div id="imagenes" class="col-md-6 text-center">
        <div class="" style="height:300px; width:100%">
          <div id="map" class="p-1 rounded-2" style="width: 100%; height:100%"></div>

          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
          <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
          <script>
              const y = @json($estacion->longitud);
              const x = @json($estacion->latitud);
              const nombre = @json($estacion->nombre);

              var map = L.map('map').setView([x,y], 7);
              L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                          maxZoom: 14,
                          minZoom: 6,
                      }).addTo(map);
              
                   var popup = L.popup([x, y], {
                    content: '<b>'+nombre+'</b>',
                    keepInView: true,
                    closeButton: false,
                    closeOnClick: false,
                   })
                  .openOn(map);



             
          </script>
        </div>
        <br>
        <div class="col-md-12 text-center">
          <b>Imagenes de la estación</b>
        </div>
        <hr>
        @foreach ($link_docs->take(6) as $link_doc)
          <a target="_blank" class="text-center d-grid" style="justify-items: center; text-decoration: none; color:black;" href="{{asset('storage').'/'.$link_doc->direccion}}">
          @if(in_array(pathinfo($link_doc->direccion, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif')))
            <div class="col mt-1" style="max-height: 255px;">
              <img class = "mt-1 mb-1 rounded limited" src="{{asset('storage').'/'.$link_doc->direccion}}" alt="{{$link_doc->created_at}}">
            </div>
            
          
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
            urldoc = "{{route('panel.show', $estacion->id)}}"
            ImagenVerif(img, url, urldoc);
          </script>        
      </div>



    </div>
  </div>







</body>












@endsection