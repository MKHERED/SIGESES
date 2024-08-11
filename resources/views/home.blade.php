@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<style> 
#map { height: 93vh; }
#opciones {
    z-index: 1000 !important;
    position: fixed !important;
}
button:hover svg line {
    stroke: red;
  }
button:hover .bi-info-circle {
  color: #ff0000;
}
</style>


<div id="map" class="p-1">
    <div id="opciones" class="w-50 input-group small mb-3 mt-4 bg-light start-50 translate-middle rounded d-flex justify-content-around">
        <input type="text" class="form-control" id="buscador" placeholder="Estación: nombre, siglas u operatividad">
        <button  class="d-flex align-items-center input-group-text bg-light" title="borrar busqueda" onclick="borrar()">
            <svg width="20" height="20">
                <line x1="5" y1="5" x2="15" y2="15" stroke="black" stroke-width="2" />
                <line x1="5" y1="15" x2="15" y2="5" stroke="black" stroke-width="2" />
              </svg>
        </button>
        <div class="d-flex align-items-center input-group-text bg-light">
            <label for="mapa">Mapa:</label>
                      
        </div>
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" name="mapa" id="cambio">
        </div>
       
    </div>
    <div style="z-index: 2000;" class="position-absolute top-0 end-0 mt-1 rounded p-1">
        <button type="button" id="liveToastBtn" class="m-0 p-0 border-0" style="background-color: transparent;">
            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" class="bi bi-info" viewBox="0 0 16 16">
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" fill="white"/>
            </svg> 
        </button>

        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 2000;">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <strong class="me-auto">Sugerencia</strong>
                <small></small> <!--alguna Información-->
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Si la estación no se registra en el mapa, por favor revise las coordenadas. Lo recomendado es que sean <b> Decimales </b>
                </div>
            </div>
        </div>
        <script>
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
            }
        </script>       
    </div>
</div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const button = document.querySelector("input[name=mapa]");
    button.checked = false

    button.addEventListener("change", function (){
        if (this.checked) {
            a = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
            cambiarMapa(a)
        } else {
            a = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
            cambiarMapa(a)

        }        
    });

    var map = L.map('map').setView([8.500000,-66.0188471], 7);
    array = @json($estaciones);
    //console.log(array)
    function creacionMarcadores(array){
        //console.log(array)
        contenido = String(array["imagen_n"])
        imagen = 'http://10.16.14.7/storage/'+array['imagen_n']
        //console.log(imagen)
        idimg =  array["nombre"]+"img"

        operativa = array["operativa"];

        switch (operativa) {
            case "Operativa":
                icono = @json(asset('img/mapa-icons/estacionOperativa.svg'));
                break;
            case "No operativa":
                icono = @json(asset('img/mapa-icons/estacionNoOperativa.svg'));
                break;
            case "Vandalizada":
                //icono = @json(asset('img/mapa-icons/estacionVandalizada.svg'));
                icono = @json(asset('img/mapa-icons/estacionNoOperativa.svg'));
                break;
            case "Desinstalada":
                //icono = @json(asset('img/mapa-icons/estacionDesintalada.svg'));
                icono = @json(asset('img/mapa-icons/estacionNoOperativa.svg'));
                break;
            case "Infraestructura":
                //icono = @json(asset('img/mapa-icons/estacionInfraestructura.svg'));
                icono = @json(asset('img/mapa-icons/estacionNoOperativa.svg'));

                break;
            case "Portatil":
                //icono = @json(asset('img/mapa-icons/estacionInfraestructura.svg'));
                icono = @json(asset('img/mapa-icons/estacionPortatil.svg'));

                break;
            default:
                icono = @json(asset('img/mapa-icons/estacion.svg'));
                console.log("La ubicacion de las imagenes para el mapa es incorrecta: "+array["nombre"]);
            }

        var estacionIcon = L.icon({
                            iconUrl: icono,
                            iconSize:     [50, 50], // size of the icon
                            iconAnchor:   [35, 20], // point of the icon which will correspond to marker's location
                        });

        if (!array['latitud'].includes(" ")) {
            L.marker([array['latitud'], array['longitud']], {
                icon       : estacionIcon,
                draggable  : false,
                opacity    : 0.8,
                riseOnHover: true,
                title      : array["nombre"]+" "+array["siglas"]+" "+"\n"+array["operativa"],
                alt        : [array['latitud'], array['longitud']],
                }).bindPopup(
                    '<div id="'+array["siglas"]+'" class="'+array["nombre"]+" "+array["siglas"]+'">'+
                    '<img class="m-0 p-0" id="'+idimg+'" src="'+ imagen +'" class="card-img-top" alt="" style="max-width: 200px; min-width: 200px; max-height: 200px">'+
                    '<div class="card-body p-0 m-o" style="width:200px">'+
                        '<h5 class="card-title text-center">'+array["nombre"]+'</h5>'+
                        '<p class="small text-center m-0 p-0 text-break">'+array["ubicacion"]+" - "+array["estado"]+'</p>'+
                        '<div class="card-header">'+
                            '<p class="m-0 p-0">Datos</p>'+
                            '<hr class="m-0 p-0">'+
                            '<ul class="list-group list-group-flush">'+
                                '<li class="list-group-item p-1"><b>Siglas:</b> '+array["siglas"]+'</li>'+
                                '<li class="list-group-item p-1"><b>Custodio:</b> '+array["custodio"]+'</li>'+
                                '<li class="list-group-item p-1"><b>Estado:</b> '+array["operativa"]+'</li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="d-flex justify-content-end">'+
                            '<a href="http://10.16.14.7/estaciones/'+array["id"]+'" class="btn btn-warning text-dark btn-sm p-1 justify-self-end">Revisar</a>'+
                    ' </div>'+
                    '</div>'+
                    '</div>'
                    , {
                minWidth: 200,
                maxHeight: 400,
            
                keepInView: true,
            }).bindTooltip("<p class='p-0 m-0'>"+array["siglas"]+"</p>", {
                ClassName: array["operativa"],
                permanent: true,
                direction: 'top',
                offset: [-15,-15]
            }).addTo(map);

            var img = document.getElementById(idimg)
            //sr = img.src
            //console.log(img)

            //console.log(sr)
            //img.src = sr + array["imagen_n"]            
        } else {
            console.log('no se puede mostrar la siguiente estación: '+ array['nombre'])
        }


    }

    array.forEach(estacion => {
        //console.log(estacion['nombre'])
        creacionMarcadores(estacion)
    });

    function cambiarMapa(a, array) {      
        
        L.tileLayer(a, {
            maxZoom: 10,
            minZoom: 6,
        }).addTo(map);  
        //para hacer la prueba de cargarlo se debe iterar array
        //creacionMarcadores(array[0])
    }
    
    

    a = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
    cambiarMapa(a, array)
    
</script>
<script>
    const padre = document.querySelector('.leaflet-marker-pane');
    const hijos = padre.childNodes;

function dataMapa(e) {
        valor = e.target.value.trim()
        lista = ["operativa", "no operativa", "vandalizada", "desinstalada", "infraestructura", "portatil"]        
        ver = "f";
        for (let i = 0; i < hijos.length; i++) {
            hijo = hijos[i];

            valorOri = hijo.title.replace("\n", " ");
            valorOri = valorOri.toLowerCase();
            valorOri = valorOri.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            valor    = valor.toLowerCase();
            valor    = valor.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            
            
            for (a = 0; a < lista.length; a++) {
                estado = lista[a]
                hijoId = hijo.attributes['aria-describedby'].value;
                
                if (valorOri.includes(estado) && estado == valor) {
                    //console.log(valorOri)
                    ver = "t";
                    hijo.hidden = false;
                    hijoId = document.getElementById(hijoId)
                    hijoId.hidden = false;
                    map.flyTo([8.500000,-66.0188471], 7)

                } 
                if  (valorOri.includes(estado) && estado != valor){
                    //console.log(valorOri+" "+valor+" estos no")
                    hijo.hidden = true;
                    hijoId = document.getElementById(hijoId)
                    hijoId.hidden = true;
                }
                /*
                if (valorOri.) {
                    hijo.hidden = false;
                    hijoId = document.getElementById(hijoId)
                    hijoId.hidden = false;
                }*/

            }

            if (valor == "" || valor == " ") {
                hijo.hidden = false;
                hijoId = hijo.attributes['aria-describedby'].value;
                hijoId = document.getElementById(hijoId)
                hijoId.hidden = false;
            }


            if(valorOri.indexOf(valor) !== -1 && ver != "t"){
                //console.log("El título contiene la palabra clave: "+valor); 
                array = hijo.alt.split(",")
                latitud= parseFloat(array[0])
                longitud= parseFloat(array[1])
                if (!valor == "" | valor == " ") {
                    map.flyTo([latitud, longitud], 10)
                    hijo.hidden = false;
                    hijoId = document.getElementById(hijoId)
                    hijoId.hidden = false;
                } else {
                    map.flyTo([8.500000,-66.0188471], 7)
                }
                
            }
        }
}

    buscador = document.getElementById('buscador');
    buscador.addEventListener('keyup', (e)=>{
        dataMapa(e)

    })

    function borrar() {
        buscador.value = "";
        
        for (let i = 0; i < hijos.length; i++) {
            hijo = hijos[i];
            if (buscador.value == "" || buscador.value == " ") {
                hijo.hidden = false;
                hijoId = hijo.attributes['aria-describedby'].value;
                hijoId = document.getElementById(hijoId)
                hijoId.hidden = false;
            }
        }

        map.flyTo([8.500000,-66.0188471], 7)
    }

</script>

<!--     
L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});
-->
@endsection
