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
<body >
  <!------------------------------------------------------------------------------------------------ Registro -->  
<main class="text-center presentacion-main bg-light border-hidden" style="border: hidden;">
    <h3 class="h3 m-4">Actualice los siguientes datos</h3>
    <div class="form-center ">
       
        <form method='POST' class="form small" action="{{route('estaciones.update', $estaciones->id)}}" enctype="multipart/form-data">
             @csrf
             {{ method_field('PATCH')}}
             <div class="row container">
                <div class="col-6  text-start">
                <table class="table">
                        <tr>
                            <td>
                                <label for="Estacion">Estación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Estacion" placeholder="Nombre de la estación" name="nombre" value="{{$estaciones->nombre }}" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Abreviatura">Siglas</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Abreviatura" placeholder="Abreviatura de la estación" name="siglas" value="{{ $estaciones->siglas }}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Ubicacion">Ubicación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Ubicacion" placeholder="Ubicacion de la estación" name="ubicacion" value="{{ $estaciones->ubicacion }}">
                            </td>                    
                        </tr>
                        <tr>
                           
                            <td>
                                <label for="dec">¿Que tipo de coordenada es?</label>
                            </td>
                            <td class="text-center">
                                <label for="dec">GMS: &nbsp;</label><input type="checkbox" name="gms" id="gms" onclick="gmsutm()">
                            
                            </td>
   
                        </tr>
                        <tr>
                            <td>
                                <label for="Longitud">Longitud</label>
                            </td>
                            <td style="display: flex" id="Long"> 
                                <input type="number" class="form-control" style="width: 100px" id="Longitud" name="longitud" value="">                               
                            </td>                                             
                        </tr>
                        <tr>
                            <td>
                                <label for="Latitud">Latitud</label>
                            </td>
                            <td style="display: flex"id="Lat">
                                <input type="number" class="form-control" style="width: 100px" id="Latitud" name="latitud" value="">

                            </td>                    
                        </tr>
                        <script src="{{ asset('js/gmsutm.js') }}"></script>
                        <script>
                            const valor1 = @json($estaciones->longitud);
                            const valor2 = @json($estaciones->latitud);
                            
                            var long = document.getElementById('Longitud');
                            var lati = document.getElementById('Latitud');

                            long.value = valor1;
                            lati.value = valor2;
                        </script>
                        <tr>
                            <td>
                                <label for="Altitud">Altitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Altitud" placeholder="Altitud de la estación" name="altitud" value="{{ $estaciones->altitud }}">
                            </td>                    
                        </tr>
                    </table>
                </div>
            
                <div class="col-6" >
                    <table class="table">

                        <tr>
                            <td>
                                <label for="Estado">Estado</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Estado" name="estado" value="{{$estaciones->estado}}">
                                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                                    </script>
                                   
                                </select>
                                <script>
                                    document.onload= estadoslist();
                                    var select = document.getElementById('Estado');
                                    const valor = @json($estaciones->estado);
                                    select.value = valor;
                                </script>
                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <label for="Region">Región</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Region"   name="region" value="{{$estaciones->region}}">
                                    <option value="0">Occidente</option>
                                    <option value="1">Centro</option>
                                    <option value="2">Oriente</option>
                                </select>
                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <label for="Operativa">Condición</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Operativa"   name="operativa" value="{{$estaciones->operativa}}">
                                    <option value="0">No operativa</option>
                                    <option value="1">Desinstalada</option>
                                    <option value="2">Vandalizada</option>
                                    <option value="3">Infraestructura</option>
                                    <option value="4">Operativa</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Imagen">Imagen</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="imagen0" name="imagen_n" onchange="muestraImg('muestrasImg', 'imagen0', '0');">
                            </td>
                              
                        </tr>
                        <tr style="border-style: hidden !important;">
                            <td>
                                <label for="Vista">Vista Previa</label>
                            </td>
                            <td>
                                <div class="border p-0" style="width:350px; height:225px " id="muestrasImg">


                                </div>
                                <script src="{{asset('js/gestion.js') }}"></script>
                            </td>
                        </tr>
                    </table>

            
            </div>
            <div id="guardar" class="col">
                <input type="submit" class='btn btn-success m-1' style="width:fit-content;" value="Guardar">
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
            <div>

            </div>
        </form>
    </div>


</main>
</body>
</html>


@endsection