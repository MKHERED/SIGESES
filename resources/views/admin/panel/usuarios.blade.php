@extends('layouts.app')

@section('content')

@if (isset($mensaje))
    <div class="text-center h5 position-absolute top-50 start-50 translate-middle">
        <p class="m-4 h1">
    <!-- Created with Inkscape (http://www.inkscape.org/) -->

    <svg
    version="1.1"
    id="svg3361"
    width="127.85842"
    height="92.714706"
    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
    xmlns="http://www.w3.org/2000/svg"
    xmlns:svg="http://www.w3.org/2000/svg">
    <defs
        id="defs3365" />
    <sodipodi:namedview
        id="namedview3363"
        pagecolor="#505050"
        bordercolor="#ffffff"
        borderopacity="1"
        inkscape:pageshadow="0"
        inkscape:pageopacity="0"
        inkscape:pagecheckerboard="1" />
    <inkscape:clipboard
        min="11.573449,1.9506702"
        max="139.43187,94.665376"
        geom-min="16.414366,1.9506702"
        geom-max="134.63287,93.261975" />
    <g
        id="g3367"
        transform="translate(-11.573449,-1.9506702)">
        <ellipse
        style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke-width:1.10231;stroke-linejoin:round;paint-order:fill markers stroke"
        id="path921"
        cx="59.446106"
        cy="16.273611"
        rx="11.729124"
        ry="14.322941" />
        <ellipse
        style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke-width:1.10231;stroke-linejoin:round;paint-order:fill markers stroke"
        id="path921-1"
        cx="94.40287"
        cy="16.943415"
        rx="11.729124"
        ry="14.322941"
        inkscape:transform-center-x="5.0660648"
        inkscape:transform-center-y="-2.0236334" />
        <path
        sodipodi:type="spiral"
        style="fill:none;fill-rule:evenodd;stroke:#000000;stroke-width:10;stroke-miterlimit:4;stroke-dasharray:none"
        id="path2901"
        sodipodi:cx="70.4711"
        sodipodi:cy="108.38663"
        sodipodi:expansion="1"
        sodipodi:revolution="3"
        sodipodi:radius="65.920311"
        sodipodi:argument="-19.081057"
        sodipodi:t0="0.862293"
        d="M 16.414366,90.809559 C 24.607582,59.110053 58.532554,40.857789 89.746843,49.105767 111.27226,54.793585 128.4045,71.963718 134.63287,93.261975" />
    </g>
    </svg>

        </p>
        <p>{{$mensaje}}</p>
        
    </div>
@else


<script src="{{asset('js/gestion.js') }}"></script>
<div id="modalCard" class="modal d-flex hidden bg-white" tabindex="-1" role="dialog" style="visibility: hidden; background: rgba(0,0,0,0.50); ">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow pb-3" style="display: grid; align-items: end;">
        <div class="modal-header pb-0 p-2 border-bottom-0">
            <h1 id="modal-title" class="modal-title m-2 fs-5" style="text-decoration: underline; text-decoration-color:orange;">Edición</h1>
            <!-- aqui va el boton de cerrar -->
        </div>

        <form class="form" action="{{route('panel.user')}}" method="get">
            @csrf
            <div class="d-flex bg-white">
                <div>
                    <div class="form-floating mt-0 m-3 mb-3">
                        <input name="nombre" type="text" class="form-control rounded-3" id="nombre" placeholder="abcde..." value="">
                        <label for="nombre">Nombre y Apellido</label>
                        <!-- agregar los nombre para que pasen por el request -->
                        <input name="id" id="id-input" type="number" value="" hidden>

                    </div> 
                    <div class="form-floating mt-0 m-3 mb-3">
                        <input name="user" type="text" class="form-control rounded-3" id="user" placeholder="abcde..." value="">
                        <label for="user">Usuario</label>
                    </div>

                    <div class="form-floating mt-0 m-3 mb-3">
                        <input name="cedula" type="text" class="form-control rounded-3" id="cedula" placeholder="abcde..." value="">
                        <label for="cedula">Cedula</label>
                    </div>                
                </div>
                <div>
                    <div class="form-floating mt-0 m-3 mb-3">
                        <input name="correo" type="text" class="form-control rounded-3" id="correo" placeholder="abcde..." value="">
                        <label for="correo">Correo</label>
                    </div>

                    <div class="form-floating mt-0 m-3 mb-2">
                        <input name="password" type="text" class="form-control rounded-3" id="password" placeholder="abcde..." value="">
                        <label for="password" class="small">Nueva Contraseña (opcional)</label>
                    </div>

                    <div class="form-floating mt-0 m-3 mb-3">                
                        
                        <p class="mb-0 pb-0">Tipo de Usuario</p>
                        <!-- form-control small p-2 rounded-3 text-center -->
                        <select class="border p-2 rounded text-center"  name="tipo" id="tipo" style="background: var(--bs-modal-bg); width:100%">
                            
                            <option class="form-control text-center" value="1">Administrador</option>
                            <option class="form-control text-center" value="0">Usuario</option>
                            
                        </select>
                        <!-- aqui trabajar con js para poder asignar el valor -->
                    
                    </div>                 
                </div>                
            </div>


      
            
                
                <button type="submit" class="btn btn-outline-success m-1 position-relative" style="left: 3%;">Guardar</button>
                       
        </form>
        <button type="button" class="btn btn-outline-danger m-1 position-absolute" onclick="users('','','','','','')" style="left: 21%; bottom: 4.6%;">Cerrar</button>

            
        </div>
    </div>
    </div>

    
<table class="table table-hover bg-light rounded m-2">
    <thead class="bg-dark text-light rounded">
        <tr>
            <th>
                Nombre y Apellido
            </th>
            <th>
                Usuario
            </th>
            <th>
                Correo
            </th>
            <th>
                C.I
            </th>
            <th>
                Rango
            </th>
            <th class="text-center col-2">
                Opciones
            </th>
        </tr>
    </thead>

    @foreach ($array as $var)
    <tbody class="">
        <tr class="">
            <td class="col-4">
               <h7 ><b>{{ $var['name'] }}<b></h7> 
            </td>
            <td>
                {{ $var['username'] }}
            </td>
            
            <td>
                {{ $var['email'] }}
            </td>
            <td>
                {{ $var['cedula'] }}
            </td>
            <td>
                @if ( $var['tipo_usuario'] == 1)
                    <p>Administrador</p>
                @else
                    <p>Usuario</p>
                @endif
            </td>
            <td>
            @if (Auth::user()->tipo_usuario)
            <div class="">
                <button type="button" class="btn btn-sm btn-outline-dark text-success" onclick="users('{{ $var['id'] }}', '{{ $var['name'] }}', '{{ $var['username'] }}', '{{ $var['email'] }}', '{{ $var['cedula'] }}', '{{ $var['tipo_usuario']}}')">
                    Editar
                </button>
                <form action="{{route('panel.user.delete', $var['id'] )}}" method="POST" class="btn p-0 m-0">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-outline-dark text-danger" >Borrar</button>
                        <!-- <input type="number" name="id" value='' hidden> -->
                        <!-- <input type="text" name="" value='' hidden> -->
                    
                </form>
            </div>
            @endif
            </td>
        </tr>

    </tbody>
    @endforeach
    @endif
@endsection