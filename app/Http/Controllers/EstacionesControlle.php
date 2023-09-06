<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Estaciones;
use App\Models\Link_doc;
use Illuminate\Contracts\Session\Session;
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
            "Seleccione un Estado", "Amazonas", "Anzoátegui",
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
                    $estacion->region = $regionList[$estacion['region']];
                }

            }
            return view('estaciones.index', compact('estaciones'));
            
        } elseif ($buscar == 'all') {
            
            foreach (Estaciones::all() as $estacion) {
                $estaciones[] = $estacion;
                $estacion->estado = $estadosList[$estacion['estado']];
                $estacion->region = $regionList[$estacion['region']];
            }
            return view('estaciones.index', compact('estaciones'));

        } else {

            foreach (Estaciones::all() as $estacion) {
                $estaciones[] = $estacion;
                $estacion->estado = $estadosList[$estacion['estado']];
                $estacion->region = $regionList[$estacion['region']];
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

        $estaciones = new Estaciones;

        $estaciones->id = $request->id;
        $estaciones->siglas = $request->siglas;
        $estaciones->nombre = $request->nombre;
        $estaciones->autor = $request->autor;
        $estaciones->ubicacion = $request->ubicacion;

        if ($request->gms == "on") {
            //                             GRADOS                   Minutos                        Segundos
            $estaciones->longitud = $request->longitud . "º " . $request->longitud1 . '" ' . $request->longitud2 . "'";
            //$estaciones->longitud = $request->longitud;
            $estaciones->latitud = $request->latitud . "º " . $request->latitud1 . '" ' . $request->latitud2 . "'";
            //$estaciones->latitud = $request->latitud;
        } else {
            $estaciones->longitud = $request->longitud;
            $estaciones->latitud = $request->latitud;
        }

        $estaciones->altitud = $request->altitud;
        $estaciones->region = $request->region;
        $estaciones->estado = $request->estado;
        $estaciones->operativa = $request->operativa;
        $estaciones->imagen_n = "sin contenido";
        $estaciones->img_dir = "sin contenido";

        //return response()->json($estaciones);
        //guardado de la imagen
        if ($request->hasFile('imagen_n')) {
            $estaciones->imagen_n = $request->file('imagen_n')->store('uploads/' . $estaciones["nombre"] . '/', 'public');
            $estaciones->img_dir = $estaciones['imagen_n'];
        } else {
            return response()->json($estaciones);
        }

        // rediccion dependiendo de las respuesta ¿subir archivo o no?

        $doc = $request->doc;

        if ($doc == null) {
            // Si subir es igual a null

            $estaciones->save();

            $estacion = Estaciones::findOrFail($estaciones['id']);
            $id = "/" . $estacion['id'];
            //$data = [$id, $doc];

            return redirect()->route("details.index", $id)->with(["mensaje" => "La estación " . $estacion['nombre'] . " creada con exito"]);
        } elseif ($doc == "on") {
            // Si se va a subir archivo

            $estaciones->save();

            $estacion = Estaciones::findOrFail($estaciones['id']);
            $id = "/" . $estacion['id'];
            $data = [$id, $doc];

            return redirect()->route("details.index", $data)->with(["mensaje" => "La estación " . $estacion['nombre'] . " creada con exito"]);
            // --------------------------------------------------
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
        $estacion = Estaciones::findOrFail($id);
        
        // $detail = Details::findOrFail($id);
        $detail = DB::table('details')->where('id', $id)->get();
        
        $link_docs = DB::table('link_docs')->where('id_estacion', $id)->get();


         if ($detail == '[]') {
             $detail = 'Sin resultados';
             }

        $estadosList = [
            "Seleccione un Estado", "Amazonas", "Anzoátegui",
            "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
            "Cojedes", "Delta Amacuro", "Dependencias Federales",
            "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
            "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
            "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
        ];
        $regionList = ["Occidente", "Centro", "Oriente"];
        $operativaList = ["No operativa", "Desintalada", "Vandalizada", "Infraestructura", "Operativa"];

        $estacion->estado = $estadosList[$estacion['estado']];
        $estacion->region = $regionList[$estacion['region']];
        $estacion->operativa = $operativaList[$estacion['operativa']];
        
        //
        // crear un array completo de todos los datos
        
        
        if (($link_docs == "[]") && ($detail=='Sin resultados')) {
            // details and link == null
            $detail = new Details();              //Details::findOrFail(1);
            
             $list = [
                     'antena_gps', 'antena_gps_fab','antena_gps_esp','antena_parabolica','antena_parabolica_fab','antena_parabolica_esp','bateria','bateria_fab','bateria_esp','controlador_carga','controlador_carga_fab', 
                     'controlador_carga_esp','digitalizador','digitalizador_fab','digitalizador_esp','modem_satelital','modem_satelital_fab','modem_satelital_esp','panel_solar','panel_solar_fab','panel_solar_esp',
                     'regulador_carga','regulador_carga_fab','regulador_carga_esp','sismometro','sismometro_fab','sismometro_esp','trompeta_satelital','trompeta_satelital_fab','trompeta_satelital_esp','instalacion_satelital'
             ];
            
             foreach ($list as $item){
                 $detail->$item = ' ';
             }
            
            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));
         
        } elseif (($detail=='Sin resultados') && $link_docs) {  
            //details == null
            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));
        
        } elseif ($detail && ($link_docs == "[]")) { 
            //link == null  
        
            //return response()->json(print_r($detail));
            //aunque parece adsurdo* este pedasito de codigo hace milagro, por algo el blade no agarra datos con where pero si con modelos
            $detail = Details::findOrFail($id);
            //---------------------------------

            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));  
        } elseif ($detail && $link_docs) {
             //completo            
            
            //aunque parece adsurdo* este pedasito de codigo hace milagro, por algo el blade no agarra datos con where pero si con modelos
            $detail = Details::findOrFail($id);
            //---------------------------------

            return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));  
            
        } 
              
        // if ($link_docs == null) {
        //     return view('estaciones.show', compact('estacion', 'detail'));
            
        // }
        // if ($link_docs) {
        //     return view('estaciones.show', compact('estacion', 'detail', 'link_docs'));
            
        // }
        

        //response()->json(print_r($link_docs));
        //redirect()->route('estaciones.show', $estacion);
        //view('estaciones.show', $estacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return response()->json($request);
        $estacion = request()->except(['_token', '_method']);
        // $array = [];
        
        $consulta = Estaciones::where('id', '=', $id)->first();

        //hacer sentencia para controlar cuando vengan mas de dos longitudes y latitudes...
        if ($request->gms == 'on') {
            $longitud = $request->longitud."º ".$request->longitud1.'" '.$request->longitud2."'";
            $latitud = $request->latitud."º ".$request->latitud1.'" '.$request->latitud2."'";
            $estacion['longitud'] = $longitud;
            $estacion['latitud'] = $latitud;

            $objetos = ['gms', 'longitud1', 'longitud2', 'latitud1', 'latitud2'];
            
            foreach ($objetos as $item) {
                unset($estacion[$item]);
            }

            
        }
        //return response()->json($estacion);
        


        $objetos = ["nombre", "siglas", "ubicacion", "longitud", "latitud", "altitud", "region", "operativa", "imagen_n"];
        foreach ($objetos as $item) {
            if (array_key_exists($item, $estacion)) {
                if ($estacion[$item] != '') {
                    //$array[$item] = true;
                    
                    // Ordenar aqui y poner la URL donde se guarda la imagen
                    $imagen_n = $request->imagen_n;
                    $estacion['img_dir'] = $imagen_n;
                    //------------------------------------------------------

                    //guardado de la imagen
                    if ($request->hasFile('imagen_n')) {
                        $db = Estaciones::findOrFail($id);
                        Storage::delete('public/' . $db->img_dir);

                        $estacion['imagen_n'] = $request->file('imagen_n')->store('uploads/' . $estacion["nombre"] . '/', 'public');

                    }               
                } else {
                    $estacion[$item] = $consulta[$item];

                }

            } else {
                $estacion[$item] = $consulta[$item];

                //$array[$item] = false;

            }
        }
        $estacion['img_dir'] = $estacion['imagen_n'];       
       
        
        //return response()->json($estacion);
        Estaciones::where('id', '=', $id)->update($estacion);
       
        return redirect()->route("estaciones.index")->with(["mensaje" => "Estación actualizada",]); //response()->json($estacion);//



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = Estaciones::findOrFail($id);
        Storage::delete('public/' . $db->img_dir);
        Storage::delete('public/uploads/' . $db->nombre);

        Estaciones::destroy($id);
        Details::destroy($id);
       
        $list = [
            'antenagps','antenaparabolica','bateria','controladorcarga', 
            'digitalizador','modemsatelital','panelsolar',
            'reguladorcarga','sismometro','trompetasatelital'
        ];
        foreach ($list as $table) {
            DB::table($table)->delete($id);
        }
        

        return redirect()->route("estaciones.index")->with(["mensaje" => "Estación Eliminada con exito",]);
    }

    public function mapa()
    {
        return view('estaciones/mapa');
    }

    // public function vistaDoc($id)
    // {   
    //     return view('estaciones/updateDoc');
    // }
    public function updateDoc(Request $request, $id)
    {
        // verificar el $id
        Estaciones::where('id', '=', $id);
    }
}
