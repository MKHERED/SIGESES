<script>
    function establecer(valor, objeto){
        objeto = document.getElementById(objeto)
        objeto.value = valor
    }
</script>
<style>
    input[name] {
        background: green;
    }
    input[style] {
        background: black;
    }

</style>
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
            <div class="border rounded">
                {{$visit->siglas}}
            </div>
					
			@else
               <input class="form-control form-control-sm col-sm-12 col-md-6" type="text" name="siglas" required readonly value="{{ $estacion->siglas }}">
            @endif               

            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Segmento Satelital</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
                <div class="border rounded">
				    {{$visit->seg_satelital}}
                </div>
				@else
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
                <div class="border rounded">
					{{$visit->ubicacion}}
                </div>
				@else
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
                <div class="border rounded">
					{{$visit->estado}}
                </div>   
				@else
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
                <div class="border rounded">
					{{$visit->municipio}}
                </div>
			    @else
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
                <div class="border rounded">
                {{$visit->operadores}}
                </div>
				@else 
                <textarea class="form-control form-control-sm col-sm-12 col-md-6" id="operadores" required name="operadores" style="height: 30px; max-height: 60px"></textarea>

                @endif
            </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Identificación del custodio</label>
            </div>
            <div class="col-sm-12 col-md-9">
                @if (isset($visit))
                <div class="border rounded">
					{{$visit->custodio}}
                </div>
				@else
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
                <div class="border rounded">
					{{$visit->tlf_custodio}}
                </div>
				@else
                <!-- pattern="\([0-9]{4}\) [0-9]{3}[ -][0-9]{4}" -->
                <input class="form-control form-control-sm col-sm-12 col-md-6" name="tlf_custodio" id="tlf_custodio" required type="tel"  placeholder="(0400) 000-0000">
                <script>
                    establecer(@json($estacion->tlf_custodio), "tlf_custodio")
                </script>
                @endif
            </div>
            <div class="col-sm-12 col-md-2 ">
                <label class="form-label" for="">Fecha de Instalación</label>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (isset($visit))
                <div class="border rounded">
					{{$visit->created_at}}
                </div>
				@else
                <input class="form-control form-control-sm col-sm-12 col-md-6" name="created_at" required type="date">
               @endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border">

            <div class="col-sm-12 col-md-3 ">
                <label class="form-label" for="">Asignada a Frecuencia</label>
            </div>
            <div class="col-sm-12 col-md-3">
                @if (isset($visit))
                <div class="border rounded">
					{{$visit->asig_frecuencia}}
                </div>
				@else
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
                <div class="border rounded">
					{{$visit->carina}}
                </div>
				@else
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
                    <div class="p-1">
					{{$visit->transceptor_marca}}
                    </div>
				@else
				<input placeholder=" Marca / Cantidad" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_marca" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
               @if (isset($visit))
                    <div class="p-1">
					{{$visit->transceptor_modelo}}
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_modelo" type="text" value="" placeholder=" Modelo">
				@endif            
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->transceptor_serial}}
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_serial" type="text" value="" placeholder=" Serial">
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
                    <div class="p-1">
					{{$visit->transceptor_fecha}} @if ($visit->transceptor_fecha == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="transceptor_fecha"  type="date" value="">
					
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Digitalizador</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
               @if (isset($visit))
                    <div class="p-1">
					{{$visit->digitalizador_marca}} @if ($visit->digitalizador_marca == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_marca" type="text" placeholder=" Marca / Cantidad">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->digitalizador_modelo}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_modelo" type="text" value="" placeholder=" Modelo">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->digitalizador_serial}} @if ($visit->digitalizador_serial == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_serial" type="text" placeholder=" Serial">
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
                    <div class="p-1">
					{{$visit->digitalizador_fecha}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="digitalizador_fecha"  type="date" value="">
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Sensor</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->sensor_marca}}
                    </div>
				@else
				<input  name="sensor_marca" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Marca / Cantidad" type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->sensor_modelo}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input  name="sensor_modelo" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" value="" placeholder=" Modelo">
				@endif
              
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
                    <div class="p-1">
					{{$visit->sensor_serial}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
				<input  name="sensor_serial" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" value="" placeholder=" Serial">
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
                    <div class="p-1">
				    {{$visit->sensor_sen}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="sensor_sen" type="text" value="" placeholder=" Sensibilidad">
				@endif
                

            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
               @if (isset($visit))
                    <div class="p-1">
					{{$visit->sensor_fecha}} @if ($visit->digitalizador_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="sensor_fecha" type="date" value="">

				@endif
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1" notificacion="(Block U/D Conveter)">
                <b>BUC </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->BUC_marca}} @if ($visit->BUC_marca == "") &nbsp; @endif      
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Marca / Cantidad" name="BUC_marca" type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->BUC_modelo}} @if ($visit->BUC_modelo == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" placeholder=" Modelo" name="BUC_modelo" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
				    {{$visit->BUC_serial}} ($visit->BUC_serial == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="BUC_serial" type="text" value="" placeholder=" Serial">
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
                    <div class="p-1">
					{{$visit->BUC_fecha}} @if ($visit->BUC_fecha == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="BUC_fecha" type="date" value="">
				
				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>LNB </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->LNB_marca}} @if ($visit->LNB_marca == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_marca" type="text" value="" placeholder=" Marca / Cantidad">
				@endif
               

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->LNB_modelo}} @if ($visit->LNB_modelo == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_modelo"  type="text" value="" placeholder=" Modelo">
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1"> 
					{{$visit->LNB_serial}} @if ($visit->LNB_serial == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_serial"  type="text" value="" placeholder=" Serial">
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
                    <div class="p-1">
					{{$visit->LNB_fecha}} ($visit->LNB_fecha == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="LNB_fecha"  type="date" value="" placeholder=" 00/00/0000">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>GPS </b>
            </div>
            <div class="col-4 col-md-2 border p-0">
            @if (isset($visit))
                    <div class="p-1">
					{{$visit->antena_gps_marca}} ($visit->antena_gps_marca == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_marca" placeholder=" Marca / Cantidad" type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->antena_gps_modelo}} ($visit->antena_gps_modelo == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_modelo" placeholder=" Modelo" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->antena_gps_serial}} ($visit->antena_gps_serial == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_serial" type="text" value="" placeholder=" Serial">
				@endif
              
            </div>
            <div class="col-4 col-md-2 border p-0">
                falta rellenar y crear casilla
               <!-- <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" type="text" placeholder=" Frecuencia"> -->
            </div>
            <div class="col-4 col-md-1 border p-1">
                &nbsp;
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->antena_gps_fecha}} ($visit->antena_gps_fecha == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="antena_gps_fecha"  type="date" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G1</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_a_marca}} ($visit->panel_solar_a_marca == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_marca" type="text" value="" placeholder=" Marca / Cantidad">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_a_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_modelo" type="text" value="" placeholder=" Modelo">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_a_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_serial" placeholder=" Serial" type="text" value="">
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_a_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_watts" placeholder=" Watts" type="text" value="">
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
            @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_a_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_a_fecha" type="date" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G2</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_b_marca}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_marca" type="text" value="" placeholder=" Marca / Cantidad">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_b_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_modelo" placeholder=" Modelo" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_b_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_serial"  placeholder=" Serial" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_b_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_watts" type="text" value="" placeholder=" Watts">
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_b_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0"  name="panel_solar_b_fecha" type="date" value="">

				@endif

                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G3</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_c_marca}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_marca" placeholder=" Marca / Cantidad" type="text" value="">
				@endif
               

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_c_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_modelo" placeholder=" Modelo" type="text" value="">
				@endif
               
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_c_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_serial" placeholder=" Serial" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_c_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_watts" placeholder=" Watts" type="text" value="">
				@endif
                
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_c_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_c_fecha" type="date" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G4</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_d_marca}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_marca" placeholder=" Marca / Cantidad" type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_d_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_modelo" placeholder=" Modelo" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_d_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_serial" placeholder=" Serial" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_d_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_watts" placeholder=" Watts" type="text" value="">
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_d_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_d_fecha" type="date" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Modulo Solar G5</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_e_marca}}
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_marca" type="text" value="" placeholder=" Marca / Cantidad">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_e_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_modelo" placeholder=" Modelo" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_e_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_serial" placeholder=" Serial" type="text"  value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_e_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_watts" placeholder=" Watts" type="text"  value="">
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->panel_solar_e_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="panel_solar_e_fecha" type="date" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Banco de Baterias</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_marca}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_marca" placeholder=" Marca" type="text"  value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_modelo" placeholder=" Modelo" type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_serial" placeholder=" Serial" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_cantidad}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_cantidad" placeholder=" Cantidad"  type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_watts" placeholder=" Watts" type="text" value="">
				@endif
                
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->banco_baterias_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="banco_baterias_fecha"  type="date" name="" id="" value="">

				@endif
                
            </div>
        </div>
        <div class="text-center row align-items-center p-1 border ">
            <div class="col-4 col-md-2 border p-1">
                <b>Regulador de Voltaje</b>
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->regulador_voltaje_marca}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
					<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_marca" placeholder=" Marca / Cantidad" type="text" value="">
				@endif
            </div>
            <div class="col-4 col-md-2 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->regulador_voltaje_modelo}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_modelo" placeholder=" Modelo"  type="text" value="">
				@endif

            </div>
            <div class="col-4 col-md-2 border p-0">
                 @if (isset($visit))
                    <div class="p-1">
					{{$visit->regulador_voltaje_serial}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_serial" placeholder=" Serial"  type="text" value="">
				@endif
            </div>

            <div class="col-4 col-md-2 border p-1">
                &nbsp;
            </div>
            <div class="col-4 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->regulador_voltaje_watts}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_watts" placeholder=" Watts" type="text" value="">
				@endif
            </div>
            <div class="col-12 col-md-1 border p-0">
                @if (isset($visit))
                    <div class="p-1">
					{{$visit->regulador_voltaje_fecha}} ($visit-> == "") &nbsp; @endif
                    </div>
				@else
				<input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" name="regulador_voltaje_fecha" type="date" name="" id="" value="">

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
                            {{$visit->latitud}}
                        @else
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" name="latitud" reandoly required value="{{$estacion->latitud}}">                               
                        
                        @endif
                        
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Longitud
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                            {{$visit->longitud}}
                        @else
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
                            {{$visit->azimut}}
                        @else
                        <input type="text" class="form-control form-control-sm rounded-0 border-1 p-0 m-0" step="any" name="azimut" reandoly required value="{{$estacion->azimut}}">
                        
                        @endif
                        
                    </div>
                    <div class="col-6 col-md-2 p-1 border">
                        Elevación
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                            {{$visit->elevacion}}
                        @else
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
                        {{$visit->frecuencia}}
                        @else
                        <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" required  name="frecuencia" type="text" placeholder="" value="{{$estacion->frecuencia}}">
                        @endif
                    </div>
                    <div class="col-6 col-md-2 p-1 border" notificacion="Medidos en analizador">
                        Nivel
                    </div>
                    <div class="col-6 col-md-4 p-0">
                        @if (isset($visit))
                        {{$visit->nivel}}
                        @else 
                        <input class="form-control form-control-sm rounded-0 border-1 p-0 m-0" required name="nivel" type="text" placeholder="" value="{{$estacion->nivel}}">
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center row p-1 ">
            <div class="col-12 col-md-6 border p-0 ">
                Trabajo Realizado
                <div>
                    @if (isset($visit))
                        {{$visit->trabajo}}
                    @else
                    <textarea class="form-control rounded-0" name="trabajo" id="" style="max-height: 300px; min-height: 300px; height: 300px"></textarea>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 border p-0 " style="height:325px">
                imagen
                <div>
                    <input class="form-control form-control-sm rounded-0" type="file" placeholder="">
                </div>
                <div class=" bg-success" style="height:270px">
                    <span>Vista previa</span>
                </div>
            </div>
        </div>
        

    </div>
</div>
