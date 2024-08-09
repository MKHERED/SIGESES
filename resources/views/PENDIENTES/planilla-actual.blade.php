<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 7.3.7.2 (Linux)"/>
	<meta name="author" content="Mike Lionard Jesús Naranjo Heredia"/>
	<meta name="created" content="2023-09-19T16:23:12.623739148"/>
	<meta name="changedby" content="Mike Lionard Jesús Naranjo Heredia"/>
	<meta name="changed" content="2023-09-19T17:20:25.964590765"/>
	
	<style type="text/css">
		@page { size: 21.59cm 27.94cm; margin: 2cm }
		p { line-height: 115%; margin-bottom: 0.25cm; background: transparent }
		td p { line-height: 100%; text-align: center; orphans: 0; widows: 0; background: transparent }
		td p.western { font-family: "Arial", sans-serif; font-size: 7pt }
		td p.cjk { font-size: 7pt }
		td p.ctl { font-size: 7pt }

		.container {
			/* height: 100vh; */
			width: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			
		}
		.content {
			height: auto;
			width: auto;
			padding-left: 5%;
			padding-bottom: 5%;
			padding-right: 5%;
			padding-top: 0px;

		}

	</style>

	
</head>
<div  class="container" lang="es-VE" link="#000080" vlink="#800000" dir="ltr">
	<div class="content">
		<div class="row col-12">
			<div class="col-sm-4">
				<img src="{{asset('img/logo.png')}}" name="logo.png" align="left" width="141" height="119" border="0"/>
				<br>
			</div>
			<div class="col-sm-6" style="text-align: start;">
				<p>Inspección de la Estación remota</p>
			</div>
			@if (isset($visit))
			<div class="col-sm-2">
				<a href="#" style="text-decoration: none;">Imprimir</a>
			</div>
			@else
			@endif
		</div>

				

<table  width="705" cellpadding="2" cellspacing="0" style="page-break-after: auto">
	<colgroup>
		<col width="150"/>

	</colgroup>
	<colgroup>
		<col width="111"/>

	</colgroup>
	<colgroup>
		<col width="97"/>

	</colgroup>
	<colgroup>
		<col width="95"/>

	</colgroup>
	<colgroup>
		<col width="88"/>

		<col width="60"/>

	</colgroup>
	<colgroup>
		<col width="75"/>

	</colgroup>
	<tr>
		<td colspan="7" style="border: 1.00pt solid #000000;">
			<p class="m-0"><font face='Arial, sans-serif' size='1' style="font-size: 7pt;">Hoja de Inspecciòn de Estaciones</font></p>
			
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
		<p class="m-0" align="center">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Siglas de la Estación</font></font>
		</p>
		</td>
		<td colspan="6" width="546" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->siglas}}
				@else
               	 <input type="text" class="border-0" style="width: 100%;  color: #000000;" name="siglas" required readonly value="{{ $estacion->siglas }}">
				
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p align="center" class="m-0">
				<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Segmento Satelital</font></font>
			</p>
		</td>
		<td width="111"  class="m-0" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->seg_satelital}}
				@else
				<select class="border-0 disabled" name="seg_satelital" id="Segmento" reandoly  style="color: #000000; " >
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
			</p>
		</td>
		<td colspan="5"   class="m-0" width="431" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p class="m-0" align="center">
				<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Ubicación de la Instalación</font></font>
			</p>
		</td>
		<td colspan="6" width="546" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->ubicacion}}
				@else
					<input class="border-0" style="width: 100%;  color: #000000;"  placeholder="Ubicacion de la estación" name="ubicacion" reandoly  type="text" value="{{$estacion->ubicacion}}">
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
		<p class="m-0" align="center">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Estado</font></font></p>
		</td>
		<td width="111">
			<p class="m-0 p-0 text-start">
				<font style="font-size: 8pt;">		
				@if (isset($visit))
					{{$visit->estado}}
				@else
				<select type="list" class="border-0 disabled" id="Estado" name="estado" style="color: #000000;" required  reandoly onclick="estadoslist()" >
                    <script src="{{asset('js/estadoslist.js') }}">
                                       
                    </script>
                                   
                </select>
				<script>
					document.onload= estadoslist();
                    var select = document.getElementById('Estado');
                    valor = @json($estacion->estado);
                    select.value = valor;
				</script> 
				@endif
				</font>
			</p>
		</td>
		<td width="97" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p class="m-0  align="center">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Municipio</font></font></p>
		</td>
		<td colspan="4" width="330" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">		
				@if (isset($visit))
					{{$visit->municipio}}
				@else
					<input class="border-0" style="width: 100%; color:#000000;" name="municipio" type="text" required reandoly value="{{$estacion->municipio}}">
					
					<!-- hacer una lista dependiente del estado -->
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="27" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p class="m-0" align="center">
				<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Nombre de Operadores de estación</font></font></p>
		</td>
		<td colspan="6" width="546" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">
				@if (isset($visit)) {{$visit->operadores}} 
				@else 
				<textarea class="border-0 text-start" id="" required name="operadores" style="width: 100%; height: 100%; color:#000000;"></textarea>				
				@endif

			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p class="m-0" align="center">
				<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Identificación del custodio</font></font>
			</p>
		</td>
		<td colspan="6" width="546" style="border: 1.00pt solid #000000;">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->custodio}}
				@else
				<input class="border-0"  name="custodio" style="width: 100%; color:#000000" required type="text">				
					
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150"  bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
		<p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; background: transparent">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Cel Contacto Custodio</font></font></p>
		</td>
		<td colspan="2" width="212" style="border: 1.00pt solid #000000; padding: 0.05cm">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->tlf_custodio}}
				@else
				<input class="border-0"  name="tlf_custodio" style="width: 100%; color:#000000;" required type="tel" value="" pattern="\([0-9]{4}\) [0-9]{3}[ -][0-9]{4}" placeholder="(0400) 000-0000">
				@endif
			</p>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm">
			<p class="m-0" align="center" style="orphans: 0; widows: 0; margin-top: 0.01cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Fecha de Instalación</font></font>
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; color:#000000">
			<p class="m-0">
				@if (isset($visit))
					{{$visit->created_at}}
				@else
				<input class="small border-0" name="created_at" style="width: 100%; height:100%; color:#000000;" required type="date" id="" value="">

				@endif
			</p>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm">
			<p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.1cm; margin-right: 0.1cm; background: transparent">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Asignada a Frecuencia</font></font></p>
		</td>
		<td colspan="2" width="212" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<p class="m-0">
				@if (isset($visit))
					{{$visit->asig_frecuencia}}
				@else
				<input class="border-0" id="afrecuenciaID" name="asig_frecuencia" style="width: 100%; height:100%; color:#000000" required type="text" value="">
				<script>
					function afrec(){
						var valor = @json($estacion->asig_frecuencia);
						var fre = document.getElementById('afrecuenciaID');
						fre.value = valor;						
					}
					afrec()
			</script>
				@endif
			</p>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.2cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Carina №</font></font></p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
			<p class="m-0 text-start">
				@if (isset($visit))
					{{$visit->carina}}
				@else
				<select class="border-0" name="carina" id="carina"  required value="{{old('carina')}}">
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
				@endif
			</p>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" >
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt"> <i>Equipos Instalados</i></i></font></font></p>
		</td>
		<td width="111" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.88cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">MARCA</font></font></p>
		</td>
		<td width="97" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.71cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">MODELO</font></font></p>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.5cm; background: transparent">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">SERIAL</font></font></p>
		</td>
		<td width="88" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
		<p class="m-0 small" align="center" style="font-size: 10px;">
			Fecha de Inspección / Sustitución
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Transceptor</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->transceptor_marca}}
				@else
				<input class="border-0" name="transceptor_marca" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->transceptor_modelo}}
				@else
				<input class="border-0" name="transceptor_modelo" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->transceptor_serial}}
				@else
				<input class="border-0" name="transceptor_serial" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->transceptor_fecha}}
				@else
					<input class="small border-0" name="transceptor_fecha"  style="width: 100%; height:100%; color:#000000;" type="date" value="">
					
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Digitalizador</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
			<p class="m-0">
				@if (isset($visit))
					{{$visit->digitalizador_marca}}
				@else
					<input class="border-0" name="digitalizador_marca" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->digitalizador_modelo}}
				@else
					<input class="border-0" name="digitalizador_modelo" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->digitalizador_serial}}
				@else
				<input class="border-0" name="digitalizador_serial" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->digitalizador_fecha}}
				@else
					<input class="small border-0" name="digitalizador_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Sensor</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->sensor_marca}}
				@else
				<input  name="sensor_marca" class="border-0" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->sensor_modelo}}
				@else
					<input  name="sensor_modelo" class="border-0" style="width: 100%; height:100% ;color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->sensor_serial}}
				@else
				<input  name="sensor_serial" class="border-0" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" bgcolor="#e6e6e6" style="background: #e6e6e6; border-top: 1.00pt solid #000000; border: 1.00pt solid #000000;"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-top: 0.21cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">SENSIBILIDAD&gt;&gt;&gt;</font></font></p>
		</td>
		<td width="60" style="border-top: 1.00pt solid #000000; border-bottom: 1.00pt solid #000000; border-left: none; border-right: 1.00pt solid #000000; padding-top: 0.05cm; padding-bottom: 0.05cm; padding-left: 0cm; padding-right: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
				{{$visit->sensor_sen}}
				@else
					<input class="border-0"  name="sensor_sen" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->sensor_fecha}}
				@else
					<input class="small border-0"  name="sensor_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">BUC (Block U/D Converter)</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
			<p class="m-0">
				@if (isset($visit))
					{{$visit->BUC_marca}}
				@else
				<input class="border-0"  name="BUC_marca" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->BUC_modelo}}
				@else
				<input class="border-0"  name="BUC_modelo" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
				{{$visit->BUC_serial}}
				@else
				<input class="border-0"  name="BUC_serial" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->BUC_fecha}}
				@else
				<input class="small border-0" name="BUC_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">
				
				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="75" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">LNB</font></font></p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->LNB_marca}}
				@else
				<input class="border-0"  name="LNB_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->LNB_modelo}}
				@else
				<input class="border-0"  name="LNB_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->LNB_serial}}
				@else
				<input class="border-0"  name="LNB_serial" style="width: 100%; height:100%; color:#000000" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->LNB_fecha}}
				@else
				<input class="small border-0"  name="LNB_fecha"  style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="14" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Antena<span style="letter-spacing: 0.1pt">
			</span>GPS</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->antena_gps_marca}}
				@else
					<input class="border-0"  name="antena_gps_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->antena_gps_modelo}}
				@else
					<input class="border-0"  name="antena_gps_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->antena_gps_serial}}
				@else
				<input class="border-0"  name="antena_gps_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm, color:#000000">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->antena_gps_fecha}}
				@else
				<input class="small border-0"  name="antena_gps_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="14" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="111" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.88cm; margin-top: 0.01cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">MARCA</font></font></p>
		</td>
		<td width="97" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.71cm; margin-top: 0.01cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">MODELO</font></font></p>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.8cm; margin-right: 0.7cm; margin-top: 0.01cm; background: transparent">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">SERIAL</font></font></p>
		</td>
		<td width="88" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-right: 0.03cm; margin-top: 0.01cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">WattS</font></font></p>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top" style="color:#000000">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Módulo
			Solar</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_a_marca}}
				@else
				<input class="border-0" name="panel_solar_a_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_a_modelo}}
				@else
				<input class="border-0" name="panel_solar_a_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_a_serial}}
				@else
				<input class="border-0" name="panel_solar_a_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_a_watts}}
				@else
				<input class="border-0" name="panel_solar_a_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_a_fecha}}
				@else
				<input class="small border-0" name="panel_solar_a_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Módulo
			Solar</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_b_marca}}
				@else
				<input class="border-0"  name="panel_solar_b_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_b_modelo}}
				@else
					<input class="border-0"  name="panel_solar_b_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_b_serial}}
				@else
				<input class="border-0"  name="panel_solar_b_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_b_watts}}
				@else
					<input class="border-0"  name="panel_solar_b_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_b_fecha}}
				@else
				<input class="small border-0"  name="panel_solar_b_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Módulo
			Solar</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_c_marca}}
				@else
				<input class="border-0" name="panel_solar_c_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_c_modelo}}
				@else
					<input class="border-0" name="panel_solar_c_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_c_serial}}
				@else
				<input class="border-0" name="panel_solar_c_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_c_watts}}
				@else
					<input class="border-0" name="panel_solar_c_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_c_fecha}}
				@else
				<input class="small border-0" name="panel_solar_c_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Módulo
			Solar</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_d_marca}}
				@else
					<input class="border-0" name="panel_solar_d_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_d_modelo}}
				@else
				<input class="border-0" name="panel_solar_d_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_d_serial}}
				@else
				<input class="border-0" name="panel_solar_d_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_d_watts}}
				@else
				<input class="border-0" name="panel_solar_d_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_d_fecha}}
				@else
				<input class="small border-0" name="panel_solar_d_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Módulo
			Solar</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_e_marca}}
				@else
				<input class="border-0" name="panel_solar_e_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_e_modelo}}
				@else
				<input class="border-0" name="panel_solar_e_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_e_serial}}
				@else
				<input class="border-0" name="panel_solar_e_serial" style="width: 100%; height:100%" type="text"  value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_e_watts}}
				@else
				<input class="border-0" name="panel_solar_e_watts" style="width: 100%; height:100%" type="text"  value="">
				@endif
			</p>
		</td>
		</td>
		<td class="m-0 p-0" style="background: #e6e6e6;border: 1.00pt solid #000000;">
			<font face="Arial, sans-serif"><font style="font-size: 7pt">Cantidad</font></font>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->panel_solar_e_fecha}}
				@else
				<input class="small border-0" name="panel_solar_e_fecha" style="width: 100%; height:100%; color:#000000;" type="date" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="11" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Banco<span style="letter-spacing: -0.1pt">
			</span>de<span style="letter-spacing: 0.2pt"> </span>Baterias</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->banco_baterias_marca}}
				@else
					<input class="border-0" name="banco_baterias_marca" style="width: 100%; height:100%" type="text"  value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->banco_baterias_modelo}}
				@else
				<input class="border-0" name="banco_baterias_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->banco_baterias_serial}}
				@else
				<input class="border-0" name="banco_baterias_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->banco_baterias_watts}}
				@else
				<input class="border-0" name="banco_baterias_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0" style="orphans: 0; widows: 0">
				@if (isset($visit))
					{{$visit->banco_baterias_cantidad}}
				@else
				<input class="border-0" name="banco_baterias_cantidad" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->banco_baterias_fecha}}
				@else
				<input class="small border-0" name="banco_baterias_fecha" style="width: 100%; height:100%; color:#000000;" type="date" name="" id="" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="11" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Regulador<span style="letter-spacing: -0.1pt">
			</span>de voltaje</font></font></p>
		</td>
		<td width="111" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->regulador_voltaje_marca}}
				@else
					<input class="border-0" name="regulador_voltaje_marca" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->regulador_voltaje_modelo}}
				@else
				<input class="border-0" name="regulador_voltaje_modelo" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="95" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->regulador_voltaje_serial}}
				@else
				<input class="border-0" name="regulador_voltaje_serial" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->regulador_voltaje_watts}}
				@else
				<input class="border-0" name="regulador_voltaje_watts" style="width: 100%; height:100%" type="text" value="">
				@endif
			</p>
		</td>
		</td>
		<td width="60" style="border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br>
			</p>
		</td>
		<td width="75" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->regulador_voltaje_fecha}}
				@else
				<input class="small border-0" name="regulador_voltaje_fecha" style="width: 100%; height:100%; color:#000000;" type="date" name="" id="" value="">

				@endif
			</p>
		</td>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Ubicación
			Geográfica<span style="letter-spacing: 0.1pt"> </span>Remota</font></font></p>
		</td>
		<td width="111" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Latitud</font></font></p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->latitud}}
				@else
                <input type="text" class="border-0" step="any" style="width: 100%; height:100%; color:#000000" name="latitud" reandoly required value="{{$estacion->latitud}}">                               
				
				@endif
			</p>
		</td>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Longitud</font></font></p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
				@if (isset($visit))
					{{$visit->longitud}}
				@else
                <input type="text" class="border-0" step="any" style="width: 100%; height:100%; color:#000000" id="Longitud" name="longitud" reandoly required value="{{$estacion->longitud}}">                               
				@endif
			</p>
		</td>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="50" height="15" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Angulos de instalación</font></font></p>
		</td>
		<td width="50" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Azimut</font></font></p>
		</td>
		<td width="50" style="border: 1.00pt solid #000000;">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->azimut}}
				@else
                <input type="text" class="border-0" step="any" style="width: 100%; height:100%; color:#000000" name="azimut" reandoly required value="{{$estacion->azimut}}">                               
				
				@endif
			</p>
		</td>
		</td>
		<td width="50" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;">
			<p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm; margin-top: 0.19cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Elevación</font></font></p>
		</td>
		<td width="50" style="border: 1.00pt solid #000000;"><p class="m-0" align="center" style="orphans: 0; widows: 0">
		<p class="m-0">
				@if (isset($visit))
					{{$visit->elevacion}}
				@else
                <input type="text" class="border-0" step="any" style="width: 100%; height:100%; color:#000000" name="elevacion"  required reandoly value="{{$estacion->elevacion}}">                               
				
				@endif
			</p>
		</td>
		</td>
		<td width="50" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;"><p class="m-0" align="center" style="orphans: 0; widows: 0">

		</td>
		<td width="50" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000;"><p class="m-0" align="center" style="orphans: 0; widows: 0">

		</td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr valign="top">
		<td width="150" height="1" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Portadora
			de Operación</font></font></p>
		</td>
		<td width="111" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Frecuencia</font></font></p>
		</td>
		<td width="97" style="border: 1.00pt solid #000000; padding: 0.05cm">		
		<p class="m-0">
			@if (isset($visit))
			{{$visit->frecuencia}}
			@else
			<textarea class="border-0" name="frecuencia" id="frecuenciaID" style="width: 100%; height:100%" required type="text" ></textarea>
			<script>
					function frec(){
						var valor = @json($estacion->frecuencia);
						var fre = document.getElementById('frecuenciaID');
						fre.value = valor;						
					} 
					frec()
			</script>
			@endif

			</p>
		</td>
		</td>
		<td width="95" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p lang="es-ES" class="m-0" align="center" style="orphans: 0; widows: 0; margin-left: 0.06cm">
			<font face="Arial, sans-serif"><font size="1" style="font-size: 7pt">Nivel (Medidos en analizador)</font></font></p>
		</td>
		<td width="88" style="border: 1.00pt solid #000000; padding: 0.05cm">
		<p class="m-0">
			@if (isset($visit))
			{{$visit->nivel}}
			@else 
				<textarea class="border-0" name="nivel" id="nivelID" style="width: 100%; height:100%" type="text" required></textarea>
				<script>
					function niv(){
						var valor = @json($estacion->nivel);
						var nivel = document.getElementById('nivelID');
						nivel.value = valor;						
					} 
					niv()
			</script>
			@endif
			</p>
		</td>
		</td>
		<td width="60" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0">
			<br/>

			</p>
		</td>
		<td width="75" bgcolor="#e6e6e6" style="background: #e6e6e6; border: 1.00pt solid #000000; padding: 0.05cm"><p class="m-0" align="center" style="orphans: 0; widows: 0">
			<br/>

			</p>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="border: 1.00pt solid #000000;">
			<p class="m-0"><font face='Arial, sans-serif' size='1' style="font-size: 7pt;">Trabajo realizado</font></p>
			
		</td>
		<td colspan="5" width="auto" style="border: 1.00pt solid #000000;">
			@if (isset($visit))
				<p class="m-0 p-0"><font face='Arial, sans-serif' size='1' style="font-size: 7pt;">Foto</font></p>
			@else
				<input type="file" class="small" id="imagen0" name="imagen_n" required onclick="tamano()" onchange="muestraImg('muestrasImg', 'imagen0', '0');">
			@endif
            
		</td>	
	</tr>
	<tr>
		<td colspan="2" style="border: 1.00pt solid #000000;">
			@if (isset($visit))
				<p class="m-0 p-1"><font face='Arial, sans-serif' size='1' style="font-size: 7pt;">{{$visit->trabajo}}</font></p>
			@else
				<textarea name="trabajo" id="" style="max-width: 500px; width: 100%;"></textarea>
			@endif
		</td>
		<td colspan="5" style="border: 1.00pt solid #000000;">
			@if (isset($link_docs))
				<img class="mt-1 mb-1 rounded" src="{{asset('storage').'/'.$link_docs->direccion}}" alt="" width="450px" height="300px">
			@else
				<div class="border p-0 col-12 rounded" style="min-width: 20px; min-height:100px; max-height:200px" id="muestrasImg">
				
				</div>
				<script src="{{asset('js/gestion.js') }}"></script>	
				<script>
					var i = 0;
					function tamano(){
						var ver = setInterval(function(){
							n++;

							var img = document.getElementById('0');
							if (img) {
								img.width = 350;
								img.height = 200;	

							}
							console.log(n);	
						}, 3000)						
					
					}

				</script>		
			@endif
	
		</td>

	</tr>
	
</table>
<p style="line-height: 100%; margin-left: 0.06cm; margin-bottom: 0cm">
<br/>

</p>
</div>
</div>

