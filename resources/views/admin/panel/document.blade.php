@extends('layouts.app')

@section('content')


<main>
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
    <div class="album py-0 bg-body-tertiary p-1 m-1 bg-white" >
        <div class="container-xxl">
           
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @foreach ($estaciones as $estacion)
            
        <!-- Un truco que ni yo se como funciona XD pero funciona, es con relacion a \/ las comillas dan error al programar, pero esta bien -->
        <div class="col-sm-12 col-md-4 col-lg-3 text-center border-0" role="link" onclick='window.location="{{route('panel.show', $estacion->id)}}"'>
        <!-- -------------------------------------------------------------------------aqui cambiar la direccion -->
        
        <div class="card shadow-sm small border-0">
            <img class="bd-placeholder-img card-img-top" src="{{ asset('storage').'/'.$estacion->imagen_n}}" width="100%" height="200px" alt="Foto de {{ $estacion->nombre }}">
            <div class="card-body small">
              <p class="card-text h5">{{ $estacion->nombre }}</p>
              <div class="m-1 btn-group">
                <p class="p-1 m-1"><b>Ubicación Estadal: </b> {{ $estacion->estado }}</p>
              
              </div>

              <div class="align-items-center">
                <small class="btn-group text-body-secondary"><b>Actualizado: </b> {{ $estacion->updated_at}}</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach 

    </div>
</main>







@endsection

