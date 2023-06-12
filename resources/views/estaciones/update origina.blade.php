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
    <section class="bg-light update">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-1 bg-orange card-header text-center">
                        <h4 class="p-0 m-0 text-light">Zona para subir los domumentos</h4>

                    </div>

                    <div class="card-body update">
                        <form method="post" action="{{route( 'update.store')}}" enctype="multipart/form-data" class="dropzone my-awesome-dropzone update-d" id="image-upload">
                            @csrf
                            
                            <div class="row">
                                <div class="col-sm-11">
                                    <input type="file" class="form-control" style="width: 100px" id="files" name="files">
                                </div>
                                <div class="col-sm-1">

                                    <input class="btn small btn-success m-1 p-1 extension" style="width: fit-content !important;" type='submit' value='Guardar'>
                                </div>
                            </div>



                            <input type="number" class="form-control" style="width: 100px" id="" name="id" hidden value="{{ $id }}">
                            <div class="dz-default dz-message">
                                <span>Arrastre los archivos aqui</span>
                                <div class="dropzone-previews">

                                </div>
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
            maxFilesize: 12,
            timeout: 6000,
            paramName: 'file',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            headers:{
                'x-csrf-TOKEN' : "{{csrf_token()}}"
            },
            //
             dictDefaultMessage: 'AQUI',
             init: function() {
                 this.on("error", function(file, res){
                     var msg = res.errors.file[0];
                     $('.dz-error-message:last > span'),text(msg);
                 })
             }
        };
        //Dropzone.autoDiscover = false;
    </script>
</body>



@endsection