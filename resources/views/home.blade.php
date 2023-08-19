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
    
    /* @media(min-width: 1200px) {
        #mapa {
            width: 1400px;
            height: 100%;
        }
    } */

    .trans {
        background: rgba(255, 255, 255, 0.99);
    }

    .triangulo {
        width: 0;
        height: 0;
        border-right: 14px solid #00000000;
        border-top: 20px solid transparent;
        border-left: 14px solid transparent;
        border-bottom: 20px solid orange;

    }

    .triangulo .text {
        text-decoration: underline 3px orange;

    }
</style>
<script>
    //nombre, visita, ubicacion


    function etiqueta(nombre, siglas, ubicacion, estado, operativa, visita, y, x){
        var modal = document.getElementById('modalCard');
        
        switch (modal.style.visibility) {
            case 'hidden':
                var estacion = document.getElementById(siglas); 
                // var modal = document.getElementById('modalCard');
                var mTitle = document.getElementById('modal-title');
                var mSiglas = document.getElementById('siglas');
                var mUbic = document.getElementById('ubicacion');
                var mEst = document.getElementById('estado');
                var mOper = document.getElementById('operativa');
                var mVis = document.getElementById('visita')

                if (modal.style.visibility == 'hidden') {
                    modal.style.visibility = 'visible';
                    
                    mTitle.innerText = nombre;
                    mSiglas.innerText = siglas;
                    mUbic.innerText = ubicacion;
                    mEst.innerText = estado;
                    //pendiente no va a ser bool
                    operativa = parseInt(operativa)
                    
                    console.log(operativa)
                     switch (operativa) {
                         case 0:
                             operativa = 'No operativa'
                             mOper.innerText = operativa;
                             break;
                         case 1:
                             operativa = 'Desintalada'
                             mOper.innerText = operativa;
                             break;
                         case 2:
                             operativa = 'Vandalizada'
                             mOper.innerText = operativa;
                             break;
                         case 3:
                             operativa = 'Infraestructura'
                             mOper.innerText = operativa;
                             break;
                         case 4:
                             operativa = 'Operativa'
                             mOper.innerText = operativa;
                             break;
                     }

                    //mOper.innerText = operativa;
                    visita = new String(visita);
                    
                    fecha = [];
                    for (i = 0; i <= 10; i++) {
                        fecha[i] = visita[i];
                        
                    }
                    fech = fecha.join(""); 
                    mVis.innerText = fech;
                    y = parseInt(y)-27;
                    y = new String(y)
                    modal.style.bottom =  y + '%';
                    modal.style.left = x;

                    console.log('vista')
                }
                break;

            case 'visible':
                modal.style.visibility = 'hidden';
                console.log('aqui')            
                break;
                
        }        

        

        //if (siglas != 'false' && modal.style.visibility == 'hidden') {
 
            //}             

    
    }



//  onclick="etiqueta('','false','','','','','','')"
</script>
<div id="mapa">
    <div id="modalCard" class=" position-absolute" role="dialog" style="visibility: hidden; left:0%; bottom:0%; width: 17%;">
        
        <div class="modal-dialog  rounded-4 m-1 trans position-relative" >
            <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0 bg-dark">
                <h1 id="modal-title" class="modal-title text-light small m-2" style="text-decoration: underline 1px orange">{}</h1>
            </div>
            <div class="modal-body py-0">
                <div class="form-floating mt-0 m-3 mb-1 p-0">
                    <p class="mt-0 mb-1 p-0">Siglas: <b><span id="siglas">{}</span></b></p>
                </div> 
                <div class="form-floating mt-0 m-3 mb-1 p-0">
                    <p class="mt-0 mb-1 p-0">Ubicación: <b><span id="ubicacion">{} </span></b></p>
                </div>
                <div class="form-floating mt-0 m-3 mb-1 p-0">
                    <p class="mt-0 mb-1 p-0">Estado: <b><span id="estado">{}</span></b></p>
                </div>
                <div class="form-floating mt-0 m-3 mb-1 p-0">
                    <p class="mt-0 mb-1 p-0">Condición: <b><span id="operativa">{}</span></b></p>
                </div>       
                <div class="form-floating mt-0 m-3 mb-1 p-0">
                    <p class="mt-0 mb-1 p-0">Visita: <b><span id="visita">{}</span></b></p>
                </div>        
            </div>
        </div>
    </div>
    
    <script>
        @foreach ($estaciones as $estacion)
        
        var estaciones = @json($estacion);
        mapaItem(estaciones)
        
        @endforeach
    </script>
    
</div>




@endsection
