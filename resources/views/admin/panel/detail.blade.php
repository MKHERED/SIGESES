@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <script src="{{asset('js/gestion.js') }}"></script>
    <form action="{{route('panel.detail')}}" method="get">
    @csrf
    <div class="row text-left justify-content-center">
        
            <div class="text-center col-1 small m-0 p-2">
                <label class="label" for=""><b>Filtro: </b></label>
            </div>
            <div class='col-3'>
                
                    <select class="form-control small p-1" type="list" name="id" id="">
                        @foreach ($options as $option)
                            <option value="{{$option->id}}">{{$option->estacion}}</option>
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
                            <input type="submit" class="btn btn-sm btn-outline-dark text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                            
                            <input type="text" name="component" value="antenagps" hidden>
                    
                    </form>
                </div>
            @endif
            </td>
        </tr>
        <tr>
            <td>Antena Parabolica</td>
            <td>{{$detail->antena_parabolica}}</td>
            <td>{{$detail->instalacion_satelital}}</td>
            <td>Autor</td>
            <td>
            @if (Auth::user()->tipo_usuario)
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="antenaparabolica" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="bateria" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="controladorcarga" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="digitalizador" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="modemsatelital" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="panelsolar" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="reguladorcarga" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="sismometro" hidden>
                </form>
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
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$detail->nombre}}' )" value="Borrar">
                        <input type="text" name="component" value="trompetasatelital" hidden>
                </form>
            @endif
            </td>
        </tr>

    </tbody>    
    @endforeach

</table>

</div>








@endsection
