<script>
    function establecer(valor, objeto){
        objeto = document.getElementById(objeto)
        objeto.value = valor
    }
</script>
<div class="bg-light row m-1 p-0 rounded border shadow">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div class=" p-0 m-0">
            <img src="{{asset('img/logo.png')}}" name="logo.png" align="left" width="141" height="119" border="0"/>
            
        </div>
        <div class="">
            <h4 class="p-2">Hoja de Inspección de Estaciones</h4>
        </div>
        <div></div>
    </div>

    <div class="bg-light col-sm-12 col-md-12">
        <div class="text-center row align-items-center p-1 border">
            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Siglas de la estacion</label>
            </div>
            <div class="col-sm-12 col-md-3">
            @if (isset($visit))
               <input class="form-control form-control-sm col-sm-12 col-md-6" type="text" name="siglas" required readonly value="{{ $estacion->siglas }}">
            @endif               

            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Segmento Satelital</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
				<select class="form-select form-select-sm disabled col-sm-12 col-md-6" name="seg_satelital" id="Segmento" reandoly  style="color: #000000; " >
                    <option value="Funvisis1">Funvisis1</option>
                    <option value="Funvisis2">Funvisis2</option>
                    <option value="Funvisis3">Funvisis3</option>
                    <option value="Funvisis4">Funvisis4</option>
                    <option value="Funvisis5">Funvisis5</option>
                    <option value="Funvisis6">Funvisis6</option>
                    <option value="Funvisis7">Funvisis7</option>
                    <option value="Funvisis8">Funvisis8</option>
                    <option value="Funvisis9">Funvisis9</option>
                    <option value="Funvisis10">Funvisis10</option>

                </select>
				<script>
					function seg(){
						var valor = @json($estacion->seg_satelital);
						var sele = document.getElementById('Segmento');
						sele.value = valor;						
					} 
					seg()

                </script>
				@endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Ubicación de la estación</label>
            </div>
            <div class="col-sm-12 col-md-9">
                @if (isset($visit))
                    <textarea class="form-control col-sm-12 col-md-6" reandoly value="{{$estacion->ubicacion}}" name="ubicacion" id="ubicacion" rows="3" style="max-height: 60px; min-height: 60px" ></textarea>
                    <script>
                        establecer(@json($estacion->ubicacion), 'ubicacion')
                    </script>
                @endif
            </div>

        </div>
        <div class="text-center row align-items-center p-1 border">
            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Estado</label>
            </div>
            <div class="col-sm-12 col-md-3">
                @if (isset($visit))
                    <select type="list" class="disabled form-select form-select-sm col-sm-12 col-md-6" id="Estado" name="estado" style="color: #000000;" required  reandoly onclick="estadoslist()" >
                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                    </script>
                                   
                </select>
                <script>
                    document.onload = estadoslist()
                    establecer(@json($estacion->estado), 'Estado')
                </script>
                @endif
            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Municipio</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
               <input class="form-control form-control-sm col-sm-12 col-md-6"name="municipio" type="text" required reandoly value="{{$estacion->municipio}}">
                @endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Nombres de Operadores de la estación</label>
            </div>
            <div class="col-sm-12 col-md-9">
                @if (isset($visit)) 
                <textarea class="form-control form-control-sm col-sm-12 col-md-6" id="operadores" required name="operadores" style="height: 30px; max-height: 60px">{{$visit->operadores}}</textarea>

                @endif
            </div>
       </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Identificación del custodio</label>
            </div>
            <div class="col-sm-12 col-md-9">
                @if (isset($visit))
                <input class="form-control form-control-sm col-sm-12 col-md-6" name="custodio" id="custodio" require type="text">
                <script>
                    establecer(@json($estacion->custodio), 'custodio')
                </script>
                @endif
            </div>

        </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Telefono de contacto</label>
            </div>
            <div class="col-sm-12 col-md-3">
                @if (isset($visit))
                <!-- pattern="\([0-9]{4}\) [0-9]{3}[ -][0-9]{4}" -->
                <input class="form-control form-control-sm col-sm-12 col-md-6" name="tlf_custodio" id="tlf_custodio" required type="tel"  placeholder="(0400) 000-0000">
                <script>
                    establecer(@json($estacion->tlf_custodio), "tlf_custodio")
                </script>
                @endif
            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Fecha de Inspección</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
                <input id="created_at" class="form-control form-control-sm col-sm-12 col-md-6" name="created_at" required type="date">
                <script src="{{asset('js/gestion.js') }}"></script>
                <script>
                    var fecha = @json($visit->created_at);
                    quita('created_at', fecha)
                    fechaNow('#created_at')
                </script>
               @endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Asignada a Frecuencia</label>
            </div>
            <div class="col-sm-12 col-md-3">
                @if (isset($visit))
                <input class="form-control form-control-sm col-sm-12 col-md-6" type="text" id="afrecuenciaID" name="asig_frecuencia">
                <script>
                    establecer(@json($estacion->asig_frecuencia), 'afrecuenciaID')
                </script>
                @endif
            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Carina N°</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
				<select class="form-select form-select-sm col-sm-12 col-md-6" name="carina" id="carina"  required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <script>
                    establecer(@json($estacion->carina), 'carina')
                </script>
				@endif   
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-sm-12 col-md-12 p-1">
                <b>Equipos Instalados</b> 
            </div>
            <div class="col-4 col-md-2 border p-1">
                Equipo
            </div>
            <div class="col-4 col-md-2 border p-1">
                Marca / Cantidad
            </div>
            <div class="col-4 col-md-2 border p-1">
                Modelo
            </div>
            <div class="col-4 col-md-2 border p-1">
                Serial
            </div>
            <div class="col-4 col-md-2 border p-1">
                Sens. / Hz.
            </div>
            <div class="col-4 col-md-1 border p-1">
                Watts
            </div>
            <div class="col-12 col-md-1 border p-1">
                Instalación
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Transceptor</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
               @if (isset($visit))
				<input placeholder=" Marca / Cantidad" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_marca" type="text" value='{{$visit->transceptor_marca}}  @if ($visit->transceptor_marca == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
               @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_modelo" type="text" placeholder=" Modelo" value='{{$visit->transceptor_modelo}}  @if ($visit->transceptor_modelo == "") &nbsp; @endif'>
				@endif            
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_serial" type="text" placeholder=" Serial" value='{{$visit->transceptor_serial}}  @if ($visit->transceptor_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_fecha" id="transceptor_fecha" type="date" >
                    
                    <script>
                    var fecha = @json($visit->transceptor_fecha);
                    quita('transceptor_fecha', fecha)
                    </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Digitalizador</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
               @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_marca" type="text" placeholder=" Marca / Cantidad" value='{{$visit->digitalizador_marca}}  @if ($visit->digitalizador_marca == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_modelo" type="text" placeholder=" Modelo" value='{{$visit->digitalizador_modelo}}  @if ($visit->digitalizador_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_serial" type="text" placeholder=" Serial" value='{{$visit->digitalizador_serial}}  @if ($visit->digitalizador_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="digitalizador_fecha" name="digitalizador_fecha"  type="date">
                    <script>
                    var fecha = @json($visit->digitalizador_fecha);
                    quita('digitalizador_fecha', fecha)
                    </script>
                @endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Sensor</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input  name="sensor_marca" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Marca / Cantidad" type="text" value='{{$visit->sensor_marca}} @if ($visit->sensor_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input  name="sensor_modelo" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" placeholder=" Modelo" value='{{$visit->sensor_modelo}} @if ($visit->sensor_modelo == "") &nbsp; @endif'>
				@endif
              
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
				<input  name="sensor_serial" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" placeholder=" Serial" value='{{$visit->sensor_serial}} @if ($visit->sensor_serial == "") &nbsp; @endif'> 
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="sensor_sen" type="text" placeholder=" Sensibilidad" value='{{$visit->sensor_sen}} @if ($visit->sensor_sen == "") &nbsp; @endif'>
				@endif
                

            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
               @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="sensor_fecha" name="sensor_fecha" type="date">
                    <script>
                    var fecha = @json($visit->sensor_fecha);
                    quita('sensor_fecha', fecha)
                    </script>
				@endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1" notificacion="(Block U/D Conveter)">
                <b>BUC </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Marca / Cantidad" name="BUC_marca" type="text" value='{{$visit->BUC_marca}} @if ($visit->BUC_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Modelo" name="BUC_modelo" type="text" value='{{$visit->BUC_modelo}} @if ($visit->BUC_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="BUC_serial" type="text" placeholder=" Serial" value='{{$visit->BUC_serial}} @if ($visit->BUC_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="BUC_fecha" id="BUC_fecha" type="date" >
                <script>
                    var fecha = @json($visit->BUC_fecha);
                    quita('BUC_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>LNB </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_marca" type="text" placeholder=" Marca / Cantidad" value='{{$visit->LNB_marca}} @if ($visit->LNB_marca == "") &nbsp; @endif'>
				@endif
               

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_modelo"  type="text" placeholder=" Modelo" value='{{$visit->LNB_modelo}} @if ($visit->LNB_modelo == "") &nbsp; @endif'>
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_serial"  type="text" placeholder=" Serial" value='{{$visit->LNB_serial}} @if ($visit->LNB_serial == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
            @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_fecha" id="LNB_fecha"  type="date" >
                <script>
                    var fecha = @json($visit->LNB_fecha);
                    quita('LNB_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>GPS </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_marca" placeholder=" Marca / Cantidad" type="text" value='{{$visit->antena_gps_marca}} @if ($visit->antena_gps_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_modelo" placeholder=" Modelo" type="text" value='{{$visit->antena_gps_modelo}} @if ($visit->antena_gps_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_serial" type="text" placeholder=" Serial" value='{{$visit->antena_gps_serial}} @if ($visit->antena_gps_serial == "") &nbsp; @endif'>
				@endif
              
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
                <!-- falta rellenar y crear casilla -->
               <!-- <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" placeholder=" Frecuencia"> -->
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="antena_gps_fecha" name="antena_gps_fecha"  type="date" value="">
                <script>
                    var fecha = @json($visit->antena_gps_fecha);
                    quita('antena_gps_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G1</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_marca" type="text" placeholder=" Marca / Cantidad" value='{{$visit->panel_solar_a_marca}} @if ($visit->panel_solar_a_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_modelo" type="text" placeholder=" Modelo" value='{{$visit->panel_solar_a_modelo}} @if ($visit->panel_solar_a_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_serial" placeholder=" Serial" type="text" value='{{$visit->panel_solar_a_serial}} @if ($visit->panel_solar_a_serial == "") &nbsp; @endif'>
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_watts" placeholder=" Watts" type="text" value='{{$visit->panel_solar_a_watts}}  @if ($visit->panel_solar_a_watts == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
            @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="panel_solar_a_fecha" name="panel_solar_a_fecha" type="date">
                <script>
                    var fecha = @json($visit->panel_solar_a_fecha);
                    quita('panel_solar_a_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G2</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_marca" type="text" placeholder=" Marca / Cantidad" value='{{$visit->panel_solar_b_marca}}  @if ($visit->panel_solar_b_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_modelo" placeholder=" Modelo" type="text" value='{{$visit->panel_solar_b_modelo}}  @if ($visit->panel_solar_b_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_serial"  placeholder=" Serial" type="text" value='{{$visit->panel_solar_b_serial}}  @if ($visit->panel_solar_b_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_watts" type="text" placeholder=" Watts" value='{{$visit->panel_solar_b_watts}} @if ($visit->panel_solar_b_watts == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="panel_solar_b_fecha" name="panel_solar_b_fecha" type="date" >
                <script>
                    var fecha = @json($visit->panel_solar_b_fecha);
                    quita('panel_solar_b_fecha', fecha)
                </script>
				@endif

                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G3</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_marca" placeholder=" Marca / Cantidad" type="text" value='{{$visit->panel_solar_c_marca}} @if ($visit->panel_solar_c_marca == "") &nbsp; @endif'>
				@endif
               

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_modelo" placeholder=" Modelo" type="text" value='{{$visit->panel_solar_c_modelo}} @if ($visit->panel_solar_c_modelo == "") &nbsp; @endif'>
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_serial" placeholder=" Serial" type="text" value='{{$visit->panel_solar_c_serial}} @if ($visit->panel_solar_c_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_watts" placeholder=" Watts" type="text" value='{{$visit->panel_solar_c_watts}} @if ($visit->panel_solar_c_watts == "") &nbsp; @endif'>
				@endif
                
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="panel_solar_c_fecha" name="panel_solar_c_fecha" type="date">
                <script>
                    var fecha = @json($visit->panel_solar_c_fecha);
                    quita('panel_solar_c_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G4</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_marca" placeholder=" Marca / Cantidad" type="text" value='{{$visit->panel_solar_d_marca}} @if ($visit->panel_solar_d_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_modelo" placeholder=" Modelo" type="text" value='{{$visit->panel_solar_d_modelo}} @if ($visit->panel_solar_d_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_serial" placeholder=" Serial" type="text" value='{{$visit->panel_solar_d_serial}} @if ($visit->panel_solar_d_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_watts" placeholder=" Watts" type="text" value='{{$visit->panel_solar_d_watts}} @if ($visit->panel_solar_d_watts == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="panel_solar_d_fecha" name="panel_solar_d_fecha" type="date">
                <script>
                    var fecha = @json($visit->panel_solar_d_fecha);
                    quita('panel_solar_d_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G5</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_marca" type="text" placeholder=" Marca / Cantidad" value='{{$visit->panel_solar_e_marca}} @if ($visit->panel_solar_e_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_modelo" placeholder=" Modelo" type="text" value='{{$visit->panel_solar_e_modelo}} @if ($visit->panel_solar_e_modelo == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_serial" placeholder=" Serial" type="text"  value='{{$visit->panel_solar_e_serial}} @if ($visit->panel_solar_e_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_watts" placeholder=" Watts" type="text"  value='{{$visit->panel_solar_e_watts}}  @if ($visit->panel_solar_e_watts == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_fecha" type="date">
                <script>
                    var fecha = @json($visit->panel_solar_e_fecha);
                    quita('panel_solar_e_fecha', fecha)
                </script>
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Banco de Baterias</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_marca" placeholder=" Marca" type="text"  value='{{$visit->banco_baterias_marca}}  @if ($visit->bancao_baterias_marca == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_modelo" placeholder=" Modelo" type="text"  value='{{$visit->banco_baterias_modelo}}  @if ($visit->bancao_baterias_modelo == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_serial" placeholder=" Serial" type="text"  value='{{$visit->banco_baterias_serial}}  @if ($visit->bancao_baterias_serial == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_cantidad" placeholder=" Cantidad"  type="text" value='{{$visit->banco_baterias_cantidad}} @if ($visit->bancao_baterias_cantidad == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_watts" placeholder=" Watts" type="text" value='{{$visit->banco_baterias_watts}} @if ($visit->bancao_baterias_watts == "") &nbsp; @endif'>
				@endif
                
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="banco_baterias_fecha" name="banco_baterias_fecha"  type="date">
                <script>
                    var fecha = @json($visit->banco_baterias_fecha);
                    quita('banco_baterias_fecha', fecha)
                </script>
                @endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Regulador de Voltaje</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_marca" placeholder=" Marca / Cantidad" type="text" value='{{$visit->regulador_voltaje_marca}} @if ($visit->regulador_voltaje_marca == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_modelo" placeholder=" Modelo"  type="text" value='{{$visit->regulador_voltaje_modelo}} @if ($visit->regulador_voltaje_modelo == "") &nbsp; @endif'>
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                 @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_serial" placeholder=" Serial"  type="text" value='{{$visit->regulador_voltaje_serial}} @if ($visit->regulador_voltaje_serial == "") &nbsp; @endif'>
				@endif
            </div>

            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_watts" placeholder=" Watts" type="text" value='{{$visit->regulador_voltaje_watts}} @if ($visit->regulador_voltaje_watts == "") &nbsp; @endif'>
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" id="regulador_voltaje_fecha" name="regulador_voltaje_fecha" type="date" >
                <script>
                    var fecha = @json($visit->regulador_voltaje_fecha);
                    quita('regulador_voltaje_fecha', fecha)
                </script>
                @endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">

            <div class="col-12 col-md-6 border">
                <div class="row">
                    <div class="col-12 p-1 border">
                        <b>Ubicación Geografica</b>
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Latitud
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" name="latitud" reandoly required value="{{$estacion->latitud}}">                               
                        
                        @endif
                        
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Longitud
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" id="Longitud" name="longitud" reandoly required value="{{$estacion->longitud}}">
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="row">
                    <div class="col-12 p-1 border">
                        <b>Angulos de Instalacion</b>
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Azimut
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" name="azimut" reandoly required value="{{$estacion->azimut}}">
                        
                        @endif
                        
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Elevación
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" name="elevacion"  required reandoly value="{{$estacion->elevacion}}">                               
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 border">
                <div class="row">
                    <div class="col-12 p-1 border">
                        <b>Portadora de Operaciones</b>
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Frecuencia
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" required  name="frecuencia" type="text" placeholder="" value="{{$estacion->frecuencia}}">
                        @endif
                    </div>
                    <div class="col-6 col-md-2 p-1 border" notificacion="Medidos en analizador">
                        Nivel
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" required name="nivel" type="text" placeholder="" value="{{$estacion->nivel}}">
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center row p-1 ">
            <div class="col-12 col-md-12 col-lg-6 border p-0 ">
                Trabajo Realizado
                <div class="">
                    @if (isset($visit))
                    <textarea class="form-control rounded-0" name="trabajo" id="" style="max-height: 300px; min-height: 300px; height: 300px">{{$visit->trabajo}}</textarea>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 border p-0 " style="height:325px">
                <div class="border-bottom">
                    <span class="">Imagen</span>
                </div>
                
                <div>
                <!-- !(isset($link_docs)) &&  -->
                @if (isset($visit))
                    <input class="form-control form-control-sm rounded-0" type="file" id="imagen0" name="imagen_n" onchange="muestraImg('muestrasImg', 'imagen0', '0');" value="@if(isset($link_docs)){{asset('storage').'/'.$link_docs->direccion}} @endif " >
                @else

                @endif
                </div>
                <!--style>
                    #muestrasImg {
                        height: calc(100% - 270px);
                    }


                    img {
                        object-fit: contain;
                    }
                </style-->
                <style>
                    div img[id="0"] {
                        height: 260px;
                        max-width: 570px;
                    }
                </style>
                @if (isset($link_docs))
                    <img class="mt-1 mb-1 rounded" src="{{asset('storage').'/'.$link_docs->direccion}}" height="260px">
                
                    <div class="position-relative p-1" style="/*height:270px*/ min-height:260px; max-height:260px" id="muestrasImg">
                       <span class="text-center text-light fw-bold position-absolute top-50 start-50 translate-middle border border-1 border-light rounded p-1">Vista previa</span>
                    </div>

                <script src="{{asset('js/gestion.js') }}"></script>

                
                @endif
	
            </div>
        </div>
        

    </div>
</div>