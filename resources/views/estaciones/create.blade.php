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
    <h2 class="h5 m-4" style="text-decoration: underline; text-decoration-color:orange;">Ingrese los siguientes datos</h2>
    <div class="form-center text-start">
       
        <form method='POST' class="form small" action="{{route('estaciones.store')}}" enctype="multipart/form-data">
             @csrf
             <div class="row w-max">
                <div class="col-6">
                <table class="table">
                        <tr>
                            <td>
                                <label for="Estacion">Estación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Estacion" placeholder="Nombre de la estación" name="nombre" value="{{old('nombre')}}" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Abreviatura">Siglas</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Abreviatura" placeholder="Abreviatura de la estación" name="siglas" value="{{old('siglas')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Ubicacion">Ubicación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Ubicacion" placeholder="Ubicacion de la estación" name="ubicacion" value="{{old('ubicacion')}}">
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
                        <tr>
                            <td>
                                <label for="Altitud">Altitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Altitud" placeholder="Altitud de la estación" name="altitud" value="{{old('altitud')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="doc">¿Subira algún documento?</label>
                            </td>
                            <td class="text-center">
                                <label for="doc">Si: &nbsp;</label><input type="checkbox" name="doc" id="doc">
                            </td> 

                        </tr>
                    </table>
                </div>
            
                <div class="col-6">
                    <table class="table">

                        <tr>
                            <td>
                                <label for="Estado">Estado</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Estado" name="estado" value="{{old('estado')}}" onclick="estadoslist()">
                                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                                    </script>
                                   
                                </select>
                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <label for="Region">Región</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Region"   name="region" value="{{old('region')}}">
                                    <option value="0">Occidente</option>
                                    <option value="1">Centro</option>
                                    <option value="2">Oriente</option>
                                </select>
                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <label for="Operativa">Operativa</label>
                            </td>
                            <td>
                                <select type="list" class="form-control" id="Operativa"   name="operativa" value="{{old('operativa')}}">
                                    <option value="0">Si</option>
                                    <option value="1">No</option>
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
                        <tr>
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
            <div class="row m-0 text-center align-items-center justify-content-center">
                <input class="btn btn-success m-1 " style=" width:100px" type='submit' value='Guardar'>
            </div>
        </form>
    </div>


</main>
</body>
</html>


@endsection