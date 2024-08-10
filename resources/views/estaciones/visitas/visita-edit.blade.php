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
                    {{--<button class="btn btn-outline-secondary" title="Eliminar" type="submit" form="deleteVisita" formenctype="multipart/form-data">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" fill="red"/><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" fill="red"/><path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" fill="red"/></svg>
                        </button>--}}
                        <button class="btn btn-outline-secondary hover-success" title="Guardar" type="submit" form="createVisita" formenctype="multipart/form-data">
                            <svg  xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 100 100" width="20" height="20"><g><path d="M53.7,0c3.5,0.4,6.9,1,10.2,1.9c1.5,0.4,2.9,0.9,4.4,1.3c0.6,0.2,0.7,0.4,0.2,0.9c-2.4,2.4-4.8,4.8-7.2,7.2 c-0.4,0.4-0.8,0.3-1.3,0.2c-3.9-1.1-7.8-1.3-11.8-1.2c-6.4,0.2-12.4,2-18,5.2C22.6,19.8,17,26.1,13.4,34.2 c-2.2,5-3.3,10.2-3.3,15.7c0,9.5,3.1,18,9.1,25.3c6.6,8.1,15.2,12.9,25.6,14.3c10.7,1.4,20.5-1.3,29.2-7.9c8-6.1,12.9-14.1,15-23.8 c0.5-2.2,0.8-4.4,0.7-6.7c0-0.9,0.2-1.3,1.2-1.3c3,0.1,6,0.1,9,0.1c0,1.4,0,2.7,0,4.1c0,0.2-0.1,0.3-0.1,0.5 c-0.6,7.2-2.7,13.9-6.3,20.1c-7.2,12.4-17.8,20.4-31.8,24c-2.5,0.7-5.1,1-7.7,1.3c-2.7,0-5.5,0-8.2,0c-1.8-0.3-3.6-0.5-5.4-0.8 c-19-3.6-34.7-18.6-39.2-37.4c-0.6-2.5-1-5.1-1.3-7.7c0-2.7,0-5.5,0-8.2c0-0.2,0.1-0.3,0.1-0.5C0.8,37.9,3,30.8,7,24.4 C14.3,12.5,24.7,4.7,38.3,1.3c2.5-0.6,5-0.9,7.6-1.3C48.5,0,51.1,0,53.7,0z" fill="white"/><path d="M95,20c0,0.4-0.4,0.6-0.6,0.8c-4.3,4.3-8.6,8.6-12.8,12.8C69.7,45.5,57.9,57.3,46,69.1c-1,1-1,1-2.1,0 C37,62.2,30.1,55.3,23.2,48.4c-0.9-0.9-0.9-0.9,0-1.8c1.8-1.8,3.7-3.6,5.4-5.5c0.6-0.6,1-0.7,1.6,0c4.6,4.7,9.3,9.3,13.9,13.9 c0.7,0.7,1,0.7,1.7,0C59.5,41.3,73.3,27.6,87,13.9c1-1,1-1,2,0c1.8,1.8,3.6,3.6,5.5,5.5C94.6,19.5,94.9,19.7,95,20z" fill="green"/></g></svg>
                        </button>
                    </div>
                        
                </div>
            </div>
        </div>
    
        <div class="col-sm-10 full small text-center">
            
            <form id="createVisita" action="{{route('estaciones.vUpdate', [$id, $idv]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="btn btn-light small btn-sm m-1" type="text" name="autor" hidden value="{{Auth::user()->id}}">
                <div class="">
                    @include('estaciones.visitas.planilla-edit')
                </div> 
                </div>

            </form>
            <form id="deleteVisita" action="{{route('estaciones.vDelete', [$id, $idv])}}" method="POST" style="display: none;">
                @csrf
                
            </form>
        </div>
    </div>



</main>
@endsection
