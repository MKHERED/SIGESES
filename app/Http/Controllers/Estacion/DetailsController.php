<?php

namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Estaciones;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
         
        $id = $_SERVER['REQUEST_URI'];
        
         $id1 = str_replace("details?", "", $id);
         $id = str_replace("//", "", $id1);
        
         if ($id.str_contains(" * ", "/")) {
             $id2 = str_replace("/", "", $id);
         }
         $id = str_replace("&on", "", $id2);

         if (str_replace($id, "", $id2) == "") {
            $doc = "No";
         } else {
            $respusta = str_replace($id."&", "", $id2);
            if ($respusta == "on") {
                $doc = "Si";
            }
         }

        
         //

        return view('estaciones.details.details')->with(["id"=>$id, "doc"=>$doc]);
        
        //$data = $id . " // " . $id1; 
        //return response()->json($data);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $details = new Details;
        
        $details->id = $request->id;
        
        if ($details) {
            $estaciones = Estaciones::findOrFail($details['id']); 
            $details->estacion = $estaciones['nombre'];
            $details->siglas = $estaciones['siglas'];            
            $details->autor = $request->autor;
        //return response()->json($details);
        }

        $details->antena_gps = $request->antena_gps;
        $details->antena_gps_fab = $request->antena_gps_fab;
        $details->antena_gps_esp = $request->antena_gps_esp;

        $details->antena_parabolica = $request->antena_parabolica;
        $details->antena_parabolica_fab = $request->antena_parabolica_fab;
        $details->antena_parabolica_esp = $request->antena_parabolica_esp;
        
        $details->bateria = $request->bateria;
        $details->bateria_fab = $request->bateria_fab;
        $details->bateria_esp = $request->bateria_esp;

        $details->controlador_carga = $request->controlador_carga;
        $details->controlador_carga_fab = $request->controlador_carga_fab;
        $details->controlador_carga_esp = $request->controlador_carga_esp;
        
        $details->digitalizador = $request->digitalizador;
        $details->digitalizador_fab = $request->digitalizador_fab;
        $details->digitalizador_esp = $request->digitalizador_esp;

        $details->modem_satelital = $request->modem_satelital;
        $details->modem_satelital_fab = $request->modem_satelital_fab;
        $details->modem_satelital_esp = $request->modem_satelital_esp;

        $details->panel_solar = $request->panel_solar;
        $details->panel_solar_fab = $request->panel_solar_fab;
        $details->panel_solar_esp = $request->panel_solar_esp;

        $details->regulador_carga = $request->regulador_carga;
        $details->regulador_carga_fab = $request->regulador_carga_fab;
        $details->regulador_carga_esp = $request->regulador_carga_esp;

        $details->sismometro = $request->sismometro;
        $details->sismometro_fab = $request->sismometro_fab;
        $details->sismometro_esp = $request->sismometro_esp;

        $details->trompeta_satelital = $request->trompeta_satelital;
        $details->trompeta_satelital_fab = $request->trompeta_satelital_fab;
        $details->trompeta_satelital_esp = $request->trompeta_satelital_esp;

        $details->instalacion_satelital = $request->inst;

        $doc = $request->doc;
        
        
        $validador = $this->regist($details);
        //return response()->json(var_dump($validador));
        
        ///*        
        if ($doc == 'Si'){
            $id = $request->id;

            return redirect()->route("update",compact('id'))->with(["mensaje" => "Creada con exito",]);
        }

        if (array_key_exists('msj', $validador)) {
            // registrado
            if ($validador['msj'] == ["mensaje" => "Componentes registrados exitosamente",]) {
                $details->__unset('autor');  //except(['autor']); //except(['_token', '_method', 'inst']);
                $details->save(); 
                return redirect()->route("estaciones.index")->with($validador['msj']);
            }            
        }
        
        if (array_key_exists('var', $validador)){
            // Componente ya registrado
            $id ="/".$request->id;
            if ($validador['msj'] == ["mensaje" => "Componente ya registrado: "]) {
                $validador['msj'] = ["mensaje" => "Componente ya registrado: ".$validador['detail']." en ".$validador['var']];                
            
            } elseif ($validador['msj'] == ["mensaje" => "Esta estacion ya tiene un componente registrado en: "]) {
                $validador['msj'] = ["mensaje" => "Esta estacion ya tiene un componente registrado en: ".$validador['detail']];
            }
            
            
            return redirect()->route("details.index", $id)->with($validador['msj']);

        
        }


        if (array_key_exists('error', $validador)) {
            // Componente Faltante no pasa
            
            $id ="/".$request->id;
            return redirect()->route("details.index", $id)->with(["mensaje" => $validador['validador']['msj'].$validador['validador']['detail'] ]);
            
        }


        //*/  
        
        
        
        //-- aqui hacer guardado de details y empezar a dividir los datos

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estaciones = Estaciones::findOrFail($id);
        $sigla = $estaciones['siglas'];
        $nombre = $estaciones['nombre'];
        $details = DB::table('details')->where('siglas', $sigla)->first();


        return view('estaciones.details.edit', compact('details', 'id', 'nombre'));
        //aqui hay un archivo Javascrip que se encarga de cambiar ""estaciones.details"" como un edit
        
        //return response()->json($details); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $details = request()->except(['_token', '_method', 'inst']);
        $estacion = Estaciones::findOrFail($id);
        
        $siglas = $estacion['siglas'];
        $estacion = $estacion['nombre'];

        
        $details["siglas"]= $siglas;
        $details["estacion"]= $estacion;
        $details["instalacion_satelital"]=$request->inst;

        Details::where('estacion', '=' ,$details['estacion'])->update($details);
        
        return redirect()->route("estaciones.index")->with(["mensaje" => "Se actualizaron correctamente los componentes",]);

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        /* no se esta utilizando
        
        $list3 = [
            'antena_gps', 'antena_gps_fab','antena_gps_esp','antena_parabolica','antena_parabolica_fab','antena_parabolica_esp','bateria','bateria_fab','bateria_esp','controlador_carga','controlador_carga_fab', 
            'controlador_carga_esp','digitalizador','digitalizador_fab','digitalizador_esp','modem_satelital','modem_satelital_fab','modem_satelital_esp','panel_solar','panel_solar_fab','panel_solar_esp',
            'regulador_carga','regulador_carga_fab','regulador_carga_esp','sismometro','sismometro_fab','sismometro_esp','trompeta_satelital','trompeta_satelital_fab','trompeta_satelital_esp','instalacion_satelital'
        ];
        
        $list = [
            'antenagps','antenaparabolica','bateria','controladorcarga', 
            'digitalizador','modemsatelital','panelsolar',
            'reguladorcarga','sismometro','trompetasatelital'
        ];

        $list2 = [
            ['antenagps'=>'antena_gps',
            'antenaparabolica'=>'antena_parabolica',
            'bateria'=>'bateria',
            'controladorcarga'=>'controlador_carga', 
            'digitalizador'=>'digitalizador',
            'modemsatelital'=>'modem_satelital',
            'panelsolar'=>'panel_solar',
            'reguladorcarga'=>'regulador_carga',
            'sismometro'=>'sismometro',
            'trompetasatelital'=>'trompeta_satelital'],
            
            ['antenagps'=>'antena_gps_fab',
            'antenaparabolica'=>'antena_parabolica_fab',
            'bateria'=>'bateria_fab',
            'controladorcarga'=>'controlador_carga_fab', 
            'digitalizador'=>'digitalizador_fab',
            'modemsatelital'=>'modem_satelital_fab',
            'panelsolar'=>'panel_solar_fab',
            'reguladorcarga'=>'regulador_carga_fab',
            'sismometro'=>'sismometro_fab',
            'trompetasatelital'=>'trompeta_satelital_fab'],

            ['antenagps'=>'antena_gps_esp',
            'antenaparabolica'=>'antena_parabolica_esp',
            'bateria'=>'bateria_esp',
            'controladorcarga'=>'controlador_carga_esp', 
            'digitalizador'=>'digitalizador_esp',
            'modemsatelital'=>'modem_satelital_esp',
            'panelsolar'=>'panel_solar_esp',
            'reguladorcarga'=>'regulador_carga_esp',
            'sismometro'=>'sismometro_esp',
            'trompetasatelital'=>'trompeta_satelital_esp']
    
        ];
        
        foreach ($list as $tables){
            $details = DB::table('details')->where('id', $id)->get(); //iterar y hacer 10mil cosas
            
            if ($tables == $request->component) {
                
            
                $component = DB::table($tables)->where('id', $id)->get(); // solo borrar
                //return response()->json(print_r($component));
                
                //mysqli_num_rows()
                if (count($component)>=1) {
                    DB::table($tables)->where('id','=', $id)->delete(); //aqui se destruye el componente en su tabla correspondiente
                    //este array contiene las claves para cada details
                    $iterador = $list2[0][$tables];
                    $details[0]->$iterador = " ";
                    // aqui estoy obteniendo el nombre del componente en details
                    
                    $iterador = $list2[1][$tables];
                    $details[0]->$iterador = " ";

                    $iterador = $list2[2][$tables];
                    $details[0]->$iterador = " ";
                    // ya aqui se editaron las propiedades de los componentes en details
                    // ahora solo se debe eliminar el componente

                    
                    //para solucionar este error puedo solo convertir 
                    //el array que llega en los componentes nuevamente 
                    //con un forearh

                    $nuevo['id'] = $details[0]->id;
                    $nuevo['estacion'] = $details[0]->estacion;
                    $nuevo['siglas'] = $details[0]->siglas;

                    for ($i=0; $i < 31; $i++) { 
                        $iterador = $list3[$i];
                        $nuevo[$iterador] = $details[0]->$iterador;
                    }

                    $estacion = $component[0]->estacion;
                    
                    //return response()->json($estacion);
                    
                    Details::where('estacion', '=', $estacion)->update($nuevo);                      
                    return redirect()->route("panel.detail")->with(["mensaje" => "Se elimino con exito"]);
                } else {
                    return redirect()->route("panel.detail")->with(["mensaje" => "Ya se elimino anteriormente"]);
                    
                }
          
                
            }

            


              
        }
        */

        // consultar el id
        //$serial = DB::table('details')->where('id', $id)->get('')
        
        // primero traerme el tipo de componente listo
        // el id del mismo en este caso id=3 details es == id=3 estaciones
        // y luego borrar el componetne dependiendo la tabla, hacer un for para igualar con una lista donde esten grabados todos los nombres de las tablas
        // y luego borrar el componente de la estacion details
        // luego hacer una opcion para agregar dicho componente solamente


    }

    public function updateEdit(Request $request){
        //  return response()->json($request);
        $list = [
            ['Antena gps'=>'antena_gps',
            'Antena parabolica'=>'antena_parabolica',
            'Bateria'=>'bateria',
            'Controlador de carga'=>'controlador_carga', 
            'Digitalizador'=>'digitalizador',
            'Modem'=>'modem_satelital',
            'Panel solar'=>'panel_solar',
            'Regulador de carga'=>'regulador_carga',
            'Sismometro'=>'sismometro',
            'Trompeta'=>'trompeta_satelital'],
            
            ['antena_gps'=>'antenagps',
            'antena_parabolica'=>'antenaparabolica',
            'bateria'=>'bateria',
            'controlador_carga'=>'controladorcarga', 
            'digitalizador'=>'digitalizador',
            'modem_satelital'=>'modemsatelital',
            'panel_solar'=>'panelsolar',
            'regulador_carga'=>'reguladorcarga',
            'sismometro'=>'sismometro',
            'trompeta_satelital'=>'trompetasatelital'],
        ];
        

        $id = $request->id;
        $serial  = $request->serial;
        $detail = $request->detail;

        if ($serial == null) {
            return redirect()->route("panel.detail")->with(["mensaje" => "No puede enviar un componete vacios"]);
            
        }

        $conver = $list[0][$detail];
        
        $conver1 = $list[1][$conver];

        $details = DB::table($conver1)->where('id', $id)->get();
        if (count($details)>=1) {
            $details[0]->$conver = $serial;
            //este pedacito convierte stdclass a array... ----------
            $array = json_decode(json_encode($details[0]), true);
            //------------------------------------------------------
            DB::table($conver1)->where('id', '=' ,$id)->update($array);            
        } else {
            return redirect()->route("panel.detail")->with(["mensaje" => "Por favor dirijase a editar todos los componentes"]);
            
        }


        //------------------------------------------------------------
        $details = DB::table('details')->where('id', '=', $id)->get();
        $details[0]->$conver = $serial;
        $array = json_decode(json_encode($details[0]), true);
        DB::table('details')->where('id', '=' ,$id)->update($array);
        //------------------------------------------------------------

        return redirect()->route("panel.detail")->with(["mensaje" => "Se actualizo con exito"]);
    }

    // revisar y optimisar mejor regist ya que es muy largo XD
    public function regist($details)
    {
     
        $msj = ["mensaje" => "Componente ya registrado",];
        $detail = null;
        $var = null;
        

        $list = [
            'antena_gps','antena_parabolica','bateria','controlador_carga', 
            'digitalizador','modem_satelital','panel_solar',
            'regulador_carga','sismometro','trompeta_satelital'
        ];
        $list2 = [
            'antenagps','antenaparabolica','bateria','controladorcarga', 
            'digitalizador','modemsatelital','panelsolar',
            'reguladorcarga','sismometro','trompetasatelital'
        ];

        $list3 = [
            ['antenagps'=>'antena_gps',
            'antenaparabolica'=>'antena_parabolica',
            'bateria'=>'bateria',
            'controladorcarga'=>'controlador_carga', 
            'digitalizador'=>'digitalizador',
            'modemsatelital'=>'modem_satelital',
            'panelsolar'=>'panel_solar',
            'reguladorcarga'=>'regulador_carga',
            'sismometro'=>'sismometro',
            'trompetasatelital'=>'trompeta_satelital'],
            
            ['antenagps'=>'antena_gps_fab',
            'antenaparabolica'=>'antena_parabolica_fab',
            'bateria'=>'bateria_fab',
            'controladorcarga'=>'controlador_carga_fab', 
            'digitalizador'=>'digitalizador_fab',
            'modemsatelital'=>'modem_satelital_fab',
            'panelsolar'=>'panel_solar_fab',
            'reguladorcarga'=>'regulador_carga_fab',
            'sismometro'=>'sismometro_fab',
            'trompetasatelital'=>'trompeta_satelital_fab'],

            ['antenagps'=>'antena_gps_esp',
            'antenaparabolica'=>'antena_parabolica_esp',
            'bateria'=>'bateria_esp',
            'controladorcarga'=>'controlador_carga_esp', 
            'digitalizador'=>'digitalizador_esp',
            'modemsatelital'=>'modem_satelital_esp',
            'panelsolar'=>'panel_solar_esp',
            'reguladorcarga'=>'regulador_carga_esp',
            'sismometro'=>'sismometro_esp',
            'trompetasatelital'=>'trompeta_satelital_esp']
    
        ];
        
        $error = 'a';
        
        foreach ($list2 as $tables) {
            $iterador = $list3[0][$tables];
            $iterador1 = $list3[1][$tables];
            $iterador2 = $list3[2][$tables];
            $msj = 'No puede dejar este campo vacio: ';
            

            if($details[$iterador]==null){
                //$error[] = [$details[$iterador], $iterador];
                $error = 'b';
                $validador = [
                    'msj'=>$msj,
                    'detail'=>$iterador
                ];
            } 
            if($details[$iterador1] == null){
                //$error[] = [$details[$iterador1], $iterador1];
                $error = 'b';
                $validador = [
                    'msj'=>$msj,
                    'detail'=>$iterador1
                ];
            } 
            if($details[$iterador2] == null) {
                //$error[] = [$details[$iterador2], $iterador2];
                $error = 'b';
                $validador = [
                    'msj'=>$msj,
                    'detail'=>$iterador2
                ];

            }
            if($details['instalacion_satelital']==null){
                //$error[] = $details['instalacion_satelital'];
                $error = 'b';
                $validador = [
                    'msj'=>$msj,
                    'detail'=>'Fecha'
                ];
            }
            
            
        }

        if ($error == 'a') {
            
        
            for ($i=0; $i <= 9; $i++) { 
                $column = $list[$i];
                $consult = DB::table($list2[$i])->where($column, $details[$column])->first();
                $consult_id = DB::table($list2[$i])->where('id', '=', $details['id'])->first();
                if (($consult == null) && ($consult_id == null)) {
                    $db = false;
                } elseif (($consult_id->id == $details['id']) && ($consult == null)) {
                    global $db;
                    $db = $consult_id->estacion;
                    $detail = $column;
                    $msj = ["mensaje" => "Esta estacion ya tiene un componente registrado en: "];
                    break;                   
                } else {
                    global $db;
                    $db = $consult_id->estacion;
                    $detail = $column;
                    $msj = ["mensaje" => "Componente ya registrado: "];
                    break;
                }
                        
            }
            //Revisar aqui..... hacer un json pra saber porque dece consul == null cuando no deberia
            //return compact('db', 'consult', 'consult_id');

                    
            
            if ($db == false) {
                
                $msj = ["mensaje" => "Componentes registrados exitosamente",];    
                $validador = [
                    'msj'=>$msj,
                ];

                /*
                foreach ($list2 as $tables) {
                    $detail = [];
                    foreach($list as $item) { 
                        
                        if ($list3[0][$tables] == $item) {
                        
                            $detail['id'] = $details->id;
                            $detail['estacion'] = $details->estacion;
                            $detail['siglas']= $details->siglas;
                            $detail['autor']= $details->autor;

                            $iterador = $list3[0][$tables];
                            $detail[$iterador] =  $details->$iterador;

                            $iterador = $list3[1][$tables];
                            $detail[$iterador] =  $details->$iterador;

                            $iterador = $list3[2][$tables];
                            $detail[$iterador] =  $details->$iterador;

                            $detail['created_at']=$details->instalacion_satelital;
                            $detail['updated_at']=$details->instalacion_satelital;

                            $array = json_decode(json_encode($detail), true);
                            
                            DB::table($tables)->insert($array);
                            sleep(1 );
                        } 
                    }
                    
                }
                */ //aqui registrar
            } elseif ($db != false ) {
                $validador = [
                    'msj'=>$msj,
                    'detail'=>$detail,
                    'var'=>$db,
                ];
            };
            return $validador;
            
        }
        
        return compact('error', 'validador');
    }
















}
