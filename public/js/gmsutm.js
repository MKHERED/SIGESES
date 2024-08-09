function gmsutm() {
    const checkbox = document.getElementById("gms");

    var longitud = document.getElementById('Long');
    var latitud = document.getElementById('Lat') 

    var longitud1 = document.getElementById("Longitud1");
    var latitud1 = document.getElementById("Latitud1");

    if (checkbox.checked) {

        lista = ['Longitud', 'Longitud1',  'Longitud2', 'Latitud', 'Latitud1', 'Latitud2']
        for (let i = 0; i < lista.length+1; i++) {
            element = lista[i-1];
            var objeto = document.getElementById(element);
            if (objeto) {
                objeto.remove()
            }
        }

        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.00001" style="" id="Longitud" name="longitud" placeholder="Grados" value=""');
        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.1" style="" id="Longitud1" name="longitud1" placeholder="Minutos" required value="">');
        longitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.1"style="" id="Longitud2" name="longitud2" placeholder="Segundos" required value="">');
 
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.00001" style="" id="Latitud" name="latitud" placeholder="Grados" value="">');
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.1" style="" id="Latitud1" name="latitud1" placeholder="Minutos" required value="">');
        latitud.insertAdjacentHTML("beforeend", '<input type="number" class="form-control col-md-3" step="0.1" style="" id="Latitud2" name="latitud2" placeholder="Segundos" required value="">');         
            
    } else if (!(checkbox.checked) && longitud1 && latitud1) {
        lista = ['Longitud', 'Longitud1',  'Longitud2', 'Latitud', 'Latitud1', 'Latitud2']
        for (let i = 0; i < lista.length; i++) {
            element = lista[i];
            var objeto = document.getElementById(element);

            if ((element == lista[0]) || (element == lista[3])) {
                objeto.step = 0.1;
            } else {
                 objeto.remove()
            }
           
        }
        
    }
    
}
console.log("holaaaaaaaa")
