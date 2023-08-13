@extends('layouts.app')

@section('content')
<script src="{{asset('js/gestion.js') }}"></script>
<div id="modalCard" class="modal d-flex hidden" tabindex="-1" role="dialog" style="visibility: hidden; background: rgba(0,0,0,0.50); ">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow pb-3" style="display: grid; align-items: end;">
        <div class="modal-header pb-0 p-2 border-bottom-0">
            <h1 id="modal-title" class="modal-title m-2 fs-5" style="text-decoration: underline; text-decoration-color:orange;">Edición</h1>
            <!-- aqui va el boton de cerrar -->
        </div>

        <form class="form" action="{{route('panel.user')}}" method="get">
            @csrf
            <div class="d-flex">
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

@endsection