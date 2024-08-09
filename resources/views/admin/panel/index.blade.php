
@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/album.css') }}">

<script src="{{asset('js/estadoslist.js') }}"></script>
<script src="{{asset('js/gestion.js') }}"></script>

<!-- <main class="col-md-9 ml-sm-auto col-lg-10 px-3"> -->
<div class="album py-1 px-2 m-0 p-0">
<div class="container-fluid">
<div class="row g-3 d-flex justify-content-center">

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
  @endif
  @if ($estaciones == [])
        <div class="position-absolute top-50 start-50 translate-middle text-center" >
        @if (Auth::user()->tipo_usuario)
        
          <a href="{{ route('estaciones.create') }}" style="text-decoration: none !important;">
            <svg id="Layer_1" height="25" viewBox="0 0 24 24" width="25" data-name="Layer 1"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 21a9 9 0 1 1 9-9 9.01 9.01 0 0 1 -9 9zm5-9a1.5 1.5 0 0 1 -1.5 1.5h-2v2a1.5 1.5 0 0 1 -3 0v-2h-2a1.5 1.5 0 0 1 0-3h2v-2a1.5 1.5 0 0 1 3 0v2h2a1.5 1.5 0 0 1 1.5 1.5z" fill='#2EA043'/></svg>
            <p class="text-dark" >
              Registre una nueva estación
            </p>

          </a>
        @else
        <svg id="Layer_1" height="25" viewBox="0 0 24 24" width="25" data-name="Layer 1"><path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 21a9 9 0 1 1 9-9 9.01 9.01 0 0 1 -9 9zm5-9a1.5 1.5 0 0 1 -1.5 1.5h-2v2a1.5 1.5 0 0 1 -3 0v-2h-2a1.5 1.5 0 0 1 0-3h2v-2a1.5 1.5 0 0 1 3 0v2h2a1.5 1.5 0 0 1 1.5 1.5z" fill='#2EA043'/></svg>
        <p class="text-dark" >Pidale a un administrador que registre una nueva estación</p>

       
        @endif
       </div>
  @endif


  @foreach ($estaciones as $estacion)
  
  <div class="card m-2 shadow border-0 col-sm-12 col-md-4 col-lg-3" role="link" onclick='window.location="{{route('estaciones.show', $estacion->id)}}"'>
    <img class="card-img-top mt-2" src="{{ asset('storage').'/'.$estacion->imagen_n}}" width="100%" height="225" alt="Foto de {{ $estacion->nombre }}">
    <div class="card-body ">
      <h4 class="card-title">{{ $estacion->nombre }}</h4>
      
      <div class="row">
        <div class="col-auto">
          <p class="p-0 m-0"><b>Siglas: </b>{{ $estacion->siglas}}</p>              

        </div>
        <div class="col-auto">
          <p class="p-0 m-0"><b>Operativa: </b>{{ $estacion->operativa}}</p>                

        </div>
        <div class="col-md-12 text-center border border-3 m-1">
          <p class="p-0 pt-2 pb-0 m-0" ><b>Ubicación</b></p>
          <hr class="p-0 m-1">
          
          <div class="row">
            <div class="col-auto">
            <p class="p-0 m-0"><b>Estadal: </b> {{ $estacion->estado }}</p>
            </div>
            <!--
            <div class="col-auto">
              <p class="p-0 m-0"><b>Municipio</b> {{ $estacion->municipio }}</p>
            </div>
            -->
            <div class="col-auto">
              <p class="p-0 m-0"><b>Lugar:</b> {{ $estacion->ubicacion }}</p>
            </div>
          </div>

        </div>
        <div class="col-md-12 text-center border border-3 m-1 ">
        <p class="p-0 pt-2 pb-0 m-0" ><b>Ubicación Geografica</b></p>
          <hr class="p-0 m-1">
          <div class="row  align-items-center">
            <div class="col-auto">
              <p class="m-0 small"><b>Longitud: <br></b>{{ $estacion->longitud }}</p>
            </div>
            <div class="col-auto">
              <p class="m-0 small"><b>Latitud: <br></b>{{ $estacion->latitud }}</p>
            </div>
            <div class="col-auto">
              <p class="m-0 small"><b>Altitud: <br></b>{{ $estacion->elevacion }}</p>

            </div>
            <div class="col-auto">
              <p class="m-0 small"><b>Azimut: <br></b>{{ $estacion->azimut }}</p>
              
            </div>
          </div>
        </div>

      </div>  

    </div>
    <div class="card-footer border-0 rounded p-1 m-1">
      <div class="text-center d-flex justify-content-center align-content-center">
        @if (Auth::user()->username == 'root' )
          <form class="p-0 m-1 border border-danger rounded" action="{{ route('estaciones.destroy', $estacion->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <input type="submit" class="btn btn-sm border-0 text-muted text-center border-1 border-danger" type="submit" onclick="return confirm('¿Quieres borrar? {{$estacion->nombre}}' )" value="Borrar">
          </form>
          <a   type="button" class="text-muted btn btn-sm border border-primary m-1" href="{{ route('estaciones.edit', $estacion->id) }}">Editar</a>                
        @endif
        <small id="{{ $estacion->nombre }}" class="btn btn-sm border-1 m-1"><b>Actualizado: </b></small>
      </div>      
    </div>

    <script>
      var valor = @json($estacion->updated_at);
      var objeto = String(@json($estacion->nombre));
      var objeto = document.getElementById(objeto);

      qSmall(objeto, valor)
    </script>
  </div>

@endforeach

</div>
</div>
</div>
<!-- </main> -->














@endsection
