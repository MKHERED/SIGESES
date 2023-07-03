@extends('layouts.app')

@section('content')


<main>
    <div class="album py-0 bg-body-tertiary" >
        <div class="container">
           
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @foreach ($estaciones as $estacion)
            
        <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
        <div class="col btn btn-light" role="link" onclick='window.location="{{route('panel.show', $estacion->id)}}"'>
        <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
        
        <div class="card shadow-sm small">
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage').'/'.$estacion->imagen_n}}" width="100%" height="200px" alt="Foto de {{ $estacion->nombre }}">
            <div class="card-body small">
              <p class="card-text h5">{{ $estacion->nombre }}</p>
              <div class="m-1 btn-group">
                <p class="p-1 m-1"><b>Ubicación Estadal: </b> {{ $estacion->estado }}</p>
              </div>

              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                
              @if (Auth::user()->tipo_usuario)
                <form action="{{ route('estaciones.destroy', $estacion->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$estacion->nombre}}' )" value="Borrar">
                </form>

                <a   type="button" class="btn btn-sm btn-outline-secondary text-primary" href="{{ route('estaciones.edit', $estacion->id) }}">Editar</a>                
              @endif


                </div>
                <small class="text-body-secondary"><b>Actualizado: </b> {{ $estacion->updated_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach 

    </div>
</main>







@endsection

