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
    <script src="{{asset('js/gestion.js') }}"></script>
    
</head>
<body >
  <!------------------------------------------------------------------------------------------------ Registro -->  

    <main class="text-start presentacion-main border-0 container-xl" style="background: none !important;">
    <div class="text-center">
        <h2 class="h5 m-3" style="text-decoration: underline; text-decoration-color:orange;">Ingrese los siguientes datos</h2>
    </div>

    <form method='POST' class="form small row" action="{{route('estaciones.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="number" hidden name='autor' value="{{Auth::user()->id}}">
        <div class="col-md-6 p-2 row g-3 mt-0 ">
            <div class="col-md-12 mt-0 p-1">
                <p class="text-center p-0 m-0 bg-warning"><b>Datos Generales</b></p>
            </div>
            <div class="col-sm-6">
              <label for="Estacion" class="form-label">Estación</label>
              <input type="text" class="form-control small" id="Estacion" placeholder="Nombre de la estación" name="nombre"  required value="{{old('nombre')}}" >
            </div>
            <div class="col-sm-6">
                <label  class="form-label" for="Abreviatura">Siglas</label>
                <input type="text" class="form-control" id="Abreviatura" placeholder="Abreviatura de la estación" name="siglas"  required value="{{old('siglas')}}">
            </div>
            <div class="col-sm-6">
                <label for="Ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="Ubicacion" placeholder="Ubicacion de la estación" name="ubicacion"  required value="{{old('ubicacion')}}">

            </div>
            <div class="col-sm-6">
                <label for="Estado" class="form-label">Estado</label>
                <select type="list" class="form-control" id="Estado" name="estado"  required value="{{old('estado')}}" onclick="estadoslist()">
                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                    </script>
                                   
                </select>  
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="municipio" placeholder="" name="municipio"  required value="{{old('municipio')}}">

            </div>
            
            <div class="col-12 row">
                <p class="p-2 mb-0 text-center" ><b>Portadora de Operaciones</b></p>
                <div class="col-sm-6">
                    
                    <label for="operadora">Frecuencia</label>
                    <input type="number" step="0.001" class="form-control" id="operadora" placeholder="" name="frecuencia"  required value="{{old('segmento')}}">

                </div>
                <div class="col-sm-6">
                    <label for="Nivel">Nivel de potencia</label>
                    <input type="text" class="form-control" id="Nivel" placeholder="" name="nivel"  required value="{{old('segmento')}}">

                </div>
                <div class="col-sm-6">
                    <label for="asig" class="form-label">Asignada a frecuencia</label>
                    <input type="text" class="form-control" id="asig" placeholder="" name="asig_frecuencia"  required value="{{old('asig_frecuencia')}}">

                </div>
                <div class="col-sm-6" >
                    <label for="carina" class="form-label">Nº Carina</label>
                    <select class="form-control" name="carina" id="carina"  required value="{{old('carina')}}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="Segmento" class="form-label">Segmento Satelital</label>
                    <select class="form-control" name="seg_satelital" id="Segmento">
                        <option value="Funvisis1">Funvisis1</option>
                        <option value="Funvisis2">Funvisis2</option>
                        <option value="Funvisis3">Funvisis3</option>
                        <option value="Funvisis4">Funvisis4</option>
                        <option value="Funvisis5">Funvisis5</option>
                        <option value="Funvisis6">Funvisis6</option>
                        <option value="Funvisis7">Funvisis7</option>
                        <option value="Funvisis8">Funvisis8</option>
                        <option value="Funvisis9">Funvisis9</option>
                        <option value="Funvisis10">Funvisis10</option>

                    </select>
                </div>               
            </div>

            <hr class="p-0 m-0 mt-2" >
            <div class="col-sm-12">
                <p class="text-center bg-primary text-light"><b>Datos del Custodio</b></p>
            </div>
            <div class="col-sm-6">
                <label for="Custodio" class="form-label">Custodio</label>
                <input type="text" class="form-control" id="Custodio" placeholder="" name="custodio"  required value="{{old('custodio')}}">
                <div class="alert alert-info p-1">
                    <small>Nombres y Apellidos de la persona a cargo</small>    
                </div>
            </div>
            <div class="col-sm-6">
                <label for="Custodio" class="form-label">Dependencia / Institución </label>
                <input type="text" class="form-control" id="Dependencia" placeholder="" name="dependencia"  required value="{{old('dependencia')}}">
                <div class="alert alert-info p-1">
                    <small>Nombre del ente al cual pertenece</small>    
                </div>
            </div>
            <div class="col-sm-6">
                <label for="tlf" class="form-label">Telefono del Custodio</label>
                <!-- \[0-9]{4}\g  [0-9]{3}[-][0-9]{4} -->
                <input type="text" class="form-control" id="tlf" placeholder="" pattern=".{15}"  name="tlf_custodio"  required value="{{old('tlf_custodio')}}">
                <div class="alert alert-info p-1">
                    <small>El Formato es (0400) 000-0000</small>    
                </div>
            </div>
            <div class="col-sm-6">
                <label for="created" class="form-label">Fecha de la instalación</label>
                <input type="date" class="form-control" id="create" placeholder="" name="created_at"  required value="{{old('created_at')}}" >
                <script>
                    fechaNow('#create')
                </script>
            </div>
        </div>
        
        <div class="col-md-6 p-2 row g-3 mt-0 align-self-baseline">
            <div class="col-md-12  p-1 mt-0 mb-0">
                <p class="text-center bg-danger text-light p-0 m-0"><b>Ubicación Geografica Remota</b></p>
            </div>
            
            <!--div class="col-sm-12 mt-0">
                <label for="dec" class="form-label">¿Que tipo de coordenada es?</label> 
                
                <label for="dec">GMS: &nbsp;</label><input class="form-check-input" type="checkbox" name="gms" id="gms" onclick="gmsutm()">

            </div-->
            <div class="col-sm-6 " id="Lat">
                <label for="Latitud" class="form-label">Latitud</label>
                <input type="number" class="form-control" step="0.00001" id="Latitud" name="latitud" placeholder="Decimales" required value="">
            </div>
            <div class="col-sm-6" id="Long">
                <label for="Longitud" class="form-label">Longitud</label>
                {{-- step="any" --}}
                <input type="number" class="form-control"  step="0.00001" id="Longitud" name="longitud" placeholder="Decimales" required value="">                               

            </div>

            <!--script src="{{ asset('js/gmsutm.js') }}"></script> 
            <script>
                window.onload=function(){
                    const checkbox =document.getElementById("gms");
                    checkbox.addEventListener("click", function() {

                    valor1 = 'Decimales o Grados';
                    valor2 = 'Decimales o Grados'; 

                    var long = document.getElementById('Longitud');
                    var lati = document.getElementById('Latitud');

                    long.placeholder = valor1
                    lati.placeholder = valor2                
                    } );
                }
            </script--> 
            <div class="col-md-12 mt-1 mb-1" style="height: 200px">
                <div id="map" class="p-1 rounded-2" style="width: 100%; height:100%"></div>

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                <script>
 
                    var map = L.map('map').setView([8.500000,-66.0188471], 7);
                    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                                maxZoom: 10,
                                minZoom: 6,
                            }).addTo(map);
                    
                    var long = document.getElementById('Longitud');
                    var lati = document.getElementById('Latitud');
                    var nombre = document.getElementById('Estacion');

                    valor1 = long.value;
                    valor2 = lati.value;

                    long.addEventListener('keyup', (a)=>{
                    valor1 = a.target.value.trim()
                    buscar(valor1, valor2, nombre)
                    })

                    lati.addEventListener('keyup', (e)=>{
                    valor2 = e.target.value.trim()
                    buscar(valor1, valor2, nombre)
                    })

                    nombre.addEventListener('keyup', (i)=>{
                    nombre = i.target.value.trim()
                    buscar(valor1, valor2, nombre)
                    })

                    function buscar(valor1, valor2, nombre) {
                         map.flyTo([valor2, valor1],8)
                         var popup = L.popup([valor2, valor1], {
                            content: '<b>'+nombre+'</b>',
                            keepInView: true,
                            closeButton: false,
                            closeOnClick: false,
                        }).openOn(map);
                    }
                    //buscar(valor1, valor2, nombre)

                </script>
            </div>
            <div class="col-sm-6 mt-0" id>
                <label for="Elevacion" class="form-label">Elevación</label>
                <input type="number" class="form-control" id="Elevacion" step="any" placeholder="Elevación de la estación" name="elevacion"  required value="{{old('elevacion')}}">
            </div>
            <div class="col-sm-6 mt-0" id>
                <label for="Azimut" class="form-label">Azimut</label>
                <input type="number" class="form-control" id="Azimut" step="any" placeholder="Azimut de la estación" name="azimut"  required value="{{old('azimut')}}">
            </div>
            <div class="col-sm-6 mt-0">
                <label class="form-label" for="Operativa">Condición</label>
                <select type="list" class="form-control" id="Operativa"   name="operativa"  required value="{{old('operativa')}}">
                    <option value="No operativa">No operativa</option>
                    <option value="Desinstalada">Desinstalada</option>
                    <option value="Vandalizada">Vandalizada</option>
                    <option value="Infraestructura">Infraestructura</option>
                    <option value="Operativa">Operativa</option>
                    <option value="Portatil">Portatil</option>
                </select>
            </div>
            <hr>
            <div class="col-md-12  p-1">
                <p class="text-center p-0 m-0 text-light bg-success"><b>Foto de Presentación</b></p>
            </div>
            <input type="file" class="form-control" id="imagen0" name="imagen_n" required onchange="muestraImg('muestrasImg', 'imagen0', '0');">
            
            <div class="col-12 text-center">
                <label for="Vista">Vista Previa</label>
            </div>
            <div class="border p-0 col-12 rounded" style="min-width: 20px; min-height:100px"  id="muestrasImg">

            </div>
            <script src="{{asset('js/gestion.js') }}"></script>

            
        </div>
        <div class="col-12 align-items-center justify-content-center d-flex">
            <input class="btn btn-success m-1 " style=" width:100px" type='submit' value='Guardar'>
        </div>
    </form> 
    </main>
</body>
</html>


@endsection
