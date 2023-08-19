@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Estación</title>
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
</head>
<body >
  <!------------------------------------------------------------------------------------------------ Registro -->  
  <nav class="navbar navbar-dark bg-orange text-light navbar-visitas">
        <h4 class="">Edición</h4> 
        <a class="inicio nueva btn btn-sm border text-light" href="{{ route('estaciones.index') }}">Cancelar</a>

    </nav>
<main class="text-center presentacion-main bg-light border-hidden" style="border: hidden;">
    <h3 class="h3 m-4">Actualice los siguientes datos</h3>
    <div class="form-center text-start">
       
        <form method='POST' class="form" action="{{ url('/estaciones/'.$estaciones->id) }}"  enctype="multipart/form-data">
             @csrf
             {{ method_field('PATCH')}}
             <div class="row w-max">
                <div class="col-5">
                <table class="table">
                        <tr>
                            <td>
                                <label for="Estacion">Estación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Estacion" placeholder="" name="nombre" value="{{$estaciones->nombre }}" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Abreviatura">Siglas</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Abreviatura" placeholder="" name="siglas" value="{{ $estaciones->siglas }}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Ubicacion">Ubicación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Ubicacion" placeholder="" name="ubicacion" value="{{ $estaciones->ubicacion }}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Longitud">Longitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Longitud" placeholder="" name="longitud" value="{{$estaciones->longitud}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Latitud">Latitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Latitud" placeholder="" name="latitud" value="{{$estaciones->latitud}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Altitud">Altitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Altitud" placeholder="" name="altitud" value="{{$estaciones->altitud}}">
                            </td>                    
                        </tr>
                        <!---
                        <tr>
                            <td>
                                <label for="Instalacion">Instalación</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" id="Instalacion" name="" value="{{old('create_at')}}">
                            </td>                    
                        </tr>
                        -->
                    </table>
                </div>
            
                <div class="col-5">
                    <table class="table">

                        <tr>
                            <td>
                                <label for="Estado">Estado</label>
                            </td>
                            <td>
                            <select type="list" class="form-control" id="Estado" name="estado" value="{{old('$estaciones->estado')}}" onclick="estadoslist()">
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
                                <select type="list" class="form-control" id="Region"   name="region" value="{{$estaciones->region}}">
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
                                <select type="list" class="form-control" id="operativa"   name="operativa" value="{{$estaciones->operativa}}">
                                    <option value="0">No operativa</option>
                                    <option value="1">Desintalada</option>
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
                                <input type="file" class="form-control" id="Imagen" name="imagen_n" value="{{$estaciones->imagen_n}}">
                                <p class="form-control text box btn-ms disable">
                                    {{$estaciones->img_dir}}
                                </p>
                            </td>   
                        </tr>
                    </table>
                </div>
            </div>
            <div id="guardar" class="row m-0 text-center align-items-center justify-content-center">
                <input class="btn btn-success m-1" style="width:fit-content;" type='submit' value='Guardar'>
                 <!-- agregar el boton para agregar los componentes luego de consultar -->
                <script> 
                    const validador =  @json($validador);
                    var guardar = document.getElementById('guardar');

                    if (validador == "agregar") {
                        guardar.insertAdjacentHTML("beforeend", "<a class='btn btn-warning text-light m-1' style='width:fit-content;' href='{{route('details.index', $estaciones->id)}}'>Agregar Componentes</a>");
                    } 
                    if (validador == "cambiar"){
                        guardar.insertAdjacentHTML("beforeend", "<a class='btn btn-warning text-light m-1' style='width:fit-content;' href='{{route('details.edit',$estaciones->id)}}'>Cambiar Componentes</a>");
                    }
                    void(validador);                    
                </script>
            </div>
        </form>
    </div>


</main>
</body>
</html>


@endsection