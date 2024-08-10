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
    <script src="{{ asset('js/gestion.js' )}}"></script>
    
</head>
<body >
  <!------------------------------------------------------------------------------------------------ Registros de los detalles de la estacion -->  
    <main class="bg-light border-hidden container-fluid " style="border: hidden;">
        <div class="text-center">
        <h2 class="h5 m-3" style="text-decoration: underline; text-decoration-color:orange;">Ingrese los componentes más actuales</h2>
        </div>
        
        <form method='POST' class="small" action="{{route('details.store', $id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row form-center">
            <input type="number" hidden name='autor' value="{{Auth::user()->id}}">
            
            <div class="col-md-6 p-2 row mt-0 align-self-start">
                <div class="col-md-12 row">
                    <div class="col-md-12 mt-0 p-1">
                        <p class="text-center p-0 m-0 bg-dark text-light"><b>Transmisión</b></p>
                    </div>                    
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Transceptor</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="transceptor_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="transceptor_modelo" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="transceptor_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="transceptor_fecha" id="transceptor_fecha">
                            <script>
                                fechaNow('input[name="transceptor_fecha"]')                                
                            </script>
                            

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>GPS</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="antena_gps_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="antena_gps_modelo" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="antena_gps_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="antena_gps_fecha"> 
                            <script>
                                fechaNow('input[name="antena_gps_fecha"]')                                
                            </script>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>BUC</b></p>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="BUC_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="BUC_modelo" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Frecuencia</label>
                            <input class="form-control"type="text" name="BUC_frecuencia" value="" >
                        </div>                           
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="BUC_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="BUC_fecha">
                            <script>
                                fechaNow('input[name="BUC_fecha"]')                                
                            </script>
                        </div> 
                    </div>  
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>LNB</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="LNB_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="LNB_modelo" value="" >
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Frecuencia</label>
                                <input class="form-control"type="text" name="LNB_frecuencia" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Banda</label>
                                <input class="form-control"type="text" name="LNB_banda" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="LNB_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="LNB_fecha">
                            <script>
                                fechaNow('input[name="LNB_fecha"]')                                
                            </script>
                        </div>          
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Trompeta</b></p>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="trompeta_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="trompeta_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="trompeta_fecha"  >
                            <script>
                                fechaNow('input[name="trompeta_fecha"]')                                
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                    
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Digitalizador</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="digitalizador_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="digitalizador_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-5">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="digitalizador_serial" value="" >
                            </div>
                            <div class="col-sm-7">
                                <label class="form-label" for="">Fecha de instalación</label>
                                <input class="form-control" type="date" name="digitalizador_fecha"  >
                                <script>
                                fechaNow('input[name="digitalizador_fecha"]')                                
                            </script>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Parabola</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="parabolica_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Diametro</label>
                            <input class="form-control"type="text" name="parabolica_diametro" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="parabolica_serial" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="parabolica_fecha">
                            <script>
                                fechaNow('input[name="parabolica_fecha"]')                                
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-dark text-light"><b>Sensor</b></p>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="sensor_marca" value="" >
                        </div>                    
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="sensor_modelo" value="" >
                        </div>
                        <div class=" row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="sensor_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Sensibilidad</label>
                                <input class="form-control" name="sensor_sen" type="text" value="" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="sensor_fecha"  >
                            <script>
                                fechaNow('input[name="sensor_fecha"]')                                
                            </script>
                        </div>  
                    </div>   
                                     
                </div>



            </div>

            <div class="col-md-6 p-2 row mt-0">
                <div class="col-md-12 row">
                    <div class="col-md-12 mt-0 p-1">
                        <p class="text-center p-0 m-0 bg-dark text-light"><b>Energia</b></p>
                    </div>
                    <div class="col-md-6">

                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Regulador de Voltaje</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="regulador_voltaje_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="regulador_voltaje_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="regulador_voltaje_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="regulador_voltaje_watts" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="regulador_voltaje_fecha"  >
                            <script>
                                fechaNow('input[name="regulador_voltaje_fecha"]')                                
                            </script>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>Banco de Baterias</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="banco_baterias_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="banco_baterias_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="banco_baterias_serial" value="" >
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label" for="">Cantidad</label>
                                <input class="form-control"type="text" name="banco_baterias_cantidad" value="" >
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="banco_baterias_watts" value="" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="banco_baterias_fecha">
                            <script>
                                fechaNow('input[name="banco_baterias_fecha"]')                                
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>  Panel solar G1</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="panel_solar_a_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_a_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_a_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_a_watts" value="" >

                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_a_fecha"  >
                            <script>
                                fechaNow('input[name="panel_solar_a_fecha"]')                                
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>  Panel solar G2</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="panel_solar_b_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_b_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_b_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_b_watts" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_b_fecha"  >
                            <script>
                                fechaNow('input[name="panel_solar_b_fecha"]')                                
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>  Panel solar G3</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="panel_solar_c_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_c_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_c_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_c_watts" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_c_fecha"  >
                            <script>
                                fechaNow('input[name="panel_solar_c_fecha"]')                                
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>  Panel solar G4</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="panel_solar_d_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_d_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_d_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_d_watts" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_d_fecha"  >
                            <script>
                                fechaNow('input[name="panel_solar_d_fecha"]')                                
                            </script>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>  Panel solar G5</b></p>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="panel_solar_e_marca" value="" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_e_modelo" value="" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_e_serial" value="" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_e_watts" value="" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_e_fecha"  >
                            <script>
                                fechaNow('input[name="panel_solar_e_fecha"]')                                
                            </script>
                        </div>
                    </div>









                </div>
            </div>

            <div class="col-12 align-items-center justify-content-center d-flex">
                <input class="btn btn-success m-1 " style=" width:100px" type='submit' value='Guardar'>
            </div>
            </div>
        </form>
        <script>
            function camOld(objeto, valor) {
                objeto = document.getElementBy(objeto)
                objeto.value = valor
            }
        </script>  
        <ul>
        @if(isset($detail))
            @foreach ($detail as $objeto)
                <li>
                    $objeto
                </li>
            @endforeach
        @endif        
        </ul>      

    </main>
    
</body>
</html>


@endsection
