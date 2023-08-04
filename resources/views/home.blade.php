@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css') }}">
<script src="{{asset('js/gestion.js') }}"></script>
<style>
    #mapa {
        background-image: url("{{asset('img/mpa.png') }}");
        background-size: 100% 100%;
        width: 100%;
        height: 100%;
        position: absolute;
    }
    
    @media(min-width: 1200px) {
        #mapa {
            width: 1400px;
            height: 100%;
        }
    }

    .trans {
        background: rgba(255, 255, 255, 0.30);
    }
</style>
<div id="mapa" >
    <div id="modalCard" class="d-flex" role="dialog" >
        
        <div class="modal-dialog  rounded-4 m-1 trans position-relative" >
            <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h1 id="modal-title" class="modal-title small m-2">Titulo de la estacion</h1>
            </div>
            <div class="modal-body py-0">
            </div>
                <div class="form-floating mt-0 m-3 mb-3">
                    
                </div> 
                <div class="form-floating mt-0 m-3 mb-3">
                </div>
                <div class="form-floating mt-0 m-3 mb-3">
                </div>
                
                <div class="form-floating mt-0 m-3 mb-3">                
                </div>       
                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                </div>        
            </div>
        </div>
    </div>
    <script>
        mapaItem()
    </script>
</div>




@endsection
