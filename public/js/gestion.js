// aqui pones los botones y cosas que cambien
function muestraImg(cont, arch, ids) {
    window.onbeforeunload = function(e) {
        sessionStorage.setItem('lista', null);
    }
        
    
    
    var contenedor = document.getElementById(cont);
    var archivos = document.getElementById(arch).files;
    var archivos2 = arch;
    var ids = ids;
    var guardar = document.getElementById('Guardar');
    var agregar = document.getElementById('agregar')
    var listo = document.getElementById('listo')


    if (document.getElementById(ids)) {
        document.getElementById(ids).remove();
    }

    if (sessionStorage.getItem("num")== null) {
        sessionStorage.setItem("num", 0);     
    }

    if (document.getElementById(ids)) {
        // bueno XD no hay funcion pero si llega haber se pone aqui XD
    } else {
        for (i = 0; i < archivos.length; i++) {

            id_veri = archivos2.replace('imagen', '');
            console.log(ids, id_veri);;

            if(id_veri == ids){
                imgTag = document.createElement("img");
                imgTag.height = 225;                                  //ESTAS LINEAS NO SON "NECESARIAS" 
                imgTag.width = 350;                                   //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN 
                imgTag.id = ids;
                imgTag.className = "rounded";                                      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
                imgTag.src = URL.createObjectURL(archivos[0]);
                if (sessionStorage.getItem('lista') == "null") {
                    sessionStorage.setItem('lista', "files0")
                    console.log("si y ha sido remplazada por files0")
                } else {
                    console.log("no")
                }
                contenedor.appendChild(imgTag);

                // estooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooy aqui          
            }
            if(id_veri != ids){
                sessionStorage.setItem('num', id_veri)
            }
            if (sessionStorage.getItem('num') == ids) {
                
                var num = parseInt(sessionStorage.getItem("num")) + 1;
                sessionStorage.setItem("num", num); 
            }

            if (guardar) {
                guardar.remove()
                agregar.insertAdjacentHTML('beforebegin', '<button id="listo" class="btn small text-light bg-orange m-1 p-1 extension" style="width: fit-content !important;" type="button" onclick="Enviolist(sessionStorage.getItem(\'lista\'))">¿ Listo ?</button>')
                console.log("true");
            
            } else {
                if (listo) {
                    listo.remove()
                }
                console.log("falso");
                agregar.insertAdjacentHTML('beforebegin', '<button id="listo" class="btn small text-light bg-orange m-1 p-1 extension" style="width: fit-content !important;" type="button" onclick="Enviolist(sessionStorage.getItem(\'lista\'))">¿ Listo ?</button>')
            }
            
        }        
    }
    };

var num = 0
function OtherCamp() {
    var inputs = document.getElementById('inputs');
    var inputs1 = document.getElementById('inputs1');
    var divImagenes = document.getElementById('divImagenes');
    var guardar = document.getElementById('Guardar');


                                

    num = num + 1
    if ((num % 2) == 0) {
        //objeto 1
        inputs1.insertAdjacentHTML("beforeend", '<input type="file" class="form-control" style="width: max-content" id="imagen'+num+'" name="files'+num+'" onchange="muestraImg(\'muestrasImg'+num+'\', \'imagen'+num+'\', \''+num+'\');">')
        divImagenes.insertAdjacentHTML('beforeend', '<div class="border p-0 m-1 rounded" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

    } else {
        //objeto 2
        inputs.insertAdjacentHTML("beforeend", '<input type="file" class="form-control" style="width: max-content" id="imagen'+num+'" name="files'+num+'" onchange="muestraImg(\'muestrasImg'+num+'\', \'imagen'+num+'\', \''+num+'\');">')
        divImagenes.insertAdjacentHTML('beforeend', '<div class="border p-0 m-1 rounded" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

    }

   if (sessionStorage.getItem('lista')) {
        var files = ' '+sessionStorage.getItem('lista')
        sessionStorage.setItem('lista', ['files'+num]+files )
    }
    console.log(sessionStorage.getItem('lista'))

    if (guardar) {
        guardar.remove()
        agregar.insertAdjacentHTML('beforebegin', '<button id="listo" class="btn small text-light bg-orange m-1 p-1 extension" style="width: fit-content !important;" type="button" onclick="Enviolist(sessionStorage.getItem(\'lista\'))">¿ Listo ?</button>')
        console.log("true");
    }
}

function Enviolist(list) {
    var idspos = document.getElementById('id')
    var verif = document.getElementById('list')
    var button = document.getElementById('agregar')
    var listo = document.getElementById('listo')

    if (verif) {
        verif.remove()
        
    }
    listo.remove()

    idspos.insertAdjacentHTML('afterend', '<input type="text" class="form-control" id="list" name="list" hidden value="'+list+'">')

    button.insertAdjacentHTML('beforebegin', '<button id="Guardar" class="btn small btn-success m-1 p-1 extension" style="width: fit-content !important;" type="submit">Guardar</button>')
    
}

function ImagenVerif(img, url) {
    var contenedor = document.getElementById('imagenes');

    if (img > 1) {
        console.log("si esta "+img);
    } else {
        console.log('no esta');
        contenedor.insertAdjacentHTML('afterbegin', '<a class="btn btn-success text-light m-1" style="width:fit-content;" href="'+url+'"><b>Agregar documentos</b></a>')
        
        contenedor.insertAdjacentHTML('afterbegin', '<label class="form-label text-center">No posee ninguna imagen o documento aun   <b>¿Desea subir alguno?</b> </label>')

    }
}

function detail(component, id, serial, fab, esp) {
    var capa = document.getElementById('modalSheet');
    var modal = document.getElementById('modalCard');
    var body = document.getElementById('modal-body');
    var input = document.getElementById('id-input');
    var com_input = document.getElementById('component-input');

    var input_ser = document.getElementById('floatingInput');
    var input_Fab = document.getElementById('floatingInput2')
    var input_Esp = document.getElementById('floatingInput3')

    var title = document.getElementById('modal-title');
    
    if (component && id) {
        input.setAttribute('value', id);
        com_input.setAttribute('value', component);
        title.innerText = component;
        //body.innerText = component;
        
        if ((serial == '') && (fab == '')) {
             body.innerText = 'Agregar parametros'
        } else {
            body.innerText = 'Editar parametros'
        }
       

        input_ser.value = serial;
        input_Fab.value = fab;
        input_Esp.value = esp;

        capa.classList.remove('hidden')
        
        if (capa.getAttribute('style') == 'visibility:hidden') {
            capa.removeAttribute('style')
        }

        modal.classList.remove('hidden')       
    } else {
        modal.classList.add('hidden')
        capa.setAttribute('style', 'visibility:hidden')
    }

}

function users(id, name, user, email, cedula, tipo_user) {
   

    var body = document.getElementById('modalCard');
    var id_inp = document.getElementById('id-input');
    var name_inp = document.getElementById('nombre');
    var user_inp = document.getElementById('user');
    
    var email_inp = document.getElementById('correo');    
    var cedula_inp = document.getElementById('cedula');
    
    var tipo_opt = document.getElementById('tipo');



    if ((id!='') && (name!='') && (user!='') && (email!='') && (cedula!='') && (tipo_user!='') ) {
        body.style.visibility = 'visible';    
        id_inp.value = id;
        name_inp.value = name;
        user_inp.value = user;
        email_inp.value = email;
        cedula_inp.value = cedula;
        tipo_opt.value = tipo_user;
        
        
        console.log(id, name, user, email, cedula, tipo_user)
    } else {
        body.style.visibility = 'hidden';
    }

}

function mapaItem() {
    //este es el Contructor de los item
    var nombres = [
        "IAAV", "IBAV", "VIGV", "CURV",
        "IMOV", "ITEV", "SOCV", "SANV",
        "MONV", "JACV", "SDV", "ELOV",
        "ORCV", "DABV", "QARV", "MAPV",
        "MCQV", "CAPV", "SIQV", "TURV",
        "BAUV", "RAYV", "BENV", "TACV",
        "CARV", "PONV", "BIRV", "CUPV",
        "MERV", "CACV", "PRGV", "PCRV",
        "CRUV", "GUNV", "GUIV", "QRIV",
        "GURV", "RIOV", "LUGV"
    ];

    var altura = [      
        "top: 20px;", "top: 249px;", "top: 425px;", "top: 350px;",
        "top: 218px;", "top: 274px;", "top: 450px;", "top: 379px;",
        "top: 240px;", "top: 290px;", "top: 419px;", "top: 527px;",
        "top: 249px;", "top: 302px;", "top: 342px; ", "top: 358px;",
        "top: 350px;", "top: 475px;", "top: 314px;", "top: 325px;",
        "top: 412px;", "top: 617px;", "top: 354px; ", "top: 346px;",
        "top: 322px;", "top: 322px;", "top: 322px;", "top: 347px;",
        "top: 394px;", "top: 495px;", "top: 424px;", "top: 343px;",
        "top: 314px;", "top: 314px;", "top: 314px;", "top: 403px;",
        "top: 482px;", "top: 465px;", "top: 594px;"
    ];

    var izquierda = [
        "left: 65%;", "left: 58%;", "left: 15%;", "left: 24%;",
        "left: 19%;", "left: 67%;", "left: 19%;", "left: 27%;",
        "left: 25%;", "left: 32%;", "left: 20%;", "left: 27%;",
        "left: 48%;", "left: 20%;", "left: 21%;", "left: 34%;",
        "left: 8%;", "left: 10%;", "left: 25%;", "left: 37%;",
        "left: 36%;", "left: 38%; ", "left: 39%;", "left: 42%;",
        "left: 42%;", "left: 44%;", "left: 47%;", "left: 50%;",
        "left: 47%;", "left: 49%;", "left: 57%;", "left: 58%;",
        "left: 67%;", "left: 67%; ", "left: 72%;", "left: 65%;",
        "left: 67%;", "left: 75%;", "left: 77%;"
    ];

    var mapa = document.getElementById('mapa');

    for (i = 0; i < nombres.length; i++){
        mapa.insertAdjacentHTML('afterbegin', '<div id="'+nombres[i]+'" class="bg-dark text-dark small position-absolute" role="status" style="'+altura[i]+izquierda[i]+'--bs-spinner-width: 1.2rem; --bs-spinner-height: 1.2rem;"> a <span class="visually-hidden">.</span></div>');
        console.log(nombres[i]);
    }
    
}
