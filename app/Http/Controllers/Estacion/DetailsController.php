<?php

namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Estaciones;
use finfo;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $_SERVER['REQUEST_URI'];
        
        $id1 = str_replace("details?", "", $id);
        $id = str_replace("//", "", $id1);
        
        if ($id.str_contains(" * ", "/")) {
            $id = str_replace("/", "", $id);
        }
        

        return view('estaciones.details.details', compact('id'));
        
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
        
        //return response()->json($details);
        }

        $details->antena_gps = $request->antena_gps;
        $details->antena_gps_esp = $request->antena_gps_esp;

        $details->antena_parabolica = $request->antena_parabolica;
        $details->antena_parabolica_esp = $request->antena_parabolica_esp;
        
        $details->bateria = $request->bateria;
        $details->bateria_esp = $request->bateria_esp;

        $details->controlador_carga = $request->controlador_carga;
        $details->controlador_carga_esp = $request->controlador_carga_esp;
        
        $details->digitalizador = $request->digitalizador;
        $details->digitalizador_esp = $request->digitalizador_esp;

        $details->modem_satelital = $request->modem_satelital;
        $details->modem_satelital_esp = $request->modem_satelital_esp;

        $details->panel_solar = $request->panel_solar;
        $details->panel_solar_esp = $request->panel_solar_esp;

        $details->regulador_carga = $request->regulador_carga;
        $details->regulador_carga_esp = $request->regulador_carga_esp;

        $details->sismometro = $request->sismometro;
        $details->sismometro_esp = $request->sismometro_esp;

        $details->trompeta_satelital = $request->trompeta_satelital;
        $details->trompeta_satelital_esp = $request->trompeta_satelital_esp;

        $details->instalacion_satelital = $request->inst;
        
        $validador = $this->regist($details);

        
        if ($validador['msj'] == ["mensaje" => "Componente ya registrado ".$validador['detail']." en ".$validador['var'],]) {
            $id ="/".$request->id;

            return redirect()->route("details.index", $id)->with($validador['msj']);
            
        
        }else {
            $details->save(); 
            return redirect()->route("estaciones.index")->with($validador['msj']);
        }
             
        
        

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
    public function destroy($id)
    {
        //
    }

    public function regist($details)
    {
        $msj = ["mensaje" => "Componente ya registrado",];
        $detail = null;
        $var = null;
        if ((DB::table('antenagps')->where('antena_gps', $details['antena_gps'])->first()) == null ) {
            DB::table('antenagps')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'antena_gps'=>$details['antena_gps'],
                'antena_gps_esp'=>$details['antena_gps_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
            // listo aqui se esta registrando... validar si el componente exixte o no
        } else {
            $db = DB::table('antenagps')->where('antena_gps', $details['antena_gps'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'antena GPS';
        }
        if ((DB::table('antenaparabolica')->where('antena_parabolica', $details['antena_parabolica'])->first()) == null ) {
            DB::table('antenaparabolica')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'antena_parabolica'=>$details['antena_parabolica'],
                'antena_parabolica_esp'=>$details['antena_parabolica_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);  
            
        } else {
            $db = DB::table('antenaparabolica')->where('antena_parabolica', $details['antena_parabolica'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'antena parabolica';
        }

        if ((DB::table('bateria')->where('bateria', $details['bateria'])->first()) == null ) {
            DB::table('bateria')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'bateria'=>$details['bateria'],
                'bateria_esp'=>$details['bateria_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]); 
            
        } else {
            $db = DB::table('bateria')->where('bateria', $details['bateria'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'bateria';
        }

        if ((DB::table('controladorcarga')->where('controlador_carga', $details['controlador_carga'])->first()) == null ) {
            DB::table('controladorcarga')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'controlador_carga'=>$details['controlador_carga'],
                'controlador_carga_esp'=>$details['controlador_carga_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
        
        } else {
            $db = DB::table('controladorcarga')->where('controlador_carga', $details['controlador_carga'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'controlador carga';
        }

        if ((DB::table('digitalizador')->where('digitalizador', $details['digitalizador'])->first()) == null ) {
            DB::table('digitalizador')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'digitalizador'=>$details['digitalizador'],
                'digitalizador_esp'=>$details['digitalizador_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);

        } else {
            $db = DB::table('digitalizador')->where('digitalizador', $details['digitalizador'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'digitalizador';
        }

        if ((DB::table('modemsatelital')->where('modem_satelital', $details['modem_satelital'])->first()) == null ) {
            DB::table('modemsatelital')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'modem_satelital'=>$details['modem_satelital'],
                'modem_satelital_esp'=>$details['modem_satelital_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
        
        } else {
            $db = DB::table('modemsatelital')->where('modem_satelital', $details['modem_satelital'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'modem satelital';
        }

        if ((DB::table('panelsolar')->where('panel_solar', $details['panel_solar'])->first()) == null ) {
            DB::table('panelsolar')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'panel_solar'=>$details['panel_solar'],
                'panel_solar_esp'=>$details['panel_solar_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
            
        } else {
            $db = DB::table('panelsolar')->where('panel_solar', $details['panel_solar'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'panel solar';
        }

        if ((DB::table('reguladorcarga')->where('regulador_carga', $details['regulador_carga'])->first()) == null ) {
            DB::table('reguladorcarga')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'regulador_carga'=>$details['regulador_carga'],
                'regulador_carga_esp'=>$details['regulador_carga_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
            
        } else {
            $db = DB::table('reguladorcarga')->where('regulador_carga', $details['regulador_carga'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'regulador carga';
        }

        if ((DB::table('sismometro')->where('sismometro', $details['sismometro'])->first()) == null ) {
            DB::table('sismometro')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'sismometro'=>$details['sismometro'],
                'sismometro_esp'=>$details['sismometro_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);
            
        } else {
            $db = DB::table('sismometro')->where('sismometro', $details['sismometro'])->get($columns = ['estacion']);

            $var = $db;
            $detail = 'sismometro';
        }

        

        if ((DB::table('trompetasatelital')->where('trompeta_satelital', $details['trompeta_satelital'])->first()) == null ) {
            DB::table('trompetasatelital')->insert([
                'id'=> $details['id'],
                'estacion'=> $details['estacion'],
                'siglas'=>$details['siglas'],
                'trompeta_satelital'=>$details['trompeta_satelital'],
                'trompeta_satelital_esp'=>$details['trompeta_satelital_esp'], 
                'created_at'=>$details['instalacion_satelital'],
                'updated_at'=>$details['instalacion_satelital'],
            ]);

        } else {
            $db = DB::table('trompetasatelital')->where('trompeta_satelital', $details['trompeta_satelital'])->get($columns = ['estacion']);//->first();

            $var = $db;
            $detail = 'trompeta satelital';
        }
        
        if ($var != null) {
            $var1 =implode(", ", $var->pluck('estacion')->toArray());            
        } else {
            $var1 = null;
        }

        // validador y respuesta de las consultas
        if ($detail == null){
            $msj = ["mensaje" => "Componentes registrados exitosamente",];
        } else {
            $msj = ["mensaje" => "Componente ya registrado ".$detail." en ".$var1,];
        }

        $validador = [
            'msj'=>$msj,
            'detail'=>$detail,
            'var'=>$var1,
        ];
        
        return $validador;  
    }
}
