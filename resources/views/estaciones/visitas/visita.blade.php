@extends('layouts.app')
@section('content')

<style>
/*

main {
    height: 100vh !important;
    /* height: -webkit-fill-available; 
    /* max-height: 100vh; 
    /* overflow-x: auto; 
    /* overflow-y: hidden; 
    
}
.full {
    height: 100vh !important;
    max-height: 100vh;
} */
/*
.global {
    overflow-y: scroll;
    height: auto;

}
*/
.objetos {
    height: auto;
}

.global {
    max-height:400px !important;    
}
.sticky-lg-top{top:10%}
</style>

<main class="">
    <link rel="stylesheet" href="{{asset('css/visita.css') }}">

    <!-- convertir la barra vertical a navbar -->
    <div class="row p-0 m-0  d-flex justify-content-center">
        <div class="col-lg-2 col-md-10 col-sm-12  bg-dark text-light pb-2">
            <div class="sticky-lg-top h-25">
                <h5>Visitas</h5>
                <div class="list-group border-warning">
                @if (isset($visit))
                    <a class="list-group-item text-center" href="{{ route('estaciones.visita', $id) }}">Crear Visita</a></li>
                @else     
                    <button class="list-group-item border border-success text-success fw-bold" type="submit" form="createVisita" formenctype="multipart/form-data">Añadir visita</button></li>
                @endif
                <button class="list-group-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Lista de visitas
                </button>

                </div>
            

                <div class="collapse show global list-group mt-3 pb-1 overflow-scroll text-center" id="collapseExample">
                    
                    <script>
                        
                        function quita(objeto){
                            objeto = objeto.slice(0,19)
                            objeto = objeto.replace('T',' ')
                            obj = document.getElementById(objeto)

                            objeto = objeto.slice(0,10)

                            obj.value = objeto

                            console.log(objeto)

                        }
                    </script>
                   
                    @foreach ($visitas as $visita)
                        <form enctype="multipart/form-data" class="list-group-item rounded border-0 p-0 mt-1" action="{{route('estaciones.visitas', [$id, $visita->created_at]  )}}" method="POST"  >
                            @csrf
                            <div class="input-group m-0 p-0 border-0 small">
                                <span class="input-group-text bg-warning">#</span>
                                <input class="bg-white border-0" type="submit" name="{{$visita->created_at}}" id="{{$visita->created_at}}" value="{{$visita->created_at}}"> 
                            </div>
                            <input class="small btn-sm m-1" type="text" name="idv" hidden value="{{$visita->id}}">
                            
                                <script>
                                var obj = @json($visita->created_at)

                                quita(obj)
                                /* var corte = obj.slice(0,17) */

                                /*item = document.getElementsByName(obj) 
                                valor = item[0].value;
                                corte = valor.slice(0,10);
                                item[0].value = corte; */
                            </script> 

                        </form>
                    @endforeach

                    @if($visitas == "[]")

                        <span id="textooo" class="text-muted">No hay visitas registradas</span>

                    @endif
                </div>
                <div class="mt-5 text-center">
                    
                    <h5 class="small text-start">Opciones<h5>
                    <div class="btn-group">
                        <a href="" class="btn btn-outline-secondary" title="Imprimir">
                            <svg id="Layer_1" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m17 14a1 1 0 0 1 -1 1h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 1 1zm-4 3h-5a1 1 0 0 0 0 2h5a1 1 0 0 0 0-2zm9-6.515v8.515a5.006 5.006 0 0 1 -5 5h-10a5.006 5.006 0 0 1 -5-5v-14a5.006 5.006 0 0 1 5-5h4.515a6.958 6.958 0 0 1 4.95 2.05l3.484 3.486a6.951 6.951 0 0 1 2.051 4.949zm-6.949-7.021a5.01 5.01 0 0 0 -1.051-.78v4.316a1 1 0 0 0 1 1h4.316a4.983 4.983 0 0 0 -.781-1.05zm4.949 7.021c0-.165-.032-.323-.047-.485h-4.953a3 3 0 0 1 -3-3v-4.953c-.162-.015-.321-.047-.485-.047h-4.515a3 3 0 0 0 -3 3v14a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3z" fill="white"/></svg>
                        </a>
                        {{--<a href="" class="btn btn-outline-secondary" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" fill="red"/><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" fill="red"/><path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" fill="red"/></svg>
                        </a>--}}
                        @if (isset($visit))

                        <a class="btn btn-outline-secondary hover-success" href="{{route('estaciones.vEdit', ['id' => $id, 'idv'=>$visit['id']])}}" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M22.853,1.148a3.626,3.626,0,0,0-5.124,0L1.465,17.412A4.968,4.968,0,0,0,0,20.947V23a1,1,0,0,0,1,1H3.053a4.966,4.966,0,0,0,3.535-1.464L22.853,6.271A3.626,3.626,0,0,0,22.853,1.148ZM5.174,21.122A3.022,3.022,0,0,1,3.053,22H2V20.947a2.98,2.98,0,0,1,.879-2.121L15.222,6.483l2.3,2.3ZM21.438,4.857,18.932,7.364l-2.3-2.295,2.507-2.507a1.623,1.623,0,1,1,2.295,2.3Z" fill="orange"/></svg>
                        </a>
                        
                        @endif
                    </div>
                        
                </div>
            </div>
        </div>
    
        <div class="col-sm-10 full small text-center">
            @if (!isset($visit))
                <form id="createVisita" action="{{route('estaciones.vRegist', $id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="btn btn-light small btn-sm m-1" type="text" name="autor" hidden value="{{Auth::user()->id}}">

            @endif
            
                
                <div class="">
                    @include('estaciones.visitas.planilla')
                </div> 
            </div>

            @if (!isset($visit))
                </form>
            @endif
        </div>
    </div>



</main>
@endsection
