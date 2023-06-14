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
                imgTag.id = ids;                                      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
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
        divImagenes.insertAdjacentHTML('beforeend', '<div class="border p-0" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

    } else {
        //objeto 2
        inputs.insertAdjacentHTML("beforeend", '<input type="file" class="form-control" style="width: max-content" id="imagen'+num+'" name="files'+num+'" onchange="muestraImg(\'muestrasImg'+num+'\', \'imagen'+num+'\', \''+num+'\');">')
        divImagenes.insertAdjacentHTML('beforeend', '<div class="border p-0" style="width:350px; height:225px " id="muestrasImg'+num+'"></div>');

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


    //alert(idspos)
    
}