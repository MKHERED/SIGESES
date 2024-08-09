nota.txt

            $serial = $request->serial;
            $item = $request->detail;
            
            $item_s = $request->detail.'serial';
            /*
            $marca = $request->detail.'serial';
            $fecha = $request->detail.'fecha';
            */
            // REGISTRAR BUC_FRECUENCIA Y VER SI NO AFECTA EN OTRA COSA DE LAS VISITAS
            $retorno1 = $this->filtro($item, 'App\Models\Details');
            $DB1 = $retorno1[0];
            //$DB = Details::where($item_s, "LIKE", $serial)->get();
            //select()->get();
            $buscar="";
            foreach ($DB1 as $detail){
                $autor = $detail->autor;
                $autor = User::where('id', '=', $autor)->first('name');
                $detail->autor = $autor['name'];
                if ($detail[$retorno1[1] == $serial]) {
                    $details[] = $detail;
                }
                
                $buscar = "visitas";
            }





            //$BD = Visitas::where($serial, "LIKE", $item)->get();
            $retorno2 = $this->filtro($item, 'App\Models\Visitas');
            $DB = $retorno2[0];
            $visitas = [];
            foreach ($DB as $visita){
                $autor = $visita->autor;
                $autor = User::where('id', '=', $autor)->first('name');
                $visita->autor = $autor['name'];
                if ($visita[$retorno2[1]] == $serial) {
                    $visitas[] = $visita;
                }
                
            }
            //CONVERTIR A DATOS NORMALES PARA LA VISTA
            
            //return response()->json($retorno);
            $retorno = $retorno2;
            $retorno[0] = false;
            $item = 'a';































            @if ($retorno[1] != 'panel_solar_serial')
                    <tr>
                        <td>
                            <a href="http://" >
                                <div class="row">
                                    <div class="col-8">
                                        {{ $visita[$retorno[1]]}}
                                    </div>
                                    <div class="col-2">
                                        {{ $visita[$retorno[2]]}}
                                    </div>
                                    <div class="col-2">
                                        {{ $visita[$retorno[3]]}}
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>{{$visita->autor}}</td>
                        <td> 
                            <button class=" btn btn-sm">Ver </button>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <th colspan="6" class="" >Panel Sorlar 1</th></tr>
                        <tr>
                            <td >{{$visita['panel_solar_a_marca']}}</td>
                            <td>{{$visita->panel_solar_a_modelo}}</td>
                            <td>{{$visita->panel_solar_a_watts}}</td>
                            <td>--</td>
                            <td>{{$visita->panel_solar_a_serial}}</td>
                            <td>{{$visita->panel_solar_a_fecha}}</td>
                        </tr>
                        <tr><th colspan="6" class="" >Panel Sorlar 2</th></tr>
                        <tr>
                            <td >{{$visita->panel_solar_b_marca}}</td>
                            <td>{{$visita->panel_solar_b_modelo}}</td>
                            <td>{{$visita->panel_solar_b_watts}}</td>
                            <td>--</td>
                            <td>{{$visita->panel_solar_b_serial}}</td>
                            <td>{{$visita->panel_solar_b_fecha}}</td>
                        </tr>
                        <tr><th colspan="6" class="" >Panel Sorlar 3</th></tr>
                        <tr>
                            <td >{{$visita->panel_solar_c_marca}}</td>
                            <td>{{$visita->panel_solar_c_modelo}}</td>
                            <td>{{$visita->panel_solar_c_watts}}</td>
                            <td>--</td>
                            <td>{{$visita->panel_solar_c_serial}}</td>
                            <td>{{$visita->panel_solar_c_fecha}}</td>
                        </tr>
                        <tr><th colspan="6" class="" >Panel Sorlar 4</th></tr>
                        <tr>
                            <td >{{$visita->panel_solar_d_marca}}</td>
                            <td>{{$visita->panel_solar_d_modelo}}</td>
                            <td>{{$visita->panel_solar_d_watts}}</td>
                            <td>--</td>
                            <td>{{$visita->panel_solar_d_serial}}</td>
                            <td>{{$visita->panel_solar_d_fecha}}</td>
                        </tr>
                        <tr><th colspan="6" class="" >Panel Sorlar 5</th></tr>
                        <tr>
                            <td >{{$visita->panel_solar_e_marca}}</td>
                            <td>{{$visita->panel_solar_e_modelo}}</td>
                            <td>{{$visita->panel_solar_e_watts}}</td>
                            <td>--</td>
                            <td>{{$visita->panel_solar_e_serial}}</td>
                            <td>{{$visita->panel_solar_e_fecha}}</td>
                        </tr>
                    @endif































                       {{--<div class="container mt-2 bg-dark p-0">
    <div class="row">
        <div class="bg-success col-12">
            <h2 class="text-light text-center">Sistema para cargar datos de las estaciones</h2> 
        </div>        
    
        <div class="mt-2 col-3"> 
            <select name="estacion" id="" class="form-select">
                <option value="none">Elija una Estación</option>

            @foreach ($estaciones as $estacion)
                <option value="{{$estacion->siglas}}">{{$estacion->nombre}}: {{$estacion->siglas}}</option>
            @endforeach
            </select>                
        </div>
        <div class="mt-2 col-3">

        </div>        
    </div>

   </div>--}}
   
   
   









   <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dropzone
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="dropzone" id="my-awesome-dropzone">
                    <input type="file" name="file" />
                    <!--div class="dz-message" style="height:200px;">
                        Drop your files here
                    </div-->
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--script src="{{asset('js/dropzone-5.9.3.js')}}"></script-->
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    
    {{--<script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 2,
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    alert("file uploaded");
                });
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        Dropzone.discover();
    </script>