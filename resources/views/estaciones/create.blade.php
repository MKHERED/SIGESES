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
        <h4 class="">Registro</h4> 
        <a class="inicio nueva btn btn-sm"><h6><b>¿ Actualizar Datos ?</b></h6> </a>
    </nav>
<main class="text-center presentacion-main bg-light border-hidden" style="border: hidden;">
    <h2 class="h1 m-4">Ingrese los siguientes datos</h2>
    <div class="form-center text-start">
       
        <form class="form" action="{{route('estaciones.create')}}" method='GET'>
             @csrf
             <div class="row w-max">
                <div class="col-6">
                <table class="table">
                        <tr>
                            <td>
                                <label for="Estacion">Estación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Estacion" placeholder="Nombre de la estación" name="" value="{{old('nombre')}}" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Abreviatura">Siglas</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Abreviatura" placeholder="Abreviatura de la estación" name="" value="{{old('siglas')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Ubicacion">Ubicación</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="Ubicacion" placeholder="Ubicacion de la estación" name="" value="{{old('ubicacion')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Longitud">Longitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Longitud" placeholder="Longitud de la estación" name="" value="{{old('longitud')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Latitud">Latitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Latitud" placeholder="Latitud de la estación" name="" value="{{old('latitud')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Altitud">Altitud</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="Altitud" placeholder="Altitud de la estación" name="" value="{{old('altitud')}}">
                            </td>                    
                        </tr>
                        <tr>
                            <td>
                                <label for="Instalacion">Instalación</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" id="Instalacion" name="" value="{{old('create_at')}}">
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
                                <select type="list" class="form-control" id="Estado"   name="" value="{{old('estado')}}">
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
                                <select type="list" class="form-control" id="Region"   name="" value="{{old('region')}}">
                                    <option value="0">Occidente</option>
                                    <option value="1">Centro</option>
                                    <option value="2">Oriente</option>
                                </select>
                            </td>   
                        </tr>
                        <tr>
                            <td>
                                <label for="Imagen">Imagen</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" id="Imagen"   name="" value="{{old('imagen')}}">
                            </td>   
                        </tr>
                    </table>
                </div>
            </div>

            <input class="btn btn-success m-1" type='submit' value='Guardar'>
        </form>
    </div>


</main>
</body>
</html>


@endsection