@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css') }}">
<style>
    #mapa {
        background-image: url("{{asset('img/mpa.png') }}");
        background-size: 100% 100%;
        width: 100%;
        height: 100%;
        position: absolute;
    }
    #cover {
        width: 100%;
        height: 100%;
        opacity: 90%;
    }
</style>
<div id="mapa" >
    <div class="">
                
        <div id="modalCard" class="modal d-flex hidden" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 id="modal-title" class="modal-title m-2 fs-5">Titulo de la estacion</h1>
                    <!-- <button type="button" class="btn btn-danger" onclick="detail()">Cancelar</button> -->
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
    </div>
</div>




@endsection
