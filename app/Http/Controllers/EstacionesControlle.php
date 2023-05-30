<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Estaciones;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\ElasticaHandler;

class EstacionesControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estaciones = [];

        foreach (Estaciones::all() as $estacion) {
            $estaciones[] = $estacion;
        }
        if ($estaciones==[]) {
            $estaciones = [];
            //echo $estaciones;
        }

        return view('estaciones.index', compact('estaciones'));
        
 
        
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
        $estaciones->ubicacion = $request->ubicacion;
        
        if ($request->gms == "on"){
            //                             GRADOS                   Minutos                        Segundos
            $estaciones->longitud = $request->longitud . "º " . $request->longitud1 . '" ' . $request->longitud2 . "'";
            //$estaciones->longitud = $request->longitud;
            $estaciones->latitud = $request->latitud. "º ". $request->latitud1 . '" ' . $request->latitud2 . "'";
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

        //guardado de la imagen
        if ($request->hasFile('imagen_n')) {
            $estaciones->imagen_n=$request->file('imagen_n')->store('uploads/'.$estaciones["nombre"].'/', 'public');
            $estaciones->img_dir=$estaciones['imagen_n'];
        } else {
            return response()->json($estaciones);
        }

        //return response()->json($estaciones); 
        
        if ($request->doc == null){
            $estaciones->save();
            
            $estacion = Estaciones::findOrFail($estaciones['id']);
            
            $id  = $estacion['id'];
            $id = "/".$id;
            //compact('id')
            return redirect()->route("details.index", $id)->with(["mensaje" => "Creada con exito",]);

        } elseif ($request->doc == "on") {
            
            $estaciones->save();  
            
            $estacion = Estaciones::findOrFail($estaciones['id']);
            
            $id  = $estacion['id'];

            //se crear la carpeta a partir del nombre  compact('estaciones')
            return redirect()->route("update",compact('id'))->with(["mensaje" => "Creada con exito",]);

            //se guardan los documentos

            //se redirige a la paginaprincipal
            
        } else {
            return redirect()->route("estaciones.index")->with(["mensaje" => "No se guardo la estación",]);
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
        // crear un array completo de todos los datos
        return view('estaciones.show',compact('estacion')); 
        //response()->json($estacion);
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
        $estacion = request()->except(['_token', '_method']);      

        // Ordenar aqui y poner la URL donde se guarda la imagen
        $imagen_n = $request->imagen_n;
        $estacion['img_dir'] = $imagen_n;
        //------------------------------------------------------

        //guardado de la imagen
        if ($request->hasFile('imagen_n')) {
            $db = Estaciones::findOrFail($id);
            Storage::delete('public/'.$db->img_dir);

            $estacion['imagen_n']=$request->file('imagen_n')->store('uploads/'.$estacion["nombre"].'/', 'public');
            $estacion['img_dir']=$estacion['imagen_n'];
        }
        
     

        
        
        Estaciones::where('id', '=', $id)->update($estacion);



        return redirect()->route("estaciones.index")->with(["mensaje" => "Estación actualizada",]);//response()->json($estacion);//


    
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
        Storage::delete('public/'.$db->img_dir);
        Storage::delete('public/uploads/'.$db->nombre);
        
        Estaciones::destroy($id);
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
    public function updateDoc(Request $request, $id){
        // verificar el $id
        Estaciones::where('id', '=', $id);

    }
}