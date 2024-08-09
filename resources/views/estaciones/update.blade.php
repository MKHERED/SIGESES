@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<style>

</style>
<body class="update">
    <div class="box border text-primary text-center text-bold bg-dark">
        @if (Session::has('mensaje'))
        {{ Session::get('mensaje')}}
        @endif
    </div>               
    <div class="p-1 bg-orange card-header text-center">             
        <h4 class="p-0 m-0 text-light">Zona para subir los domumentos</h4>
    </div>
    <div class="alert alert-warning border-0 rounded-0 m-0 text-center p-1" role="alert">
        <strong>Tenga en Cuenta </strong> el maximo de archivos por subir es de 20 en total y cada archivo no se puede exceder de los 20 megabites (20mb)
    </div>
    <section class="update container">

        <div class="row border">
            <div class="col-md-12 bg-white">
                <div class="card-body ">


                    <div class="container update p-2 m-2">
                        <form method="post" action="{{route( 'update.store')}}" enctype="multipart/form-data" class=" card-body update-d" id="image-upload">
                            @csrf
                            <div class="row">
                                <div id="inputs" class="col-sm-4">

                                    <input type="file" class="form-control" style="width: max-content" id="imagen0" name="files0" onchange="muestraImg('muestrasImg', 'imagen0', '0');">
                                </div>
                                <div class="col-sm-1 p-0">

                                </div>
                                <div id="inputs1" class="col-sm-4">

                                </div>
                                <div  class="col-sm-3">

                                    <button id="agregar" class="btn small btn-dark m-1 p-1 extension" style="width: fit-content !important;" type="button" onclick="OtherCamp()">Añadir Campo</button>

                                </div>
                            </div>
                            <div id="divImagenes" class="col-sm-12 row mb-3 pb-3 mt-2">
                                <div class="p-0 m-1 rounded" style="width:350px; height:225px; max-width: 350px; max-height: 225px" id="muestrasImg"></div>
                            </div>
                            
                            <script src="{{asset('js/gestion.js') }}"></script>
                            <input type="number" class="form-control" style="width: 100px" id="id" name="id" hidden value="{{ $id }}">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>



@endsection