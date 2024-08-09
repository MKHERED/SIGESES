<?php

namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Estaciones;
use App\Models\Visitas;
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

    public function index(Request $request, $id)
    {
        
        if (!$request->doc) {
            $doc = 'No';
            $estacion = Estaciones::where('id', '=', $id)->first();
            return view('estaciones.details.details',compact('id', 'doc', 'estacion'));
        }
        
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
    public function store(Request $request, $id)
    {
        $estacion = Estaciones::find($id);

        if ($estacion) {
            $detail = new Details;
            //$data = $estacion + $request;
            $array = json_decode(json_encode($request), true);
            
            
            $detail->id = $estacion['id'];
            $detail->siglas = $estacion['siglas'];
            $detail->estacion = $estacion['nombre'];
            $detail->autor = $request['autor'];
            

            $detail = $detail->fill($array);
            
            //return response()->json($request);
            $list = [
                "transceptor_marca","transceptor_modelo","transceptor_serial",
                "antena_gps_marca","antena_gps_modelo","antena_gps_serial",
                "BUC_marca","BUC_modelo","BUC_frecuencia","BUC_serial",
                "LNB_marca","LNB_modelo","LNB_frecuencia","LNB_banda","LNB_serial",
                "trompeta_marca","trompeta_serial",
                "digitalizador_marca","digitalizador_modelo","digitalizador_serial",
                "parabolica_marca","parabolica_diametro","parabolica_serial",
                "sensor_marca","sensor_modelo","sensor_serial","sensor_sen",
                "regulador_voltaje_marca","regulador_voltaje_modelo","regulador_voltaje_serial","regulador_voltaje_watts",
                "banco_baterias_marca","banco_baterias_modelo","banco_baterias_serial","banco_baterias_cantidad","banco_baterias_watts",
                "panel_solar_a_marca","panel_solar_a_modelo","panel_solar_a_serial","panel_solar_a_watts",
                "panel_solar_b_marca","panel_solar_b_modelo","panel_solar_b_serial","panel_solar_b_watts",
                "panel_solar_c_marca","panel_solar_c_modelo","panel_solar_c_serial","panel_solar_c_watts",
                "panel_solar_d_marca","panel_solar_d_modelo","panel_solar_d_serial","panel_solar_d_watts",
                "panel_solar_e_marca","panel_solar_e_modelo","panel_solar_e_serial","panel_solar_e_watts",
            ];

            $list2 = [
                "transceptor_fecha","antena_gps_fecha","BUC_fecha",
                "LNB_fecha","trompeta_fecha","digitalizador_fecha",
                "parabolica_fecha","sensor_fecha","regulador_voltaje_fecha",
                "banco_baterias_fecha","panel_solar_a_fecha","panel_solar_b_fecha",
                "panel_solar_c_fecha","panel_solar_d_fecha","panel_solar_e_fecha"
            ];

        foreach ($list as $item => $value){
            if ($request[$value] == null) {
                $detail[$value] = " ";   
            } else {
                $detail[$value] = $request[$value];
            }         
        } 
        
        foreach ($list2 as $item => $value){
            if ($request[$value] == null) {
                $detail[$value] = null;   
            } else {
                $detail[$value] = $request[$value];
            }         
        } 


        // Pensar en como analizar los datos sin que arroje los datos vacios *ese es el problema*

        //return response()->json($request);
        //return response()->json($detail);
        /*$report = $this->regist($detail);
        
        return response()->json([$report, "hola"]);
        if (in_array('validador', $report)) {
            $equipo = $report[0];
            $objeto = $report[1];
            $donde = $report[2][0]['estacion'];
            $detail = $report[3];
            
            //return redirect()->route('details.index', $id)->with('mensaje', 'Ya fue registrado '.$objeto.' en '.$donde, $detail, $equipo);          
        } else {
            $nombre = $estacion['nombre'];
            //return view('estaciones.details.edit', compact('detail', 'id', 'nombre'))->with('mensaje', 'hola');
            $mensaje = $report[0];
            return redirect()->route('details.index', $id)->with('mensaje', $report[0], [$detail, $id, $nombre, $mensaje]);
        }
        */

        //$ver = Details::find($id);
        //return response()->json($detail);

        if (TRUE) {
            $detail->save();
            return redirect()->route('estaciones.show', $id)->with('mensaje', ' Se guardaron los datos exitosamente');
            
        }
        
        }

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
        $detail = $details;
        //return response()->json($detail); 
        
        return view('estaciones.details.edit', compact('detail', 'id', 'nombre'));
        //aqui hay un archivo Javascrip que se encarga de cambiar ""estaciones.details"" como un edit
        
        //
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
        $estacion = Estaciones::findOrFail($id);
        if ($estacion) {
            $cambios = json_decode(json_encode($request->except('_token', '_method')), true);
            $cambios = array_diff($cambios, array("", null));

            //"comprobar cuando un componente este ya registrado con ·Regist·"
         
            //$report = $this->regist($cambios); 
            
            $lista3 = [
                "transceptor_serial","antena_gps_serial","BUC_serial",
                "LNB_serial","trompeta_serial","digitalizador_serial",
                "parabolica_serial","sensor_serial","regulador_voltaje_serial",
                "banco_baterias_serial","panel_solar_a_serial", "panel_solar_b_serial",
                "panel_solar_c_serial","panel_solar_d_serial","panel_solar_e_serial"
            ]; 

            $lista4 = [
                "transceptor_serial" => "transceptor",
                "antena_gps_serial" => "antena gps",
                "BUC_serial" => "BUC",
                "LNB_serial" => "LNB",
                "trompeta_serial" => "trompeta",
                "digitalizador_serial" => "digitalizador",
                "parabolica_serial" => "parabolica",
                "sensor_serial" => "sensor",
                "regulador_voltaje_serial" => "regulador voltaje",
                "banco_baterias_serial" => "banco baterias",
                "panel_solar_a_serial" => "panel solar a",
                "panel_solar_b_serial" => "panel solar b",
                "panel_solar_c_serial" => "panel solar c",
                "panel_solar_d_serial" => "panel solar d",
                "panel_solar_e_serial" => "panel solar e"
            ];

            $registrados = '';
            foreach ($lista3 as $value) {
                
                    $objeto = $request[$value];
                    if ($objeto != "") {
                        $verifi = Details::where($value, $objeto)->exists();
                        

                        if($verifi) {
                            //'id', '!=', $id, "and" ,
                            $donde = Details::where($value, '=' ,$objeto)->get("estacion");
                            $nombre = Details::where('id', '=' ,$id)->get("estacion");
                            
                            if ($nombre == $donde) {
                                $text = 'Se actualizaron los datos correctamente';
                            } else {
                                $text = 'Este componente ya se encuentra registrado "'.$objeto.'" en '.$lista4[$value].', estacion: '.$donde[0]['estacion'];
                            }

                            /*
                            if ($registrados == "") {
                                $registrados = '"'.$value.'"';
                            } else {
                                $registrados =$registrados.','.'"'.$value.'"';
                            }*/
                            //$registrados = $registrados.",";
                            break;
                        }
                        //
                        
                                   
                }
            }

            
            if ($verifi) {
                $actualizacion = Details::find($id);
                //return response()->json($registrados);
                $cambios_n = $request->except($value);

                
                $actualizacion->fill($cambios_n);
                $actualizacion->save();    

                //return redirect()->route('details.edit', $id)->with('mensaje', ":".$text)->with('mensaje', 'Se actualizaron los datos correctamente', 'marcador', $registrados);  
                return redirect()->route('estaciones.show', $id)->with('mensaje', $text);
            } else {

                $actualizacion = Details::find($id);
                $actualizacion->fill($request->all());
                $actualizacion->save(); 

                return redirect()->route('estaciones.show', $id)->with('mensaje', ' Se actualizaron los datos correctamente');
            }


            //Details::where('id', '=', $estacion->id)->update($cambios);
            
            
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {

    }

    public function borrarData(Request $request){
            //return response()->json($request);
            Details::destroy($request->id);
            return redirect()->route('panel.detail');

    }
    
    
    // revisar y optimisar mejor regist ya que es muy largo XD
    public function regist($details)
    {
        // un foreach dentro de otro, uno para las estaciones y otro para los valores a expesion de algunos datos (id, estacion, siglas, aunto y todas las fechas, created_at y updated_at)
        //"iterador para los componentes de details"

        $lista3 = [
            "transceptor_serial","antena_gps_serial","BUC_serial",
            "LNB_serial","trompeta_serial","digitalizador_serial",
            "parabolica_serial","sensor_serial","regulador_voltaje_serial",
            "banco_baterias_serial","panel_solar_a_serial", "panel_solar_b_serial",
            "panel_solar_c_serial","panel_solar_d_serial","panel_solar_e_serial"
        ];

        $donde= "";

        foreach ($lista3 as $value) {
            
            $objeto = $details->$value;
            if ($objeto != " " | $objeto != "") {
                $donde = Details::where($value, $objeto)->get("estacion");
                $valor = Details::where($value, $objeto)->get("panel_solar_e_serial");
                
                $objeto = $details->$value;
                $equipo = $value;
                
            }
            

            
        }

        if ($objeto != " " | $objeto != "") {
            return [$equipo ,$objeto, $donde, $details, $valor, 'validador'];
        }
        
        /*
        if ($donde == "[]") {
            return [$equipo ,$objeto, $donde, $details, 'false'];
        }
        if ($donde != "[ ]") {
            return [$equipo ,$objeto, $donde, $details, 'validador'];
        }
        if ($donde == "") {
            return [" Por favor llene alguna de las casillas por completo incluyendo sus seriales"];
        }*/
        





    }
















}
