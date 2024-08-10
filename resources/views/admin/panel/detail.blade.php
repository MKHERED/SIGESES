@extends('layouts.app')

@section('content')
<style>
    .show1 {
        opacity: 50%;
        background: rgba(0,0,0,0);
    }
    .hidden {
        visibility: hidden;
    }
    .table {
     --bs-table-hover-bg:rgba(0,0,0,0) !important;  /*var(--bs-light) !important; */
    }
</style>
<script src="{{asset('js/gestion.js') }}"></script>



{{--<div class="m-1 mt-2 table-responsive">
    <table class="table table-hover bg-light mt-3">
        <tbody>
        @foreach ($details as $detail)
        <?php 
            $autor_detail[1][0]->autor = "none";
        ?>
        <td>{{ $detail->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
                <div class="">
                    <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena gps','{{$detail->id}}', '{{$detail->antena_gps}}', '{{$detail->antena_gps_fab}}', '{{$detail->antena_gps_esp}}')">
                    @if ( $detail->antena_gps == '')
                        Añadir
                    @else
                        Editar
                    @endif
                    </button>
                    
                    <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='antenagps' hidden>
                    
                    </form>
                    
                </div>   
            @endif
            </td>
        </tr>
        <tr >
            <td>
                <div class="accordion" id="ant{{$detail->digitalizador_serial}}2">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->digitalizador_serial}}12" aria-expanded="true" aria-controls="#ant{{$detail->digitalizador_serial}}12">
                    Digitalizador
                </button>
                </h4>
                <div id="ant{{$detail->digitalizador_serial}}12" class="accordion-collapse collapse " data-bs-parent="#ant{{$detail->digitalizador_serial}}2">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->digitalizador_serial}} y modelo: {{$detail->digitalizador_modelo}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->digitalizador_marca}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{$detail->digitalizador_fecha}}</b></p>

                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[1][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena parabolica','{{$detail->id}}', '{{$detail->antena_parabolica}}', '{{$detail->antena_parabolica_fab}}', '{{$detail->antena_parabolica_esp}}')">
                @if ( $detail->antena_parabolica == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='antenaparabolica' hidden>
                    
                </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->bateria}}3">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->bateria}}13" aria-expanded="true" aria-controls="#ant{{$detail->bateria}}13">
                    Bateria
                </button>
                </h4>
                <div id="ant{{$detail->bateria}}13" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->bateria}}3">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->bateria}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->bateria_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[2][0]->updated_at }}</b></p>

                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[2][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Bateria','{{$detail->id}}', '{{$detail->bateria}}', '{{$detail->bateria_fab}}', '{{$detail->bateria_esp}}')">
                @if ( $detail->bateria == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='bateria' hidden>
                    
                </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->controlador_carga}}4">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->controlador_carga}}14" aria-expanded="true" aria-controls="#ant{{$detail->controlador_carga}}14">
                    Controlador de carga
                </button>
                </h4>
                <div id="ant{{$detail->controlador_carga}}14" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->controlador_carga}}4">
                <div class="accordion-body p-1 border-0 bg-light">
                 
                 <p class="m-0 p-0">Serial: <b>{{$detail->controlador_carga}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->controlador_carga_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[3][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[3][0]->autor }}</td>            
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Controlador de carga','{{$detail->id}}', '{{$detail->controlador_carga}}', '{{$detail->controlador_carga_fab}}', '{{$detail->controlador_carga_esp}}')">
                @if ( $detail->controlador_carga == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='controladorcarga' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->digitalizador}}5">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->digitalizador}}15" aria-expanded="true" aria-controls="#ant{{$detail->digitalizador}}15">
                    Digitalizador
                </button>
                </h4>
                <div id="ant{{$detail->digitalizador}}15" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->digitalizador}}5">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->digitalizador}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->digitalizador_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[4][0]->updated_at }}</b></p>
                
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[4][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Digitalizador','{{$detail->id}}', '{{$detail->digitalizador}}', '{{$detail->digitalizador_fab}}', '{{$detail->digitalizador_esp}}')">
                @if ( $detail->digitalizador == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='digitalizador' hidden>
                    
                    </form>
            </div>    
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->modem_satelital}}6">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->modem_satelital}}16" aria-expanded="true" aria-controls="#ant{{$detail->modem_satelital}}16">
                    Modem
                </button>
                </h4>
                <div id="ant{{$detail->modem_satelital}}16" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->modem_satelital}}6">
                <div class="accordion-body p-1 border-0 bg-light">
                 
                 <p class="m-0 p-0">Serial: <b>{{$detail->modem_satelital}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->modem_satelital_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[5][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[5][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Modem','{{$detail->id}}', '{{$detail->modem_satelital}}', '{{$detail->modem_satelital_fab}}', '{{$detail->modem_satelital_esp}}')">
                @if ( $detail->modem_satelital == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='modemsatelital' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div class="accordion" id="ant{{$detail->panel_solar}}7">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->panel_solar}}17" aria-expanded="true" aria-controls="#ant{{$detail->panel_solar}}17">
                    Panel solar
                </button>
                </h4>
                <div id="ant{{$detail->panel_solar}}17" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->panel_solar}}7">
                <div class="accordion-body p-1 border-0 bg-light">
                
                 <p class="m-0 p-0">Serial: <b>{{$detail->panel_solar}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->panel_solar_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[6][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[6][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Panel solar','{{$detail->id}}', '{{$detail->panel_solar}}', '{{$detail->panel_solar_fab}}', '{{$detail->panel_solar_esp}}')">
                @if ( $detail->panel_solar == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='panelsolar' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
            <div class="accordion" id="ant{{$detail->regulador_carga}}8">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->regulador_carga}}18" aria-expanded="true" aria-controls="#ant{{$detail->regulador_carga}}18">
                    Regulador de carga
                </button>
                </h4>
                <div id="ant{{$detail->regulador_carga}}18" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->regulador_carga}}8">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->regulador_carga}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->regulador_carga_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[7][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[7][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Regulador de carga','{{$detail->id}}', '{{$detail->regulador_carga}}','{{$detail->regulador_carga_fab}}', '{{$detail->regulador_carga_esp}}')">
                @if ( $detail->regulador_carga == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='reguladorcarga' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->sismometro}}9">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->sismometro}}19" aria-expanded="true" aria-controls="#ant{{$detail->sismometro}}19">
                    Sismometro
                </button>
                </h4>
                <div id="ant{{$detail->sismometro}}19" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->sismometro}}9">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->sismometro}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->sismometro_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[8][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[8][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Sismometro','{{$detail->id}}', '{{$detail->sismometro}}', '{{$detail->sismometro_fab}}','{{$detail->sismometro_esp}}')">
                @if ( $detail->sismometro == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='sismometro' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->trompeta_satelital}}0">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->trompeta_satelital}}10" aria-expanded="true" aria-controls="#ant{{$detail->trompeta_satelital}}10">
                    Trompeta
                </button>
                </h4>
                <div id="ant{{$detail->trompeta_satelital}}10" class="accordion-collapse collapse" data-bs-parent="#ant{{$detail->trompeta_satelital}}0">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->trompeta_satelital}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->trompeta_satelital_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[9][0]->updated_at }}</b></p>
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[9][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Trompeta','{{$detail->id}}', '{{$detail->trompeta_satelital}}', '{{$detail->trompeta_satelital_fab}}', '{{$detail->trompeta_satelital_esp}}')">
                @if ( $detail->trompeta_satelital == '')
                        Añadir
                    @else
                        Editar
                    @endif
                </button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='trompetasatelital' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
            @endforeach
        </tbody>
    </table>
</div>--}}
<div class="m-1 mt-2 table-responsive">
    <table class="table table-hover bg-light mt-3">
    <thead class="sticky-top">
        <tr>
            <th colspan="7">Componentes</th>
        </tr>
        <tr class="">
            <th class="">
                Marca - Cantidad
            </th>
            <th class="">
                 Modelo
            </th>
            <th class="">
                Watts
            </th>
            <th class="">
                Frecuencia - Banda
            </th>
            <th class="">
                Serial
            </th>
            <th class="">
                Fecha
            </th>
            <th class="">
                Estacion
            </th>
        </tr>
    </thead>
    @if (isset($item) && $item == "tipo")
        tipo
    @elseif (isset($item) && $item == "serial")
        serial
    @elseif (isset($item) && $item == "especifico")
        especifico
    @elseif (isset($item) && $item == "all")
        todos
        
        <tbody>
        @foreach ($details as $detail)
            <!--tr class="text-center"-->
                <!--tr><th colspan="6" class="" >Transcepto</th></tr-->
                <tr>
                    <td >{{$detail->transceptor_marca}}</td>
                    <td>{{$detail->transceptor_modelo}}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{$detail->transceptor_serial}}</td>
                    <td>{{$detail->transceptor_fecha}}</td>
                    <td>{{$detail->estacion}}</td>

                </tr>
                <!--tr><th colspan="6" class="" >GPS</th></tr-->
                <tr>
                    <td >{{$detail->antena_gps_marca}}</td>
                    <td>{{$detail->antena_gps_modelo}}</td>
                    <td>--</td>
                    <td></td>
                    <td>{{$detail->antena_gps_serial}}</td>
                    <td>{{$detail->antena_gps_fecha}}</td>
                   

                </tr>
                <!--tr><th colspan="6" class="" >Parabolica</th></tr-->
                <tr>
                    <td >{{$detail->parabolica_marca}}</td>
                    <td>@if ($detail['parabolica_diametro'])
                        {{$detail->parabolica_diametro}} mts
                        @endif
                    </td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{$detail->parabolica_serial}}</td>
                    <td>{{$detail->parabolica_fecha}}</td>
                    

                </tr>
                <!--tr><th colspan="6" class="" >BUC</th></tr-->
                <tr>
                    <td >{{$detail->BUC_marca}}</td>
                    <td>{{$detail->BUC_modelo}}</td>
                    <td>--</td>
                    <td>{{$detail->BUC_frecuencia}}</td>
                    <td>{{$detail->BUC_serial}}</td>
                    <td>{{$detail->BUC_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >LNB</th></tr-->
                <tr>
                    <td >{{$detail->LNB_marca}}</td>
                    <td>{{$detail->LNB_modelo}}</td>
                    <td>--</td>
                    <td>{{$detail->LNB_frecuencia}} / {{$detail->LNB_banda}} </td>
                    <td>{{$detail->LNB_serial}}</td>
                    <td>{{$detail->LNB_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Trompeta</th></tr-->
                <tr>
                    <td >{{$detail->trompeta_marca}}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{$detail->trompeta_serial}}</td>
                    <td>{{$detail->trompeta_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Digitalizador</th></tr-->
                <tr>
                    <td >{{$detail->digitalizador_marca}}</td>
                    <td>{{$detail->digitalizador_modelo}}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{$detail->digitalizador_serial}}</td>
                    <td>{{$detail->digitalizador_fecha}}</td>
                </tr>
                <tr>
                    <td >{{$detail->sensor_marca}}</td>
                    <td>{{$detail->sensor_modelo}}</td>
                    <td>--</td>
                    <td>{{$detail->sensor_sen}}</td>
                    <td>{{$detail->sensor_serial}}</td>
                    <td>{{$detail->sensor_fecha}}</td>
                </tr>
                <tr>
                    <td>{{$detail->regulador_voltaje_marca}}</td>
                    <td>{{$detail->regulador_voltaje_modelo}}</td>
                    <td>{{$detail->regulador_voltaje_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->regulador_voltaje_serial}}</td>
                    <td>{{$detail->regulador_voltaje_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Banco de Baterias</th></tr-->
                <tr>
                    <td >{{$detail->banco_baterias_marca}} - {{$detail->banco_baterias_cantidad}}</td>
                    <td>{{$detail->banco_baterias_modelo}}</td>
                    <td>{{$detail->banco_baterias_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->banco_baterias_serial}}</td>
                    <td>{{$detail->banco_baterias_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Panel Sorlar 1</th></tr-->
                <tr>
                    <td >{{$detail->panel_solar_a_marca}}</td>
                    <td>{{$detail->panel_solar_a_modelo}}</td>
                    <td>{{$detail->panel_solar_a_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->panel_solar_a_serial}}</td>
                    <td>{{$detail->panel_solar_a_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Panel Sorlar 2</th></tr-->
                <tr>
                    <td >{{$detail->panel_solar_b_marca}}</td>
                    <td>{{$detail->panel_solar_b_modelo}}</td>
                    <td>{{$detail->panel_solar_b_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->panel_solar_b_serial}}</td>
                    <td>{{$detail->panel_solar_b_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Panel Sorlar 3</th></tr-->
                <tr>
                    <td >{{$detail->panel_solar_c_marca}}</td>
                    <td>{{$detail->panel_solar_c_modelo}}</td>
                    <td>{{$detail->panel_solar_c_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->panel_solar_c_serial}}</td>
                    <td>{{$detail->panel_solar_c_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Panel Sorlar 4</th></tr-->
                <tr>
                    <td>{{$detail->panel_solar_d_marca}}</td>
                    <td>{{$detail->panel_solar_d_modelo}}</td>
                    <td>{{$detail->panel_solar_d_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->panel_solar_d_serial}}</td>
                    <td>{{$detail->panel_solar_d_fecha}}</td>
                </tr>
                <!--tr><th colspan="6" class="" >Panel Sorlar 5</th></tr-->
                <tr>
                    <td >{{$detail->panel_solar_e_marca}}</td>
                    <td>{{$detail->panel_solar_e_modelo}}</td>
                    <td>{{$detail->panel_solar_e_watts}}</td>
                    <td>--</td>
                    <td>{{$detail->panel_solar_e_serial}}</td>
                    <td>{{$detail->panel_solar_e_fecha}}</td>
                </tr>
            <!--/tr-->
        @endforeach
        </tbody>
    @endif      




    </table>
</div>









@endsection
