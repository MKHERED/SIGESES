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
            //console.log(ids, id_veri);;

            if(id_veri == ids){
                imgTag = document.createElement("img");
                //imgTag.height = 100;//225 + 100;                                  //ESTAS LINEAS NO SON "NECESARIAS" 
                //imgTag.height = 260;
                //imgTag.width = 100;//350 + 275;                                   //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN 
                imgTag.id = ids;
                
                //imgTag.style = "object-fit: contain;";////////
                imgTag.className = "rounded limited";                                      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
                imgTag.src = URL.createObjectURL(archivos[0]);
                if (sessionStorage.getItem('lista') == "null") {
                    sessionStorage.setItem('lista', "files0")
                    //console.log("si y ha sido remplazada por files0")
                } else {
                    //console.log("no")
                }
                contenedor.appendChild(imgTag);
                console.log(imgTag)
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
                //console.log("true");
            
            } else {
                if (listo) {
                    listo.remove()
                }
                //console.log("falso");
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
        divImagenes.insertAdjacentHTML('beforeend', '<div class=" p-0 m-1 rounded" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

    } else {
        //objeto 2
        inputs.insertAdjacentHTML("beforeend", '<input type="file" class="form-control" style="width: max-content" id="imagen'+num+'" name="files'+num+'" onchange="muestraImg(\'muestrasImg'+num+'\', \'imagen'+num+'\', \''+num+'\');">')
        divImagenes.insertAdjacentHTML('beforeend', '<div class=" p-0 m-1 rounded" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

    }

   if (sessionStorage.getItem('lista')) {
        var files = ' '+sessionStorage.getItem('lista')
        sessionStorage.setItem('lista', ['files'+num]+files )
    }
    //console.log(sessionStorage.getItem('lista'))

    if (guardar) {
        guardar.remove()
        agregar.insertAdjacentHTML('beforebegin', '<button id="listo" class="btn small text-light bg-orange m-1 p-1 extension" style="width: fit-content !important;" type="button" onclick="Enviolist(sessionStorage.getItem(\'lista\'))">¿ Listo ?</button>')
        //console.log("true");
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

function ImagenVerif(img, url, urldoc) {
    var contenedor = document.getElementById('imagenes');

    if (img > 1 && (urldoc)) {
        //console.log("si esta "+img);

        contenedor.insertAdjacentHTML('beforeend', '<a class="btn btn-light m-1"  style="width:fit-content;" href="'+urldoc+'" >Documentos antiguos</a>');
    } else {
        //console.log('no esta');
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
        
        
        //console.log(id, name, user, email, cedula, tipo_user)
    } else {
        body.style.visibility = 'hidden';
    }

}

function mapaItem(estaciones) {
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
        "CRUV", "GUNV", "GUIV", "ORIV",
        "GURV", "RIOV", "LUGV", "TERV"
    ];

    var altura = [      
        "bottom: 96%;", "bottom: 86.2%;", "bottom: 47.5%;", "bottom: 59%;",
        "bottom: 92.5%;", "bottom: 80.2%;", "bottom: 42.2%;", "bottom: 54.3%;",
        "bottom: 87%;", "bottom: 76.9%;", "bottom: 49.8%;", "bottom: 25%;",
        "bottom: 86.2%;", "bottom: 74.5%;", "bottom: 61.7%; ", "bottom: 60.2%;",
        "bottom: 66%;", "bottom: 36%;", "bottom: 69.4%;", "bottom: 69.3%;",
        "bottom: 52%;", "bottom: 8.7%;", "bottom: 62.4%; ", "bottom: 64.2%;",
        "bottom: 70%;", "bottom: 71%;", "bottom: 71.1%;", "bottom: 65.9%;",
        "bottom: 56%;", "bottom:33.9% ;", "bottom: 49%;", "bottom: 65.4%;",
        "bottom: 72%;", "bottom: 66.4%;", "bottom: 72.3%;", "bottom: 52.3%;",
        "bottom: 35.9%;", "bottom: 40.4%;", "bottom: 13.8%;", "bottom: 58%;"
    ];

    var izquierda = [
        "left: 65%;", "left: 67.5%;", "left: 15%;", "left: 24%;",
        "left: 19%;", "left: 78%;", "left: 19%;", "left: 27%;",
        "left: 25%;", "left: 36%;", "left: 20%;", "left: 32%;",
        "left: 55.7%;", "left: 20%;", "left: 21%;", "left: 37.7%;",
        "left: 6%;", "left: 9%;", "left: 25%;", "left: 42%;",
        "left: 41%;", "left: 44%; ", "left: 44%;", "left: 48%;",
        "left: 46%;", "left: 49%;", "left: 54%;", "left: 58%;",
        "left: 53%;", "left: 57.2%;", "left: 66.3%;", "left: 66.4%;",
        "left: 77%;", "left: 80.5%; ", "left: 84%;", "left: 76%;",
        "left: 78.8%;", "left: 87.5%;", "left: 90.9%;", "left: 30.3%;"
    ];

    var mapa = document.getElementById('mapa');
    //console.log(estaciones); 
    for (i = 0; i < nombres.length; i++){
        if (estaciones['siglas'] == nombres[i]) {
            y = altura[i].replace('bottom: ', '');
            y = y.replace('%;', '');
            x = izquierda[i].replace('left: ', '');
            x = x.replace(';', '');

            //'<div id="'+nombres[i]+'" class="triangulo  small position-absolute" role="status" style="'+altura[i]+izquierda[i]+'--bs-spinner-width: 1.2rem; --bs-spinner-height: 1.2rem;">  <span class="text">'+nombres[i]+'</span></div>');
            // '+'"'+estaciones['nombre']+'"'+','+'"'+estaciones['siglas']+'"'+','+'"'+estaciones['ubicacion']+'"'+','+'"'+altura[i]+'"'+','+'"'+izquierda[i]+'     onclick='''etiqueta('+'"   '+estaciones['nombre']+'   "'+','+'"'+"mk"+'"'+','+'"'+"guatire"+'"'+','+'"'+"ayer"+'"'+','+'"'+"1"+'"'+','+'"'+"2"+'"'+')'''
            if(estaciones['operativa'] == 'Operativa'){
                mapa.insertAdjacentHTML('afterbegin', "<div id="+nombres[i]+" class='triangulo-green small position-absolute' role='status' style='"+altura[i]+izquierda[i]+"'> <span class='text' onclick='etiqueta(\" "+estaciones['nombre']+" \",  \" "+estaciones['siglas']+" \", \" "+estaciones['ubicacion']+" \", \" "+estaciones['estado']+" \", \" "+estaciones['operativa']+" \", \" "+estaciones['updated_at']+" \", \" "+y+" \", \""+x+"\")'> "+nombres[i]+" </span> </div");
            } else {
                mapa.insertAdjacentHTML('afterbegin', "<div id="+nombres[i]+" class='triangulo-red small position-absolute' role='status' style='"+altura[i]+izquierda[i]+"'> <span class='text' onclick='etiqueta(\" "+estaciones['nombre']+" \",  \" "+estaciones['siglas']+" \", \" "+estaciones['ubicacion']+" \", \" "+estaciones['estado']+" \", \" "+estaciones['operativa']+" \", \" "+estaciones['updated_at']+" \", \" "+y+" \", \""+x+"\")'> "+nombres[i]+" </span> </div");

            }
            //console.log(estaciones);            
        }

    }
    
}

function quita(objeto, valor){
    valor = valor.slice(0,19)
    valor = valor.slice(0,10)
    valor = valor.replace('T',' ')

    obj = document.getElementById(objeto)

    obj.value = valor

}

function fechaNow(objeto){
    let date = new Date()

    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    if (day < 10) {
        day = `0${day}`
        
    } 
    if(month < 10) {
        month = `0${month}`
    }

    dia = `${year}-${month}-${day}`

    console.log(dia)
    objeto = document.querySelector(objeto);
    objeto.max = dia

}

function qSmall(objeto, valor){
    valor = valor.slice(0,19)
    valor = valor.slice(0,10)
    valor = valor.replace('T',' ')
    objeto.innerHTML = `<b>Actualizado:</b> ${valor}`
    
}

function valorObj(objeto, valor){
    var objeto = document.querySelector(objeto)
    objeto.value = valor;
}

// ------------------------------------------------------------------ animaciones --------------------------------------------------------------------
function animate(options) {

    var start = performance.now();
  
    requestAnimationFrame(function animate(time) {
      // timeFraction от 0 до 1
      var timeFraction = (time - start) / options.duration;
      if (timeFraction > 1) timeFraction = 1;
  
      var progress = options.timing(timeFraction)
      
      options.draw(progress);
  
      if (timeFraction < 1) {
        requestAnimationFrame(animate);
      }
  
    });
  }



function makeEaseOut(timing) {
    return function(timeFraction) {
      return 1 - timing(1 - timeFraction);
    }
  }

  function quad(timeFraction) {
    return Math.pow(timeFraction, 2)
  }

  function bounce(timeFraction) {
    for (let a = 0, b = 1; 1; a += b, b /= 2) {
      if (timeFraction >= (7 - 4 * a) / 11) {
        return -Math.pow((11 - 6 * a - 11 * timeFraction) / 4, 2) + Math.pow(b, 2)
      }
    }
  }