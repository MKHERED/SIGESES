@extends('layouts.app')

@section('content')


<main>
    <div class="album py-0 bg-body-tertiary" >
        <div class="container">  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @foreach ($documentos as $document)
        @if (in_array(pathinfo($document->direccion, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif')))
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
                  <form action="{{route('panel.delete', $document->id_estacion) }}" method="POST">
                          @csrf
                          {{ method_field('DELETE') }}
                          <input type="text" value="{{$document->nombre}}" name='nombre' hidden>
                          <input type="submit" class="btn btn-sm btn-outline-secondary text-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$document->nombre_estacion}}' )" value="Borrar">
                  </form>              
                @endif


                  </div>
                  <small class="text-body-secondary"><b>Actualizado: </b> {{ $document->created_at}}</small>
                </div>
              </div>
            </div>
          </div>          
        @elseif(in_array(pathinfo($document->direccion, PATHINFO_EXTENSION), array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'bin')))
          <!-- Los iconos son de https:  www.flaticon.es packs file-formats-9  asi para que no lo reconozca el navegador-->
          @if (in_array(pathinfo($document->direccion, PATHINFO_EXTENSION), array('pdf')))
              <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
              <div class="col btn btn-light" role="link" target="_blank" onclick='window.location="{{asset('storage').'/'.$document->direccion}}"'>
              <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
              <div class="card shadow-sm small">
                  <img class="bd-placeholder-img card-img-top" src="{{asset('recursos/iconos files/pdf.png')}}" width="160px" height="75%" alt="Foto de {{ $document->nombre_estacion }}">
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
          @elseif (in_array(pathinfo($document->direccion, PATHINFO_EXTENSION), array('doc', 'dotx','docx')))
              <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
              <div class="col btn btn-light" role="link" target="_blank" onclick='window.location="{{asset('storage').'/'.$document->direccion}}"'>
              <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
              <div class="card shadow-sm small">
                  <img class="bd-placeholder-img card-img-top" src="{{asset('recursos/iconos files/docx.png')}}" width="160px" height="75%" alt="Foto de {{ $document->nombre_estacion }}">
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
          @elseif (in_array(pathinfo($document->direccion, PATHINFO_EXTENSION), array('xls', 'xlsx')))
              <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
              <div class="col btn btn-light" role="link" target="_blank" onclick='window.location="{{asset('storage').'/'.$document->direccion}}"'>
              <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
              <div class="card shadow-sm small">
                  <img class="bd-placeholder-img card-img-top" src="{{asset('recursos/iconos files/excel.png')}}" width="160px" height="75%" alt="Foto de {{ $document->nombre_estacion }}">
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
          
          @endif
        @else
            <p>Este archivo no es una imagen ni un PDF {{$document->nombre}}</p>            
           
        @endif

        @endforeach 

    </div>
</main>



@endsection