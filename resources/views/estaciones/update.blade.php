@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
</head>
<body>
    <div class="box border text-primary text-center text-bold bg-dark">    
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje')}}
            @endif
    </div>
    <section class=" p-5 bg-light">
        <p>hola</p>
        <div class="row">
            <div class=""col-md-12>
                <div class="card">
                    <div class="card-header">
                        Zona para subir los domumentos
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route( 'update.store' )}}" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                            @csrf
                            <div>
                                <h3 class="text-center">Suba los documetos aqui</h3>
                            </div>
                            <div class="dz-default dz-message">
                                <span>Drop files here to upload</span>
                            </div>
                        
                            <input class="btn btn-success m-1" type='submit' value='Guardar'>
                        </form>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </section>


    <!-- Descargar archivo para jquery.... -->
    <script src="{{asset('js/dropzone.min.js')}}"></script>
</body>



@endsection