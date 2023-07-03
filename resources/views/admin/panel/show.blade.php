@extends('layouts.app')

@section('content')


<main>
    <div class="album py-0 bg-body-tertiary" >
        <div class="container">  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @foreach ($documentos as $document)
            
        <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
        <div class="col btn btn-light" role="link" target="_blank" onclick='window.location="{{asset('storage').'/'.$document->direccion}}"'>
        <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
        <div class="card shadow-sm small">
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage').'/'.$document->direccion}}" width="100%" height="75%" alt="Foto de {{ $document->nombre_estacion }}">
            <div class="card-body small">
              <p class="card-text h5">{{ $document->nombre }}</p>

              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                
              @if (Auth::user()->tipo_usuario)
                <form action="" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$document->nombre_estacion}}' )" value="Borrar">
                </form>              
              @endif


                </div>
                <small class="text-body-secondary"><b>Actualizado: </b> {{ $document->created_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach 

    </div>
</main>



@endsection