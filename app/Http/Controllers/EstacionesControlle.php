<?php

namespace App\Http\Controllers;

use App\Models\Estaciones;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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
        $estaciones->longitud = $request->longitud;
        $estaciones->latitud = $request->latitud;
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
        }

        //return response()->json($estaciones); 
        
        if ($request->doc == null){
            $estaciones->save();
            
            return redirect()->route("estaciones.index")->with(["mensaje" => "Creada con exito",]);

        } elseif ($request->doc == "on") {
            $estaciones->save();  

            //se crear la carpeta a partir del nombre
            return redirect()->route("update", compact('estaciones'))->with(["mensaje" => "Creada con exito",]);

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
        //aqui hacer una plantilla igual al registro, donde los campos carguen el contenido anterior para visualizar y el nuevo para reemplazar
        $estaciones = Estaciones::findOrFail($id);

        return view('estaciones.edit', compact('estaciones'));
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
        
        Estaciones::destroy($id);
        return redirect()->route("estaciones.index")->with(["mensaje" => "Estación Eliminada con exito",]);
    }

    public function mapa()
    {
        return view('estaciones/mapa'); 
    }

    public function vistaDoc($id)
    {   
        return view('estaciones/updateDoc');
    }
    public function updateDoc(Request $request, $id){
        // verificar el $id
        Estaciones::where('id', '=', $id);

    }
}
