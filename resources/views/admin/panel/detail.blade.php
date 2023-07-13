@extends('layouts.app')

@section('content')
<style>
    .show1 {
        opacity: 50%;
    }
    .hidden {
        visibility: hidden;
    }
</style>
<div id="modalSheet" class="modal modal-sheet show1 p-1 py-md-5 d-flex cover bg-body-secondary bg-dark hidden">
</div>

<div id="modalCard" class="modal d-flex hidden" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
        <div class="modal-header border-bottom-0">
            <h1 id="modal-title" class="modal-title m-2 fs-5">{}</h1>
            <button type="button" class="btn btn-danger" onclick="detail()">Cancelar</button>
        </div>
        <div class="modal-body py-0">
            <p>El valor de <b id="modal-body" >{}nombre del component</b>  esta por ser editado <br> ¿Quiere continuar?</p>
        </div>
        <form class="form" action="{{route('details.updateEdit')}}" method="post">
            @csrf
            <div class="form-floating mt-0 m-3 mb-3">
                <input name="serial" type="text" class="form-control rounded-3" id="floatingInput" placeholder="abcde...">
                <label for="floatingInput">Nuevo Serial</label>
                <!-- agregar los nombre para que pasen por el request -->
                <input name="id" id="id-input" type="number" value="" hidden>
                <input name="detail" id="component-input" type="text" value="" hidden>
            </div>        
            <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                <button type="submit" class="btn btn-lg btn-outline-success">Guardar</button>
            </div>        
        </form>



        </div>
    </div>
    </div>



<div class="mt-2 table-responsive">
    <script src="{{asset('js/gestion.js') }}"></script>
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

<table class="table table-hover">
    <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Serial
            </th>
            <th>
                Instalacion
            </th>
            <th>
                Autor
            </th>
            <th>
                Opciones
            </th>
        </tr>
    </thead>

    @foreach ($details as $detail)
    <tbody>
        <tr class="bg-warning text-center">
            <td >
               <h7>{{$detail->estacion}}</h7> 
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>Antena gps</td>
            <td id="inp_antena_gps{{$detail->id}}">{{$detail->antena_gps}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor aun por hacer</td>
            <td>
            @if (Auth::user()->tipo_usuario)
                <div class="btn-group me-2">
                    <form class="" action="{{ route('details.destroy', $detail->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-sm btn-outline-dark text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                            
                            <input type="text" name="component" value="antenagps" hidden>
                    
                    </form>
                    <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena gps','{{$detail->id}}')">Editar</button>
                </div>   
            @endif
            </td>
        </tr>
        <tr>
            <td>Antena parabolica</td>
            <td>{{$detail->antena_parabolica}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">
                
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="antenaparabolica" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Antena parabolica','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Bateria</td>
            <td>{{$detail->bateria}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="bateria" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Bateria','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Controlador de carga</td>
            <td>{{$detail->controlador_carga}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>            
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="controladorcarga" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Controlador de carga','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Digitalizador</td>
            <td>{{$detail->digitalizador}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="digitalizador" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Digitalizador','{{$detail->id}}')">Editar</button>
            </div>    
            @endif
            </td>
        </tr>
        <tr>
            <td>Modem</td>
            <td>{{$detail->modem_satelital}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="modemsatelital" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Modem','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Panel solar</td>
            <td>{{$detail->panel_solar}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="panelsolar" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Panel solar','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Regulador de carga</td>
            <td>{{$detail->regulador_carga}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="reguladorcarga" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Regulador de carga','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Sismometro</td>
            <td>{{$detail->sismometro}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">

                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="sismometro" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Sismometro','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Trompeta</td>
            <td>{{$detail->trompeta_satelital}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="btn-group me-2">
            
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? ' )" value="Borrar">
                        <input type="text" name="component" value="trompetasatelital" hidden>
                </form>
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="detail('Trompeta','{{$detail->id}}')">Editar</button>
            </div>
            @endif
            </td>
        </tr>

    </tbody>    
    @endforeach

</table>

</div>








@endsection
