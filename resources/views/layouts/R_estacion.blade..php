<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Estación</title>
</head>

<body>
    <!------------------------------------------------------------------------------------------------ -->
    <nav class="navbar navbar-dark bg-orange text-light navbar-visitas">
        <h4 class="">Visitas</h4> 
        <a class="inicio nueva btn btn-sm"><h6>Nueva</h6> </a>
    </nav>
    <main class="presentacion-main bg-light">
        <form action="" class="form" method="post">
            <div class="row">
                <div class="col-5" style="margin-right: 10px;">
                    <div>
                        <label for="Estación">Estación</label>
                        <input type="text" class="form-control" id="Estacion" placeholder="Donde se hizo la visita" name="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="" name=""> Operativa
                        </label>
                    </div>
                    <div class="form-group ">
                        <label for="Visitantes">Visitantes</label>
                        <input type="text" class="form-control" id="Visitantes" placeholder="¿Quienes Fueron?" name="">
                    </div>
                    <div class="form-group">
                        <label for="Equipos">Equipos</label>
                        <input type="text" class="form-control" id="Equipos" placeholder="¿Que equipo reemplazo?" name="">
                    </div>
                    <div class="form-group">
                        <label for="Seriales">Seriales</label>
                        <input type="text" class="form-control" id="Seriales" placeholder="¿Cuales son los seriales nuevos?" name="">
                    </div>
                    <div class="form-group">
                        <label for="Fecha">Fecha de inicio</label>
                        <input type="date" class="form-control" id="Fecha" name="">
                    </div>
                    <div class="form-group">
                        <label for="Fin">Fecha de finalizacion</label>
                        <input type="date" class="form-control" id="Fin" name="">
                    </div>
                </div>
                <div class="col-5" style="margin-left: 10px;">
                    <div class="form-group">
                        <label for="Imagenes">Primera imagen</label>
                        <input type="file" class="form-control" id="Imagenes"   name="">
                    </div>
                    <div class="form-group">
                        <label for="Imagenes1">Segunda imagen</label>
                        <input type="file" class="form-control" id="Imagenes1"   name="">
                    </div>
                    <div class="form-group">
                        <label for="Imagenes2">Tercera Imagen</label>
                        <input type="file" class="form-control" id="Imagenes2"   name="">
                    </div>
                </div>
                

            </div>
            <br>
            <button class="inicio  btn btn-sm  " type="submit">Guardar</button>
            <p class="mt-5 mb-3 text-muted text-center" style="margin-top: 10px!important;margin-bottom: 10px!important;">Intranet 2022</p>
        </form>
       

    </main>
</body>
</html>