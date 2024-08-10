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
    <script src="{{ asset('js/gestion.js') }}"></script>
    
</head>
<body>
    <script>
        
        function verifi(objeto,  ubicacion){

        }
        
    </script>
    @if (Session::has('marcador'))
        <div>
            {{Session::get('marcador')}}
        </div>
        <script>
            var datos = JSON($marcador)
            console.log(datos)
        </script>
    @endif
  <!------------------------------------------------------------------------------------------------ Registros de los detalles de la estacion -->  
  <main class="bg-light border-hidden container-fluid" style="border: hidden;">
        <div class="text-center">
        <h2 class="h5 m-3" style="text-decoration: underline; text-decoration-color:orange;">Ingrese los componentes mas actuales de {{$nombre}}</h2>
        </div>
        
        <form method='POST' class="small" action="{{route('details.update', $id)}}" enctype="multipart/form-data">
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
                            <input class="form-control"type="text" name="transceptor_marca" value="{{$detail->transceptor_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="transceptor_modelo" value="{{$detail->transceptor_modelo}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="transceptor_serial" value="{{$detail->transceptor_serial}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="transceptor_fecha" value="{{$detail->transceptor_fecha}}">
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
                            <input class="form-control"type="text" name="antena_gps_marca" value="{{$detail->antena_gps_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="antena_gps_modelo" value="{{$detail->antena_gps_modelo}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="antena_gps_serial" value="{{$detail->antena_gps_serial}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="antena_gps_fecha" value="{{$detail->antena_gps_fecha}}">
                            <script>
                                fechaNow('input[name="gps_fecha"]')                                
                            </script>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 mt-0 p-1">
                            <p class="text-center p-0 m-0 bg-warning"><b>BUC</b></p>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Marca</label>
                            <input class="form-control"type="text" name="BUC_marca" value="{{$detail->BUC_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="BUC_modelo" value="{{$detail->BUC_modelo}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Frecuencia</label>
                            <input class="form-control"type="text" name="BUC_frecuencia" value="{{$detail->BUC_frecuencia}}" >
                        </div>                           
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="BUC_serial" value="{{$detail->BUC_serial}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="BUC_fecha"  value="{{$detail->BUC_fecha}}">
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
                            <input class="form-control"type="text" name="LNB_marca" value="{{$detail->LNB_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="LNB_modelo" value="{{$detail->LNB_modelo}}" >
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Frecuencia</label>
                                <input class="form-control"type="text" name="LNB_frecuencia" value="{{$detail->LNB_frecuencia}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Banda</label>
                                <input class="form-control"type="text" name="LNB_banda" value="{{$detail->LNB_banda}}" >
                            </div>                            
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="LNB_serial" value="{{$detail->LNB_serial}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="LNB_fecha" value="{{$detail->LNB_fecha}}" >
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
                            <input class="form-control"type="text" name="trompeta_marca" value="{{$detail->trompeta_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Serial</label>
                            <input class="form-control"type="text" name="trompeta_serial" value="{{$detail->trompeta_serial}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="trompeta_fecha"  value="{{$detail->trompeta_fecha}}">
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
                            <input class="form-control"type="text" name="digitalizador_marca" value="{{$detail->digitalizador_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="digitalizador_modelo" value="{{$detail->digitalizador_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-5">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="digitalizador_serial" value="{{$detail->digitalizador_serial}}" >
                            </div>
                            <div class="col-sm-7">
                                <label class="form-label" for="">Fecha de instalación</label>
                                <input class="form-control" type="date" name="digitalizador_fecha" value="{{$detail->digitalizador_fecha}}">
                                <script>
                                fechaNow('input[name="digitalizador_fecha"]')                                
                            </script>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 mt-0 p-1">
                        <p class="text-center p-0 m-0 bg-warning"><b>Parabola</b></p>
                    </div>

                    <div class="col-sm-12">
                        <label class="form-label" for="">Marca</label>
                        <input class="form-control"type="text" name="parabolica_marca" value="{{$detail->parabolica_marca}}" >
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="">Diametro</label>
                        <input class="form-control"type="text" name="parabolica_diametro" value="{{$detail->parabolica_diametro}}" >
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="">Serial</label>
                        <input class="form-control"type="text" name="parabolica_serial" value="{{$detail->parabolica_serial}}" >
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="">Fecha de instalación</label>
                        <input class="form-control" type="date" name="parabolica_fecha" value="{{$detail->parabolica_fecha}}">
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
                            <input class="form-control"type="text" name="sensor_marca" value="{{$detail->sensor_marca}}" >
                        </div>                    
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="sensor_modelo" value="{{$detail->sensor_modelo}}" >
                        </div>
                        <div class=" row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="sensor_serial" value="{{$detail->sensor_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Sensibilidad</label>
                                <input class="form-control" name="sensor_sen" type="text" value="{{$detail->sensor_sen}}" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="sensor_fecha" value="{{$detail->sensor_fecha}}" >
                            <script>
                                fechaNow('input[name="sensor_fecha"]')                                
                            </script>
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
                            <input class="form-control"type="text" name="regulador_voltaje_marca" value="{{$detail->regulador_voltaje_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="regulador_voltaje_modelo" value="{{$detail->regulador_voltaje_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="regulador_voltaje_serial" value="{{$detail->regulador_voltaje_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="regulador_voltaje_watts" value="{{$detail->regulador_voltaje_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="regulador_voltaje_fecha" value="{{$detail->regulador_voltaje_fecha}}" >
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
                            <input class="form-control"type="text" name="banco_baterias_marca" value="{{$detail->banco_baterias_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="banco_baterias_modelo" value="{{$detail->banco_baterias_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="banco_baterias_serial" value="{{$detail->banco_baterias_serial}}" >
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label" for="">Cantidad</label>
                                <input class="form-control"type="text" name="banco_baterias_cantidad" value="{{$detail->banco_baterias_cantidad}}" >
                            </div>
                            <div class="col-sm-3">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="banco_baterias_watts" value="" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="banco_baterias_fecha" value="{{$detail->banco_baterias_fecha}}">
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
                            <input class="form-control"type="text" name="panel_solar_a_marca" value="{{$detail->panel_solar_a_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_a_modelo" value="{{$detail->panel_solar_a_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_a_serial" value="{{$detail->panel_solar_a_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_a_watts" value="{{$detail->panel_solar_a_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_a_fecha"  value="{{$detail->panel_solar_a_fecha}}">
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
                            <input class="form-control"type="text" name="panel_solar_b_marca" value="{{$detail->panel_solar_b_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_b_modelo" value="{{$detail->panel_solar_b_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_b_serial" value="{{$detail->panel_solar_b_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_b_watts" value="{{$detail->panel_solar_b_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_b_fecha" value="{{$detail->panel_solar_b_fecha}}" >
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
                            <input class="form-control"type="text" name="panel_solar_c_marca" value="{{$detail->panel_solar_c_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_c_modelo" value="{{$detail->panel_solar_c_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_c_serial" value="{{$detail->panel_solar_c_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_c_watts" value="{{$detail->panel_solar_c_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_c_fecha" value="{{$detail->panel_solar_c_fecha}}" >
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
                            <input class="form-control"type="text" name="panel_solar_d_marca" value="{{$detail->panel_solar_d_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_d_modelo" value="{{$detail->panel_solar_d_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_d_serial" value="{{$detail->panel_solar_d_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_d_watts" value="{{$detail->panel_solar_d_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_d_fecha" value="{{$detail->panel_solar_d_fecha}}" >
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
                            <input class="form-control"type="text" name="panel_solar_e_marca" value="{{$detail->panel_solar_e_marca}}" >
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="">Modelo</label>
                            <input class="form-control"type="text" name="panel_solar_e_modelo" value="{{$detail->panel_solar_e_modelo}}" >
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-sm-6">
                                <label class="form-label" for="">Serial</label>
                                <input class="form-control"type="text" name="panel_solar_e_serial" value="{{$detail->panel_solar_e_serial}}" >
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="">Watts</label>
                                <input class="form-control"type="text" name="panel_solar_e_watts" value="{{$detail->panel_solar_e_watts}}" >
                            </div>                            
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="">Fecha de instalación</label>
                            <input class="form-control" type="date" name="panel_solar_e_fecha" value="{{$detail->panel_solar_e_fecha}}" >
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
        </form>
        
    </main>
    
</body>
</html>


@endsection