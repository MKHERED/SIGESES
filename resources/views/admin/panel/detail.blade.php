@extends('layouts.app')

@section('content')
<style>
    .show1 {
        opacity: 50%;
    }
    .hidden {
        visibility: hidden;
    }
    .table {
     --bs-table-hover-bg:rgba(0,0,0,0) !important;  /*var(--bs-light) !important; */
    }
</style>
<script src="{{asset('js/gestion.js') }}"></script>

<div id="modalSheet" class="modal modal-sheet show1 p-1 py-md-5 d-flex cover bg-body-secondary bg-dark hidden">
</div>

<div id="modalCard" class="modal d-flex hidden" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow" style="display: grid; align-items: end;">
        <div class="modal-header p-2 border-bottom-0">
            <h1 id="modal-title" class="modal-title m-2 fs-5">{}</h1>
            <!-- aqui va el boton de cerrar -->
        </div>
        <div class="modal-body  py-0">
            <p>El valor de <b id="modal-body" >{}</b> esta por ser editado <br></p>
        </div>
        <form class="form" action="{{route('details.updateEdit')}}" method="post">
            @csrf
            <div class="form-floating mt-0 m-3 mb-3">
                <input name="serial" type="text" class="form-control rounded-3" id="floatingInput" placeholder="abcde...">
                <label for="floatingInput">Serial</label>
                <!-- agregar los nombre para que pasen por el request -->
                <input name="id" id="id-input" type="number" value="" hidden>
                <input name="detail" id="component-input" type="text" value="" hidden>
                <input name="inst" type="date" id="inst" value="" hidden>
                <script>
                    var obj = document.getElementById('inst');
                    var fecha = new Date();
                    var dia = fecha.getDate();
                    var mes = fecha.getMonth()+1;
                    var año = fecha.getFullYear();
                    if (mes < 10){
                        if(dia < 10){
                            var valor = año + "-"+ "0"+mes+"-"+"0"+dia ;

                        } else {
                            var valor = año + "-"+ "0"+mes+"-"+dia ;
                        }
                        
                    } else {
                        var valor = año + "-"+mes+"-"+dia ;
                    } 
                    
                    console.log(valor);
                    obj.value = valor;
                </script>

            </div> 
            <div class="form-floating mt-0 m-3 mb-3">
                <input name="fabricante" type="text" class="form-control rounded-3" id="floatingInput2" placeholder="abcde..." value="">
                <label for="floatingInput2">Fabricante</label>
            </div>

            <div class="form-floating mt-0 m-3 mb-3">
                <input name="especifi" type="text" class="form-control rounded-3" id="floatingInput3" placeholder="abcde..." value="">
                <label for="floatingInput3">Especificaciones</label>
            </div>
            <!-- agregar la seccion de los comentarios -->
            <div class="form-floating mt-0 m-3 mb-3">                
                
                
                <select class="form-control small p-1 rounded-3 text-center"  name="autor" id="floatingSelect" >
                    
                    @foreach ($autores as $autor)
                        <option class="form-control text-center" value="{{$autor->id}}">{{$autor->name}}</option>
                    @endforeach
                    
                </select>
                <label for="floatingSelect">Autor</label>
            
            </div>       
            
                
                <button type="submit" class="btn btn-outline-success m-1 position-relative" style="left: 3%;">Guardar</button>
                       
        </form>
        <button type="button" class="btn btn-outline-danger m-1 position-absolute" onclick="detail()" style="left: 30%;">Cerrar</button>

            
        </div>
    </div>
    </div>



<div class="mt-2 table-responsive">
    
    <form action="{{route('panel.detail')}}" method="get">
    @csrf
    <div class="row text-left justify-content-center">
        
            <div class="text-center col-1 small m-0 p-2">
                <label class="label" for=""><b>Filtro: </b></label>
            </div>
            <div class='col-3'>
                
                    <select class="form-control small p-1" type="list" name="id" id="">
                            <option class="form-control" value="all">Todas</option>
                        @foreach ($options as $option)
                            <option class="form-control" value="{{$option->id}}">{{$option->estacion}}</option>
                        @endforeach
                    </select>

            </div>
            <div class="col-1 h4">
                <button class="btn badge btn-warning" type="submit">Buscar</button>
            </div>



       
    </div>
     </form>

<table class="table table-hover bg-light rounded">
    <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Autor
            </th>
            <th class="text-center col-2">
                Opciones
            </th>
        </tr>
    </thead>

    @foreach ($details as $detail)
    <tbody>
        <tr class="bg-warning text-center">
            <td class="col-5">
               <h7 >Estación: <b>{{$detail->estacion}}</b></h7> 
            </td>

            <td>
            </td>
            
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <div class="accordion" id="ant{{$detail->antena_gps}}">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->antena_gps}}1" aria-expanded="true" aria-controls="#ant{{$detail->antena_gps}}1">
                    Antena gps
                </button>
                </h4>
                <div id="ant{{$detail->antena_gps}}1" class="accordion-collapse collapse border-0" data-bs-parent="#ant{{$detail->antena_gps}}">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->antena_gps}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->antena_gps_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[0][0]->updated_at }}</b></p> <!-- {{$detail->instalacion_satelital}} -->
                 
                 
                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[0][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
                <div class="">
                    <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena gps','{{$detail->id}}', '{{$detail->antena_gps}}', '{{$detail->antena_gps_fab}}', '{{$detail->antena_gps_esp}}')">Editar</button>
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
                <div class="accordion" id="ant{{$detail->antena_parabolica}}2">
                <div class="accordion-item border-0">
                <h4 class="accordion-header border-0">
                <button class="accordion-button p-1 bg-light text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ant{{$detail->antena_parabolica}}12" aria-expanded="true" aria-controls="#ant{{$detail->antena_parabolica}}12">
                    Antena parabolica
                </button>
                </h4>
                <div id="ant{{$detail->antena_parabolica}}12" class="accordion-collapse collapse " data-bs-parent="#ant{{$detail->antena_parabolica}}2">
                <div class="accordion-body p-1 border-0 bg-light">
                 <p class="m-0 p-0">Serial: <b>{{$detail->antena_parabolica}}</b></p>
                 <p class="m-0 p-0">Fabricante: <b>{{$detail->antena_parabolica_fab}}</b></p>
                 <p class="m-0 p-0">Fecha de reemplazo: <b>{{ $updated_detail[1][0]->updated_at }}</b></p>

                </div>
                </div>
                </div>
            </td>
            <td>{{ $autor_detail[1][0]->autor }}</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena parabolica','{{$detail->id}}', '{{$detail->antena_parabolica}}', '{{$detail->antena_parabolica_fab}}', '{{$detail->antena_parabolica_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Bateria','{{$detail->id}}', '{{$detail->bateria}}', '{{$detail->bateria_fab}}', '{{$detail->bateria_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Controlador de carga','{{$detail->id}}', '{{$detail->controlador_carga}}', '{{$detail->controlador_carga_fab}}', '{{$detail->controlador_carga_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Digitalizador','{{$detail->id}}', '{{$detail->digitalizador}}', '{{$detail->digitalizador_fab}}', '{{$detail->digitalizador_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Modem','{{$detail->id}}', '{{$detail->modem_satelital}}', '{{$detail->modem_satelital_fab}}', '{{$detail->modem_satelital_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Panel solar','{{$detail->id}}', '{{$detail->panel_solar}}', '{{$detail->panel_solar_fab}}', '{{$detail->panel_solar_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Regulador de carga','{{$detail->id}}', '{{$detail->regulador_carga}}','{{$detail->regulador_carga_fab}}', '{{$detail->regulador_carga_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Sismometro','{{$detail->id}}', '{{$detail->sismometro}}', '{{$detail->sismometro_fab}}','{{$detail->sismometro_esp}}')">Editar</button>
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
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Trompeta','{{$detail->id}}', '{{$detail->trompeta_satelital}}', '{{$detail->trompeta_satelital_fab}}', '{{$detail->trompeta_satelital_esp}}')">Editar</button>
                <form action="{{route('details.borrarData')}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <input type="number" name="id" value='{{$detail->id}}' hidden>
                        <input type="text" name="detail" value='trompetasatelital' hidden>
                    
                    </form>
            </div>
            @endif
            </td>
        </tr>

    </tbody>    
    @endforeach

</table>

</div>








@endsection
