<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Estaciones;
use App\Models\Link_doc;
use App\Models\Visitas;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Monolog\Handler\ElasticaHandler;

class EstacionesControlle extends Controller
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
        $buscar = $request->buscador;
        //return response()->json($request);
        $estaciones = [];
        $estadosList = [
            "Amazonas", "Anzoátegui",
            "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
            "Cojedes", "Delta Amacuro", "Dependencias Federales",
            "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
            "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
            "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
        ];
        
        $regionList = ["Occidente", "Centro", "Oriente"];
        
        if ($buscar != 'all') {
            $estaciones[] = Estaciones::where('siglas', '=', $buscar)->first();
            
            if ($estaciones == [null]) {
                $estaciones = [];

                foreach (Estaciones::all() as $estacion) {
                    $estaciones[] = $estacion;
                    $estacion->estado = $estadosList[$estacion['estado']];
                }

            }
            return view('estaciones.index', compact('estaciones'));
            
        } elseif ($buscar == 'all') {
            
            foreach (Estaciones::all() as $estacion) {
                $estaciones[] = $estacion;
                $estacion->estado = $estadosList[$estacion['estado']];

            }
            return view('estaciones.index', compact('estaciones'));

        } else {

            foreach (Estaciones::all() as $estacion) {
                $estaciones[] = $estacion;
                $estacion->estado = $estadosList[$estacion['estado']];

            }
            return view('estaciones.index', compact('estaciones'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estaciones.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $estacion = new Estaciones;

        if ($request->gms == "on") {
            //                             GRADOS                   Minutos                        Segundos
            $request['longitud'] = $request->longitud . "º " . $request->longitud1 . '" ' . $request->longitud2 . "'";
            //$estaciones->longitud = $request->longitud;
            $request['latitud'] = $request->latitud . "º " . $request->latitud1 . '" ' . $request->latitud2 . "'";
            //$estaciones->latitud = $request->latitud;
        } else {
            $estacion->longitud = $request->longitud;
            $estacion->latitud = $request->latitud;
        }

        $estacion->fill($request->except('imagen_n', '_token'));
        
        //guardado de la imagen
        if ($request->hasFile('imagen_n')) {
            $estacion->imagen_n = $request->file('imagen_n')->store('uploads/' . $estacion["nombre"] . '/', 'public');
            $estacion->img_dir = $estacion['imagen_n'];
        } else {
            $estacion->imagen_n = "sin contenido";
            $estacion->img_dir = "sin contenido"; 
            //return response()->json($estacion);
        }

        // rediccion dependiendo de las respuesta ¿subir archivo o no?


        $doc = $request->doc;

        if ($doc == null) {
            // Si subir es igual a null

            $estacion->save();

            $estacion = Estaciones::find($estacion->id);
            if ($estacion) {
                $id = $estacion->id; 
                return redirect()->route("details.index", $id)->with(["mensaje" => "La estación " . $estacion['nombre'] . " creada con exito"]);

            } else {
                return redirect()->route('estaciones.create')->with('mensaje', 'tiene valores que no pueden estar vacios');
            }
            
        } elseif ($doc == "on") {
            // Si se va a subir archivo

            $estacion->save();

            $estacion = Estaciones::find($estacion->id);
            if ($estacion) {
                $id = $estacion->id; 
                return redirect()->route("details.index",$id)->with(["mensaje" => "La estación " . $estacion['nombre'] . " creada con exito"]);

            } else {
                return redirect()->route('estaciones.create')->with('mensaje', 'tiene valores que no pueden estar vacios');
                
            }

            // --------------------------------------------------
        }

        return response()->json($estacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estacion = Estaciones::find($id);
        $detail = Details::find($id);
        $link_docs = Link_doc::orderBy('created_at', 'DESC')->where('id_estacion','=',$id)->get();
        // $link_docs = DB::table('link_docs')->where('id_estacion', $id)->get();


         if ($detail == '') {
             $detail = 'Sin resultados';
             }

        $estadosList = [
            "Amazonas", "Anzoátegui",
            "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
            "Cojedes", "Delta Amacuro", "Dependencias Federales",
            "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
            "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
            "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
        ];



        $estacion->estado = $estadosList[$estacion['estado']];

        if ($estacion && ($detail == 'Sin resultados') || $link_docs) {
            if ($detail == 'Sin resultados') {
                $detail = new Details;
                
                $list = [ 'transceptor_marca','transceptor_modelo','transceptor_serial','transceptor_fecha','digitalizador_marca','digitalizador_modelo','digitalizador_serial','digitalizador_fecha',
                            'sensor_marca','sensor_modelo','sensor_serial','sensor_fecha','BUC_marca','BUC_modelo','BUC_serial','BUC_fecha',
                            'LNB_marca','LNB_modelo','LNB_serial','LNB_fecha','antena_gps_marca','antena_gps_modelo','antena_gps_serial','antena_gps_fecha','regulador_voltaje_marca','regulador_voltaje_modelo',
                            'regulador_voltaje_serial','regulador_voltaje_watts','regulador_voltaje_fecha','banco_baterias_marca','banco_baterias_modelo','banco_baterias_serial','banco_baterias_watts','banco_baterias_cantidad',
                            'banco_baterias_fecha','panel_solar_a_marca','panel_solar_a_modelo','panel_solar_a_serial','panel_solar_a_watts','panel_solar_a_fecha','panel_solar_b_marca','panel_solar_b_modelo','panel_solar_b_serial','panel_solar_b_watts',
                            'panel_solar_b_fecha','panel_solar_c_marca','panel_solar_c_modelo','panel_solar_c_serial','panel_solar_c_watts','panel_solar_c_fecha','panel_solar_d_marca','panel_solar_d_modelo','panel_solar_d_serial','panel_solar_d_watts',
                            'panel_solar_d_fecha','panel_solar_e_marca','panel_solar_e_modelo','panel_solar_e_serial','panel_solar_e_watts','panel_solar_e_fecha'
                        ];                
                
                foreach ($list as $item){
                    $detail->$item = ' ';                
                }            

            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));
         
        } elseif ($estacion && !($detail == 'Sin resultados') || $link_docs) {

            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));

         }




    }
}

    public function edit($id)
    {
        //aqui hacer una plantilla igual al registro, donde los campos carguen el contenido anterior para visualizar y el nuevo para reemplazar
        

        if (Auth::user()->tipo_usuario == 1) {
            $estaciones = Estaciones::findOrFail($id);
            $sigla = $estaciones['siglas'];
            $details = DB::table('details')->where('siglas', $sigla)->first();

            if ($details) {
                // cambiar componente
                $validador = 'cambiar';
            } else {
                // agregar los componentes
                $validador = 'agregar';
            }
            return view('estaciones.edit', compact('estaciones', 'validador'));
        } else {
            return redirect()->route('estaciones.index')->with('mensaje', 'Usted no tiene permiso de subir documentos');
        }
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
        $estacion = Estaciones::find($id);
        $respaldo = json_decode(json_encode($estacion), true);

        define('RESPALDO', $respaldo);
        if ($estacion) {
 
           

            if ($request->gms == "on") {
                //                             GRADOS                   Minutos                        Segundos
                $request['longitud'] = $request->longitud . "º " . $request->longitud1 . '" ' . $request->longitud2 . "'";
                //$estaciones->longitud = $request->longitud;
                $request['latitud'] = $request->latitud . "º " . $request->latitud1 . '" ' . $request->latitud2 . "'";
                //$estaciones->latitud = $request->latitud;

                $cambios = request()->except('_method', '_token', 'gms', 'latitud1', "latitud2", "longitud1", "longitud2");
            } else {
                $estacion->longitud = $request->longitud;
                $estacion->latitud = $request->latitud;
                $cambios = request()->except('_method', '_token', 'gms');
            }
            


            if ($cambios["longitud"] == "") {
                $cambios["longitud"] = RESPALDO['longitud'];
            }
            if ($cambios["latitud"] == "") {
                $cambios["latitud"] = RESPALDO['latitud'];
            }
            //return response()->json($cambios); 
               

            //$cambios = request()->except('_method', '_token', 'gms');

            if ($request->hasFile('imagen_n')) {
                $cambios['imagen_n'] = $request->file('imagen_n')->store('uploads/' . $estacion["nombre"] . '/', 'public');
            }

            $cambios = json_decode(json_encode($cambios), true);
            Estaciones::where('id', '=', $estacion->id)->update($cambios);

            return redirect()->route('estaciones.show', $id)->with('mensaje', 'Se actualizaron los datos correctamente');

        } else {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $db = Estaciones::findOrFail($id);
        Storage::delete('public/' . $db->img_dir);
        Storage::delete('public/uploads/' . $db->nombre);

        Estaciones::destroy($id);
        Details::destroy($id);

        return redirect()->route('panel.index');
       /*  return redirect()->route("estaciones.index")->with(["mensaje" => "Estación Eliminada con exito",]); */
    }

    public function mapa(){
        return view('estaciones/mapa');
    }

    // public function vistaDoc($id)
    // {   
    //     return view('estaciones/updateDoc');
    // }

    public function visita(Request $request, $id){

        $estacion = Estaciones::where('id', '=' , $id)->first();

        $visitas = Visitas::orderBy('created_at','DESC')->where('estacion', '=' ,$estacion->nombre)->get(['id','created_at']);

        
        if ($visitas == []) {
            $visitas = 'Sin valores';
        } else {
            $visitas = $visitas;
        }


       // return response()->json([$visitas, $estacion, $id, $request->id]);

        return view('estaciones.visitas.visita', compact('id', 'visitas', 'estacion'));
    }
    public function visitas(Request $request, $id, $fecha) {
        $estacion =  Estaciones::where('id', '=' , $id)->first();

        $visit = Visitas::where('id','=', $request->idv, 'and', 'estacion', '=', $estacion->nombre, 'and' ,'created_at', '=', $fecha)->first();
        $link_docs = Link_doc::where('direccion', '=', $visit->direccion)->first();
        
        $estadosList = [
            "Amazonas", "Anzoátegui",
            "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
            "Cojedes", "Delta Amacuro", "Dependencias Federales",
            "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
            "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
            "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
        ];

        $visit->estado = $estadosList[$estacion['estado']];
        
        $visitas = Visitas::orderBy('created_at','DESC')->where('estacion', '=' ,$estacion->nombre)->get(['id','created_at']);

        if ($visitas == []) {
            $visitas = 'Sin valores';
        } else {
            $visitas = $visitas;
        }

        //return response()->json($visit);
        
        return view('estaciones.visitas.visita', compact('id', 'visitas', 'visit','estacion', 'link_docs'));
        
        

    }

    public function visitasRegist(Request $request, $id){
        $visita = new Visitas;

        $estacion = Estaciones::where('siglas', '=', $request->siglas)->first();
        $request['estacion'] = $estacion->nombre;
        $visita->fill($request->except('_token'));
        
        
        if ($request->hasFile('imagen_n')) {
            
            $file = $request->file('imagen_n');
             
            $ruta = $file->store('uploads/' . $estacion->nombre . '/', 'public');
            
            $visita->direccion = $ruta;
            //return response()->json([$visita, $ruta, $file]);

            $documento = new Link_doc;
            $documento->id_estacion = $estacion->id;
            $documento->nombre = time().'_'.$file->getClientOriginalExtension();
            $documento->nombre_estacion = $estacion->nombre;
            $documento->direccion = $ruta;

            $documento->save();
        } else {
            $visita->direccion = "sin valor";
        }

     

         $detail = Details::where('siglas', '=', $request->siglas)->first();

         if (!(isset($detail->siglas))) {
            $detail = new Details;
            $detail->fill($request->except('_token'));
            $detail->save();

            
         } else {


            $cambios = json_decode(json_encode($request->except(
                '_token', '_method','operadores','custodio',
                'tlf_custodio','trabajo','frecuencia','nivel',
                'seg_satelital','asig_frecuencia','carina',
                'ubicacion','estado','municipio','longitud',
                'latitud','elevacion','azimut','imagen_n')), true);

            $detail = json_decode(json_encode($detail),true);

            
            foreach ($cambios as $key2 => $value2){
                #actualiza los cambios
                if($cambios[$key2] != ''){
                    $detail[$key2] = $value2;
                }
            }
            unset($detail['updated_at']);

            //return response()->json($request);
          
            Details::where('siglas', '=', $request->siglas)->update($detail);
           

           
         }
        $visita->save();
         
         

         return redirect()->route('estaciones.visita', $id);

    }

    public function visitasEdit(Request $request, $id ,$idv){
        $visit = Visitas::where('id', '=', $idv)->first();
        $estacion =  Estaciones::where('siglas', '=' , $visit->siglas)->first();
        $link_docs = Link_doc::where('direccion', '=', $visit->direccion)->first();
        $visitas = Visitas::orderBy('created_at','DESC')->where('estacion', '=' ,$estacion->nombre)->get(['id','created_at']);


        $estadosList = [
            "Amazonas", "Anzoátegui",
            "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
            "Cojedes", "Delta Amacuro", "Dependencias Federales",
            "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
            "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
            "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
        ];

        $visit->estado = $estadosList[$estacion['estado']];

        if ($visitas == []) {
            $visitas = 'Sin valores';
        } else {
            $visitas = $visitas;
        }

        return view('estaciones.visitas.visita-edit', compact('id', 'visitas', 'visit','estacion', 'link_docs', 'idv'));

    }

    
    public function visitasUpdate(Request $request, $id, $idv){
        $cambios = request()->except('_method', '_token');
        $cambios = json_decode(json_encode($cambios), true);
        $visit = Visitas::where('id', '=', $idv)->update($cambios);
        


        $detail = Details::where('siglas', '=', $request->siglas)->first();

        if (!(isset($detail->siglas))) {
           $detail = new Details;
           $detail->fill($request->except('_token'));
           $detail->save();
        } else {
           $cambios = json_decode(json_encode($request->except(
               '_token', '_method','operadores','custodio',
               'tlf_custodio','trabajo','frecuencia','nivel',
               'seg_satelital','asig_frecuencia','carina',
               'ubicacion','estado','municipio','longitud',
               'latitud','elevacion','azimut','imagen_n')), true);

           $detail = json_decode(json_encode($detail),true);

           
           foreach ($cambios as $key2 => $value2){
               #actualiza los cambios
               if($cambios[$key2] != ''){
                   $detail[$key2] = $value2;
               }
           }
           unset($detail['updated_at']);
           unset($detail['id']);
           Details::where('siglas', '=', $request->siglas)->update($detail);          
        }


        return $this->visitas($request ,$id, $request['created_at']);
        //return response()->json($cambios);
    }

    //revisar esta dando errores con el id
    public function visitasDelete($id, $idv){
        
        //vista a eliminar
        $vAnterior = Visitas::where('id', '=', $idv)->first();

        //visita a reemplazar con estos datos
        $request = Visitas::orderBy('created_at','DESC')->where('siglas', '=', $vAnterior->siglas)->offset(1)->limit(1)->first();
        $vReemplazo = $request;
        $detail = Details::where('siglas', '=', $request->siglas)->first();

        if (!(isset($detail->siglas))) {
            $detail = new Details;
            $detail->fill($request->except('_token'));
            $detail->save();
         } else {
            $remove = ['operadores', 'custodio' , 'tlf_custodio', 'trabajo', 
                        'frecuencia', 'nivel', 'seg_satelital', 'asig_frecuencia', 
                        'carina', 'ubicacion', 'estado', 'municipio', 'longitud', 
                        'latitud', 'elevacion', 'azimut', 'imagen_n', 'direccion','id' 
                        ];
            
            foreach ($remove as $value) {
                unset($request->$value);
            }

            $cambios = json_decode(json_encode($request), true);
            $detail = json_decode(json_encode($detail),true);
 
            
            foreach ($cambios as $key2 => $value2){
                #actualiza los cambios
                if($cambios[$key2] != ''){
                    $detail[$key2] = $value2;
                }
            }
            unset($detail['updated_at']);
            unset($detail['created_at']);
            unset($detail['id']);
            //return response()->json($cambios);

            Details::where('siglas', '=', $request->siglas)->update($detail);          
         }
         //$request = json_decode(json_encode($vReemplazo), true);

         return redirect()->route('estaciones.visita', ['id' => $id]);
    }
}
