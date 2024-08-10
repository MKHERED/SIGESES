function estadoslist() {
    var estados = ["Amazonas", "Anzoátegui",
        "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
        "Cojedes", "Delta Amacuro", "Dependencias Federales",
        "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
        "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
        "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"];
                   
    var ubi = document.getElementById('Estado');
    for (var f = 0; f < 25; f++) {
        var iterado = estados[f];
        
        ubi.insertAdjacentHTML('beforeend', '<option value="' + f + '">'+ iterado + '</option>');
        
    }
}

function estadoslist2(idEstado) {
    var estados = ["Amazonas", "Anzoátegui",
    "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
    "Cojedes", "Delta Amacuro", "Dependencias Federales",
    "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
    "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
    "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"];

    est = estados[idEstado.value]
    
    return est
}

