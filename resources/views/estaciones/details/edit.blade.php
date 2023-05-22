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
  <!------------------------------------------------------------------------------------------------ Registros de los detalles de la estacion -->  
    <main class="text-center presentacion-main bg-light border-hidden" style="border: hidden;">
        <h5 class="m-2" style="text-decoration: underline; text-decoration-color:orange;" >Ingrese los siguientes datos de la Estación <b>{{$nombre}}</b></h5>
        <div class="form-center text-start">
            <form id="form" method='POST' class="form" action="{{route('details.update', $id)}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH')}}      
                <tag id="foreach" >
                <div class="text-center">
                    <input type="hidden" name="id" id="id" placeholder="id" value="{{ $id }}">
                    <table class="table">
                        <tr class="row">
                            <td class="col-6">
                                <label for="inst">Instalación</label>
                            </td>
                            <td class="col-6">
                                <input class="form-control" style=" width: 300px" type="date" name="inst" id="inst" value="{{$details->instalacion_satelital}}">
                            </td>
                        </tr>
                    </table>    
                
                    
                </div>                
                <div class="row w-max">
                    
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="antena_gps">Antena GPS</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="antena_gps" id="antena_gps" placeholder="Serial" value="{{$details->antena_gps}}">
                                    <input class="form-control" type="text" name="antena_gps_esp" id="antena_gps_esp" placeholder="Especificaciones" value="{{$details->antena_gps_esp}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label for="antena_parabolica">Antena Parabolica</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="antena_parabolica" id="antena_parabolica" placeholder="Serial" value="{{$details->antena_parabolica}}">
                                    <input class="form-control" type="text" name="antena_parabolica_esp" id="antena_parabolica_esp" placeholder="Especificaciones" value="{{$details->antena_parabolica_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="bateria">Bateria</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="bateria" id="bateria" placeholder="Serial" value="{{$details->bateria}}">
                                    <input class="form-control" type="text" name="bateria_esp" id="bateria_esp" placeholder="Especificaciones" value="{{$details->bateria_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="controlador_carga">Controlador de carga</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="controlador_carga" id="controlador_carga" placeholder="Serial" value="{{$details->controlador_carga}}">
                                    <input class="form-control" type="text" name="controlador_carga_esp" id="controlador_carga_esp" placeholder="Especificaciones" value="{{$details->controlador_carga_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="digitalizador">Digitalizador</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="digitalizador" id="digitalizador" placeholder="Serial" value="{{$details->digitalizador}}">
                                    <input class="form-control" type="text" name="digitalizador_esp" id="digitalizador_esp" placeholder="Especificaciones" value="{{$details->digitalizador_esp}}">
                                </td> 
                            </tr>
                        </table>
                    </div>  
                
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <td>
                                <label for="modem_satelital">Modem Satelital</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="modem_satelital" id="modem_satelital" placeholder="Serial" value="{{$details->modem_satelital}}">
                                    <input class="form-control" type="text" name="modem_satelital_esp" id="modem_satelital_esp" placeholder="Especificaciones" value="{{$details->modem_satelital_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="panel_solar">Panel Solar</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="panel_solar" id="panel_solar" placeholder="Serial" value="{{$details->panel_solar}}">
                                    <input class="form-control" type="text" name="panel_solar_esp" id="panel_solar_esp" placeholder="Especificaciones" value="{{$details->panel_solar_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="regulador_carga">Regulador de Carga</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="regulador_carga" id="regulador_carga" placeholder="Serial" value="{{$details->regulador_carga}}">
                                    <input class="form-control" type="text" name="regulador_carga_esp" id="regulador_carga_esp" placeholder="Especificaciones" value="{{$details->regulador_carga_esp}}">
                                </td> 
                            </tr> 
                            <tr>
                                <td>
                                <label for="sismometro">Sismometro</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="sismometro" id="sismometro" placeholder="Serial" value="{{$details->sismometro}}">
                                    <input class="form-control" type="text" name="sismometro_esp" id="sismometro_esp" placeholder="Especificaciones" value="{{$details->sismometro_esp}}">
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                <label for="trompeta_satelital">Trompeta Satelital</label>
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="trompeta_satelital" id="trompeta_satelital" placeholder="Serial" value="{{$details->trompeta_satelital}}">
                                    <input class="form-control" type="text" name="trompeta_satelital_esp" id="trompeta_satelital_esp" placeholder="Especificaciones" value="{{$details->trompeta_satelital_esp}}">
                                </td> 
                            </tr>
                        </table>    
                    </div>
            <div class="row m-0 text-center align-items-center justify-content-center">
                <input class="btn btn-success m-1 " style=" width:100px" type='submit' value='Guardar'>
                <a class="btn btn-warning m-1 text-light" style="width: 200px;" href="{{route('estaciones.index')}}">Terminar mas tarde</a>
            </div>
    </main>
    
</body>
</html>


@endsection