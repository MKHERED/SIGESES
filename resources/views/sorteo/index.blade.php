<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo Funvisis 2023-2024</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <script src="{{asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <style>
        .hidden {
            visibility: hidden;
        }

        .blur{
        text-align: center;
        color: #fff;
        backdrop-filter: blur(100px);
        }
        .body1 {

            background-image: url({{asset('img/sorteo/img4.jpg') }} );
            background-repeat: no-repeat;
            background-attachment: fixed ;
            background-size: cover;
        }
        .body2 {

            background-image: url({{asset('img/sorteo/img5.jpg') }});
            background-repeat: no-repeat;
            background-attachment: fixed ;
            background-size: cover;
        }
        #modal-nav {

            background-repeat: no-repeat;
            background-attachment: fixed ;
            background-size: cover;
        }
        .imgs-content {
            width:25%;
            height: 20%;
        }
        .imgs {

            width: 300px;
            height: 150px;
        }
        #prox.rotate180 {
            transition: all 0.5s ease-in-out;
            transform: rotate(180deg) ;
            -webkit-transform: rotate(180deg);
        }

        #prox.rotate0 {
            transition: all 0.5s ease-in-out;
            transform: rotate(0deg) ;
            -webkit-transform: rotate(0deg);
        }

        #bam.rotate {
            -webkit-animation: tiembla 0.3s 1;
        }
        #bam.rotate0 {
            transition: all 0.5s ease-in-out;
            transform: rotate(0deg) ;
            -webkit-transform: rotate(0deg);


        }

        #sorteo-numero.gra {
            background: -webkit-linear-gradient(white, gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size:250px
        }
        #sorteo-numero.gra0 {
            color: white;
            -webkit-background-clip: text;
            -webkit-text-fill-color: white;
            font-size:250px
        }
        #cola {
            overflow-y: scroll;
        }

        @media (max-width: 800px) {
            #sorteo-numero.gra, #sorteo-numero.gra0 {
                font-size:200px
            }
            .imgs {
                width: 300px;
                height: 140px;
            }
        }
        @-webkit-keyframes tiembla{
            0%  { -webkit-transform:rotate(-15deg); }
            12% { -webkit-transform:rotate( 0deg); }
            24%{ -webkit-transform:rotate( 15deg); }
            36%{ -webkit-transform:rotate( 0deg); }

            48%{ -webkit-transform:rotate( -7deg); }
            60%{ -webkit-transform:rotate( 0deg); }
            72%{ -webkit-transform:rotate( 7deg); }
            84%{ -webkit-transform:rotate( 0deg); }

            96%{ -webkit-transform:rotate( -5deg); }
            100%{ -webkit-transform:rotate( 0deg); }
        }


    </style>
</head>
<body class="body1">
    <main class="text-success text-center " style="width:100%; min-height:100vh">
        <div id="Ontic" class="position-absolute top-0 start-0 imgs-content rounded-5 hidden">
             <img src="{{asset('img/sorteo/logo.png') }}" alt="" class="imgs">
        </div>
        <div id="Funv" class="position-absolute bottom-0 start-0 imgs-content">
            <img src="{{asset('img/sorteo/logo2.png') }}" alt="" class="imgs">
        </div>

        <div class="position-absolute start-50 translate-middle mt-5">
            <div class="hidden" id="alerta">
                <div class="alert alert-primary" role="alert" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>

                    </svg>
                    <div>
                        Por favor introdusca un total de participantes
                    </div>
                </div>
            </div>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle bg-transparent">
        <div class="card border-0 bg-transparent "  style="width: 40rem; ">
            <div id="modal-nav" class="card-body rounded-3">
                <p class="card-title" style="font-weight: 900;">
                    <font id="sorteo-numero" class="gra">
                        ----
                    </font>
                </p>

                <!-- <h4 class="card-subtitle mb-2 text-muted text-light">Funvisis 2023</h4> -->



                <p id="id" class="card-text text-light h2">Funvisis</p>

                

                <button class="card-link btn btn-success" type="button" id="sorteo" onclick="sorteo()">Sortear</button>
                


            </div>
            <div class="accordion bg-transparent border-0 " id="accordionExample">
                <div class="accordion-item bg-transparent border-0  col-8 container">

                    <button class="btn border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" onclick="rota()">
                        <img class="rotate0" id="bam" src="{{asset('img/sorteo/button1.png') }}" width="50px">
                    </button>

                    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <h6 class="mt-3 text-light">Limites</h6>

                    <div class="accordion-body container row">

                        <div class="input-group justify-content-center p-1" >
                            <span class="input-group-text bg-light" id="inputGroup-sizing-sm"># Empieza</span>
                            <input class="form-control bg-transparent text-light" type="number" id="min">
                        </div>

                        <div class="input-group justify-content-center p-1" >
                            <span class="input-group-text bg-light" id="inputGroup-sizing-sm"># Termina</span>
                            <input class="form-control bg-transparent text-light" type="number" id="max">
                        </div>
                        <div class="input-group justify-content-center p-1">
                            <button class="card-link btn btn-danger btn-sm" type="button" id="reiniciar" onclick="reinicio()">Reiniciar </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="cola" class="position-absolute top-0 end-0 col-2 h-100">
    </div>

    <div class="position-absolute bottom-0 end-0">
        <button class="card-link btn btn-sm btn-transparent text-light" type="button" id="pantalla" onclick="pantalla()">
            <img id="prox" class="rotate0" src = "{{asset('img/sorteo/prox.svg') }}" alt="Cambiar" width="25px"/>         </button>

    </div>


    </main>
    <script>
        function rota(){
            var bam = document.getElementById('bam')

            let times = 1;
                if (bam.className == 'rotate0') {
                    bam.className = 'rotate'
                } else {
                    bam.className = 'rotate0'
                }
            }


        function random(min, max) {
            var result = Math.floor((Math.random() * (max - min + 1)) + min)
            return result;
            }

        function sorteo() {
            numerosTotal = document.getElementById('max');
            numerosMin = document.getElementById('min');

            sorteoNumero = document.getElementById('sorteo-numero');
            alerta = document.getElementById('alerta');


            const cola = document.querySelector('#cola');


            if (numerosTotal.value == '') {
                sorteoNumero.innerHTML = '----';
                alerta.classList.remove('hidden')
                noti();

            } else {
                alerta.classList.add('hidden');


                var cont = 0;

                var id = setInterval(function(){
                    sorteoNumero.innerHTML = random(parseInt(numerosMin.value), parseInt(numerosTotal.value));
                    cont++;
                    if(cont == 15)
                    {
                        clearInterval(id);

                        numerosListos = localStorage.getItem("numeros");

                        if (numerosListos != null) {
                            if ((sorteoNumero.textContent != ('----'))) {
                                console.log(sorteoNumero.textContent)

                                numerosListos = numerosListos.split(',');
                                

                                for (item of numerosListos){
                                    if (item.toString() == sorteoNumero.textContent) {
                                        console.log(item + ' coincide')
                                        validador = false
                                        break

                                    } else {
                                        validador = true
                                    }
                                    
                                }
                                if (validador == true) {
                                    numerosListos.push(sorteoNumero.textContent);
                                    localStorage.setItem('numeros', numerosListos);
                                    cola.insertAdjacentHTML('afterbegin', '<div class="alert alert-light container bg-transparent text-light" role="alert"><font style="font-size:75px">'+sorteoNumero.textContent+'</font></div>')

                                } else {
                                    sorteo()
                                }

                                console.log(localStorage.getItem('numeros', numerosListos))
                            } else {
                                console.log('nada');

                            }

                        } else {
                            console.log('no hay nada');
                            localStorage.setItem("numeros", sorteoNumero.textContent);
                            

                            cola.insertAdjacentHTML('afterbegin', '<div class="alert alert-light container bg-transparent text-light" role="alert"><font style="font-size:75px">'+sorteoNumero.textContent+'</font></div>')

                            console.log(localStorage.getItem("numeros"))



                        }
                    }
                }, 250);



            }
        }

        function reinicio() {
            sorteoNumero = document.getElementById('sorteo-numero');
            numerosTotal = document.getElementById('max');
            numerosMin = document.getElementById('min');
            const cola = document.querySelector('#cola');

            localStorage.removeItem('numeros','')
            sorteoNumero.innerHTML = '----';
            cola.innerHTML = '';

            numerosTotal.value = ''
            numerosMin.value = ''


        }

        function pantalla() {
            p = document.getElementById('id');
            const body = document.querySelector('body');
            const img = document.querySelector('#Ontic');
            const img2 = document.querySelector('#Funv')
            const colorN = document.querySelector('#sorteo-numero');

            let angle = 0;
            var sv = document.getElementById('prox');
            if (sv.className == 'rotate180') {
                sv.className = 'rotate0'
            } else {
                angle = (angle + 180) % 360;
                sv.className = 'rotate'+angle;
            }



            if(p.textContent == 'Funvisis'){
                 p.innerHTML = 'ONCTI';
                body.className = 'body2'
                img2.className += " hidden";
                img.className = img.className.replace( ' hidden' , '' )
                colorN.className = 'gra0';
                localStorage.removeItem('numeros','')



            }else{
                p.innerHTML = 'Funvisis'
                body.className = 'body1'
                img.className += " hidden";
                img2.className = img2.className.replace( ' hidden' , '' )

                colorN.className = 'gra';
                localStorage.removeItem('numeros','')


            }

            reinicio();
        }

        function noti() {
            $('#alerta').fadeIn();     
            setTimeout(function(){
                $("#alerta").fadeOut()
            },2000);

         }
    </script>
</body>
</html>
