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
    <main class="presentacion-main bg-light border-hidden" style="border: hidden;">
        <h5 class="m-2 text-center" style="text-decoration: underline; text-decoration-color:orange;" >Hoja de inspección de visita</h5>
        
        <form class="needs-validation container" action="{{route('details.store', $id)}}" method="POST">
            <!-- requisitos ocultos -->
            @csrf
            <input type="hidden" name="id" id="id" placeholder="id" value="{{ $id }}">
            <input type="hidden" name="autor" value="{{ Auth::user()->name }}">
           <!-- <input class="form-control" type="hidden" style=" width: 50px" name="doc" id="doc" value="" hidden>  doc -->
            
            <div class="row g-5">
                <div class="col-md-12 col-lg-12">
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <label class="form-label" for="inst">Fecha de la inspección</label>
                            <input class="form-control" style=" width: auto" type="date" name="inst" id="inst" value="">
                            <script>
                                    var obj = document.getElementById('inst');
                                    var fecha = new Date();
                                    var dia = fecha.getDate();
                                    var mes = fecha.getMonth()+1;
                                    var año = fecha.getFullYear();
                                    if (mes < 10){
                                        var valor = año + "-"+ "0"+mes+"-"+dia ;
                                    } else {
                                        var valor = año + "-"+mes+"-"+dia ;
                                    } 
                                    
                                    console.log(valor);
                                    obj.value = valor;
                            </script>
                            <label for="">Tipo de visita</label>
                            <select class="form-control" name="tipo_visita" id="">
                                <option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
                                <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                            </select>
                            <label class="form-label" for="autores">Participantes</label>
                            <textarea class="form-control" name="autores" id="" cols="2" rows="2" placeholder="Ing. Pepito, Ing. Juan,"></textarea>

                            <label for="">Descripción del trabajo</label>
                            <textarea class="form-control" name="descripcion_trabajo" id="" cols="3" rows="4"></textarea>
                        
                            <label for="">Condición final</label>
                            <select class="form-control" name="condicion" id="">
                                <option value="Operativa">Operativa</option>
                                <option value="Fuera de servicio">Fuera de servicio</option>
                                <option value="En Observacion">En Observacion</option>
                            </select>

                            <label for="">Operativa</label>
                            <select class="form-control" name="operativa" id="">
                                    <option value="No operativa">No operativa</option>
                                    <option value="Desinstalada">Desinstalada</option>
                                    <option value="Vandalizada">Vandalizada</option>
                                    <option value="Infraestructura">Infraestructura</option>
                                    <option value="Operativa">Operativa</option>                            
                            </select>
                        </div>
                        <div class="row g-2 col-sm-8">
                            <div class="col-sm-6 mb-0 pb-0">
                                <label class="form-label" for="antena_gps">Antena GPS</label>
                                <input class="form-control" type="text" name="antena_gps" id="antena_gps" placeholder="Serial/Fabricante">
                                
                                <label class="form-label" for="antena_parabolica">Antena Parabolica</label>
                                <input class="form-control" type="text" name="antena_parabolica" id="antena_parabolica" placeholder="Serial/Fabricante">

                                <label class="form-label" for="digitalizador">Digitalizador</label>
                                <input class="form-control" type="text" name="digitalizador" id="digitalizador" placeholder="Serial/Fabricante" >                        
                            
                                <label class="form-label" for="modem_satelital">Modem Satelital</label>
                                <input class="form-control" type="text" name="modem_satelital" id="modem_satelital" placeholder="Serial/Fabricante" >

                                <label class="form-label" for="trompeta_satelital">Trompeta Satelital</label>
                                <input class="form-control" type="text" name="trompeta_satelital" id="trompeta_satelital" placeholder="Serial/Fabricante" >
                                

                            </div>

                            <div class="col-sm-6">
                                <label class="form-label" for="bateria">Bateria</label>
                                <input class="form-control" type="text" name="bateria" id="bateria" placeholder="Serial/Fabricante" >
                                
                                <label class="form-label" for="regulador_carga">Regulador de Carga</label>
                                <input class="form-control" type="text" name="regulador_carga" id="regulador_carga" placeholder="Serial/Fabricante" >
                                
                                <label class="form-label" for="controlador_carga">Controlador de carga</label>
                                <input class="form-control" type="text" name="controlador_carga" id="controlador_carga" placeholder="Serial/Fabricante" >

                                <label class="form-label" for="panel_solar">Panel Solar</label>
                                <input class="form-control" type="text" name="panel_solar" id="panel_solar" placeholder="Serial/Fabricante" >

                                <label class="form-label" for="sismometro">Sismometro</label>
                                <input class="form-control" type="text" name="sismometro" id="sismometro" placeholder="Serial/Fabricante" >

                            </div>
                            <div class="col-sm-8">
                                <label class="form-label" for="">Especificación o comentario</label>
                                <textarea class="form-control" name="comentario" id="" cols="25" rows="3"></textarea>
                            </div>
                            <div class="col-sm-4 text-center">
                                <label class="form-label" for="">¿Ya Termino?</label>

                                <input class="btn btn-success m-1 form-control"  type='submit' value='Guardar'>
                                <a class="btn btn-warning m-1 text-light form-control" href="{{route('estaciones.index')}}">Terminar mas tarde</a>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    
</body>
</html>


@endsection