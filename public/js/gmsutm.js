
function gmsutm() {                            
    var gms = document.getElementById("gms");

    var longitud = document.getElementById('Long');
    var latitud = document.getElementById('Lat') 

    var longitu = document.getElementById("Longitud");
    var latitu = document.getElementById("Latitud");
    longitu.remove();
    latitu.remove();  
    
    longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" placeholder="Longitud de la estación" style="width: 300px" id="Longitud" name="longitud" value="">');
    latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" placeholder="Latitud de la estación" style="width: 300px" id="Latitud" name="latitud" value="">');
    if (gms.checked) {
        var longitu = document.getElementById("Longitud");
        var latitu = document.getElementById("Latitud");
        longitu.remove();
        latitu.remove();  

        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Longitud" name="longitud" value="">');
        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Longitud1" name="longitud1" value="">');
        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Longitud2" name="longitud2" value="">');
        
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Latitud" name="latitud" value="">');
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Latitud1" name="latitud1" value="">');
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" style="width: 100px" id="Latitud2" name="latitud2" value="">');         
    } else {
        var longitud1 = document.getElementById("Longitud1");
        var latitud1 = document.getElementById("Latitud1");
        longitud1.remove();
        latitud1.remove();
        var longitud2 = document.getElementById("Longitud2");
        var latitud2 = document.getElementById("Latitud2");
        longitud2.remove();
        latitud2.remove(); 
        var longitu = document.getElementById("Longitud");
        var latitu = document.getElementById("Latitud");
        longitu.remove();
        latitu.remove();  

        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" placeholder="Longitud de la estación" style="width: 300px" id="Longitud" name="longitud" value="">');
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control" placeholder="Latitud de la estación" style="width: 300px" id="Latitud" name="latitud" value="">');
    }


   



}

gmsutm()

               