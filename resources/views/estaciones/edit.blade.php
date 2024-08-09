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
    <script src="{{ asset('js/gmsutm.js') }}"></script> 

    
</head>
<body >
<!------------------------------------------------------------------------------------------------ Registro -->  

<main class="text-start presentacion-main border-0 container-xl" style="background: none !important;">
    <div class="text-center">
        <h2 class="h5 m-3" style="text-decoration: underline; text-decoration-color:orange;">Actualice los siguientes datos</h2>
    </div>

    <form method='POST' class="form small row" action="{{route('estaciones.update', $estaciones->id)}}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH')}}
        <input type="number" hidden name='autor' value="{{Auth::user()->id}}">
        <div class="col-md-6 p-2 row g-3 mt-0 ">
            <div class="col-md-12 mt-0 p-1">
                <p class="text-center p-0 m-0 bg-warning"><b>Datos Generales</b></p>
            </div>
            <div class="col-sm-6">
              <label for="Estacion" class="form-label">Estación</label>
              <input type="text" class="form-control small" id="Estacion" placeholder="Nombre de la estación" name="nombre"  required value="{{$estaciones->nombre }}" >
            </div>
            <div class="col-sm-6">
                <label  class="form-label" for="Abreviatura">Siglas</label>
                <input type="text" class="form-control" id="Abreviatura" placeholder="Abreviatura de la estación" name="siglas"  required value="{{$estaciones->siglas }}">
            </div>
            <div class="col-sm-6">
                <label for="Ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="Ubicacion" placeholder="Ubicacion de la estación" name="ubicacion"  required value="{{$estaciones->ubicacion }}">

            </div>
            <div class="col-sm-6">
                <label for="Estado" class="form-label">Estado</label>
                <select type="list" class="form-control" id="Estado" name="estado"  required value="{{old('estado')}}">
                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                    </script>
                                   
                </select>
                <script>
                    document.onload= estadoslist();
                    var select = document.getElementById('Estado');
                    valor = @json($estaciones->estado);
                    select.value = valor;
                </script>  
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label">Municipio</label>
                <input type="text" class="form-control" id="municipio" placeholder="" name="municipio"  required value="{{$estaciones->municipio}}">

            </div>
            
            <div class="col-12 row">
                <p class="p-2 mb-0 text-center" ><b>Portadora de Operaciones</b></p>
                <div class="col-sm-6">
                    
                    <label for="operadora">Frecuencia</label>
                    <input type="number" step="0.001" class="form-control" id="operadora" placeholder="" name="frecuencia"  required value="{{$estaciones->frecuencia }}">

                </div>
                <div class="col-sm-6">
                    <label for="Nivel">Nivel de potencia</label>
                    <input type="text" class="form-control" id="Nivel" placeholder="" name="nivel"  required value="{{$estaciones->nivel }}">

                </div>  
                <div class="col-sm-6">
                    <label for="asig" class="form-label">Asignada a frecuencia</label>
                    <input type="text" class="form-control" id="asig" placeholder="" name="asig_frecuencia"  required value="{{$estaciones->asig_frecuencia }}">

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
                    <script>
                        var valor = @json($estaciones->carina);
                        var sele = document.getElementById('carina');
                        sele.value = valor;
                    </script>
                </div>
                <div class="col-sm-6">
                <label for="Segmento" class="form-label">Segmento Satelital {{$estaciones->seg_satelital }}</label>
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
                <script>
                    var valor = @json($estaciones->seg_satelital);
                    var sele = document.getElementById('Segmento');
                    sele.value = valor;
                </script>
            </div>             
            </div>

            <hr class="p-0 m-0 mt-2" >
            <div class="col-sm-12">
                <p class="text-center bg-primary text-light"><b>Datos del Custodio</b></p>
            </div>
            <div class="col-sm-6">
                <label for="Custodio" class="form-label">Custodio</label>
                <input type="text" class="form-control" id="Custodio" placeholder="" name="custodio"  required value="{{$estaciones->custodio }}">
                <div class="alert alert-info p-1">
                    <small>Nombres y Apellidos de la persona a cargo</small>    
                </div>
            </div>
            <div class="col-sm-6">
                <label for="Custodio" class="form-label">Dependencia / Institución </label>
                <input type="text" class="form-control" id="Dependencia" placeholder="" name="dependencia"  required value="{{$estaciones->dependencia }}">
                <div class="alert alert-info p-1">
                    <small>Nombre del ente al cual pertenece</small>    
                </div>
            </div>
            <div class="col-sm-6">
                <label for="tlf" class="form-label">Telefono del Custodio</label>
                <!-- pattern="\([0-9]{4}\) [0-9]{3}[-][0-9]{4}" -->
                <input type="tlf" class="form-control" id="tlf" placeholder="" pattern=".{15}"  name="tlf_custodio"  required value="{{$estaciones->tlf_custodio }}">
                <div class="alert alert-info p-1">
                    <small>El Formato es (0400) 000-0000</small>    
                </div>


            </div>
            <div class="col-sm-6">
                <label for="created" class="form-label">Fecha de la instalación: {{$estaciones->created_at }}</label>
                <input type="date" class="form-control" id="create" placeholder="" max="" name="created_at" >
                <script src="{{asset('js/gestion.js') }}"></script>
                <script>
                    var fecha = @json($estaciones->created_at);
                    quita('create', fecha)
                    fechaNow('#create')
                </script>
            </div>
        </div>
        
        <div class="col-md-6 p-2 row g-3 mt-0 align-self-baseline">
            <div class="col-md-12  p-1 mt-0 mb-0">
                <p class="text-center bg-danger text-light p-0 m-0"><b>Ubicación Geografica Remota</b></p>
            </div>

            <div class="col-sm-6" id="Lat">
                <label for="Latitud" class="form-label">Latitud</label>
                <input type="number" class="form-control" step="0.00001" placeholder="60.00" style="" id="Latitud" name="latitud" value="{{ $estaciones->Latitud }}">

            </div>
            <div class="col-sm-6" id="Long">
                <label for="Longitud" class="form-label">Longitud</label><br>
                <div class="input-group">
                    <input type="number" class="form-control" step="0.00001" placeholder="10.00" style="" id="Longitud" name="longitud" value="{{ $estaciones->Longitud }}">                               
                    <button type="button" id="liveToastBtn" class="m-0 p-0 input-group-text" style="background-color: transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-info" viewBox="0 0 16 16">
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" fill="black"/>
                        </svg> 
                    </button>                    
                </div>

            </div>
            <div class="col-md-1 m-0 d-flex justify-content-center align-items-center" title="Información">
                {{-- Acomodar No se Cambia a GMS --}}
                <!--label for="dec" class="form-label">¿Que tipo de coordenada es? &nbsp;</label> 
                <label for="dec">GMS: &nbsp;</label>
                <input class="form-check-input" type="checkbox" name="gms" id="gms" onclick="gmsutm()"-->
                <!--abbr title="Por defecto esta el formato de decimales, pero puede cambiarlo por Grados Minutos y Segundo"> ¿Información? </abbr-->
        
                <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 2000;">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                        <strong class="me-auto">Información</strong>
                        <small></small> <!--alguna Información-->
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                           Los datos de las coordenadas se mantienen si se envian los campos vacios. Recuerde: el formato preferido es<b> Decimales </b>
                        </div>
                    </div>
                </div>
                <script>
                    const toastTrigger = document.getElementById('liveToastBtn')
                    const toastLiveExample = document.getElementById('liveToast')
        
                    if (toastTrigger) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                    toastTrigger.addEventListener('click', () => {
                        toastBootstrap.show()
                    })
                    }
                </script>  
            </div>
            <script>

            </script>
            <script>
                function montarDatos () {
                    const valor1 = @json($estaciones->longitud);
                    const valor2 = @json($estaciones->latitud); 

                    var long = document.getElementById('Longitud');
                    var lati = document.getElementById('Latitud');

                    long.value = valor1;
                    lati.value = valor2;
                    long.placeholder = valor1
                    lati.placeholder = valor2                
                    }

                montarDatos()
            /*window.onload=function(){
                const checkbox =document.getElementById("gms");
                
                checkbox.addEventListener("click", gmsutm() );

                checkbox.addEventListener("click", montarDatos);        
            }*/

            
            </script>
            <div class="col-md-12 mt-1 mb-1" style="height: 200px">
                <div id="map" class="p-1 rounded-2" style="width: 100%; height:100%"></div>

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                <script>
                    const y = @json($estaciones->longitud);
                    const x = @json($estaciones->latitud); 
                    var map = L.map('map').setView([x,y], 7);
                    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                                maxZoom: 10,
                                minZoom: 6,
                            }).addTo(map);
                    
                    var long = document.getElementById('Longitud');
                    var lati = document.getElementById('Latitud');
                    var nombre = document.getElementById('Estacion').value;

                    valor1 = long.value;
                    valor2 = lati.value;

                    long.addEventListener('keyup', (a)=>{
                    valor1 = a.target.value.trim()
                    buscar(valor1, valor2)
                    })

                    lati.addEventListener('keyup', (e)=>{
                    valor2 = e.target.value.trim()
                    buscar(valor1, valor2)
                    })

                    function buscar(valor1, valor2) {
                         map.flyTo([valor2, valor1],8)
                         var popup = L.popup([valor2, valor1], {content: '<b>'+nombre+'</b>'})
                        .openOn(map);
                    }
                    buscar(valor1, valor2)

                </script>
            </div>
            <div class="col-sm-6 mt-0" id>
                <label for="Elevacion" class="form-label">Elevación</label>
                <input type="number" class="form-control" id="Elevacion" step="any" placeholder="{{ $estaciones->elevacion }}" name="elevacion"  required value="{{ $estaciones->elevacion }}">
            </div>
            <div class="col-sm-6 mt-0" id>
                <label for="Azimut" class="form-label">Azimut</label>
                <input type="number" class="form-control" id="Azimut" step="any" placeholder="{{ $estaciones->azimut }}" name="azimut"  required value="{{ $estaciones->azimut }}">
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
                <script>
                    var valor = @json($estaciones->operativa);
                    var sele = document.getElementById('Operativa');
                    sele.value = valor;
                </script>
            </div>
            <hr>
            <div class="col-md-12  p-1">
                <p class="text-center p-0 m-0 text-light bg-success"><b>Foto de Presentación</b></p>
            </div>
            <input type="file" class="form-control" id="imagen0" name="imagen_n" onchange="muestraImg('muestrasImg', 'imagen0', '0');">
            
            <div class="col-12 text-center">
                <label for="Vista">Vista Previa</label>
            </div>
            <div class="border p-0 col-12 rounded" style="min-width: 20px; min-height:100px"  id="muestrasImg">

            </div>
            <script src="{{asset('js/gestion.js') }}"></script>

            
        </div>
        <div id="guardar" class="col-12 align-items-center justify-content-center d-flex">
            <input class="btn btn-success m-1 " style=" width:100px" type='submit' value='Guardar'>
            <script> 
                    const validador =  @json($validador);
                    var guardar = document.getElementById('guardar');

                    if (validador == "agregar") {
                        guardar.insertAdjacentHTML("beforeend", "<a class='btn btn-warning text-light m-1' style='width:fit-content;' href='{{route('details.index', $estaciones->id)}}'>Agregar Componentes</a>");
                    } 
                    if (validador == "cambiar"){
                        guardar.insertAdjacentHTML("beforeend", "<a class='btn btn-warning text-light m-1' style='width:fit-content;' href='{{route('details.edit',$estaciones->id)}}'>Cambiar Componentes</a>");
                    }                  
                </script>
        </div>
    </form> 
    </main>
</body>
</html>


@endsection
