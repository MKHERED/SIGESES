<?php

namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Estaciones;
use finfo;
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

        $details->save();

        return redirect()->route("estaciones.index")->with(["mensaje" => "Se agregaron correctamente los componentes",]);

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
}
