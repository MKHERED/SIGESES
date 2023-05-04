@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">  
</head>
<body class="update">
    <div class="box border text-primary text-center text-bold bg-dark">    
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje')}}
            @endif
    </div>
    <section class="p-5 bg-light update">
        <div class="row">
            <div class=""col-md-12>
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Zona para subir los domumentos</h3>
                    
                    </div>
                    
                    <div class="card-body update">
                        <form method="post" action="{{route( 'update.store')}}" enctype="multipart/form-data" class="dropzone my-awesome-dropzone update-d" id="image-upload">
                            @csrf
                            <input class="btn btn-success m-1 extension" type='submit' value='Guardar'>
                            
                            
                            <input type="number" class="form-control" style="width: 100px" id="" name="id" hidden value="{{ $id }}">
                            <div class="dz-default dz-message">
                                <span>Arrastre los archivos aqui</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Descargar archivo para jquery.... -->
    <script src="{{asset('js/dropzone.min.js')}}"></script>
    <script>
        Dropzone.options.myawesomeDropzone = {
            headers:{
                'x-csrf-TOKEN' : "{{csrf_token()}}"
            },
        };
    </script>
</body>



@endsection