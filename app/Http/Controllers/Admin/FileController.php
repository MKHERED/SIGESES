<?php

namespace App\Http\Controllers\Admin;

use App\Models\Estaciones;
use App\Http\Controllers\Controller;
use App\Models\Link_doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
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
        $id1 = str_replace("update", "", $id);
        $id = str_replace("//", "", $id1);
        
        if (Auth::user()->tipo_usuario == 1) {
            return view('estaciones.update', compact("id"));            
        } else {
            return redirect()->route('estaciones.show', $id)->with('mensaje', 'Usted no tiene permiso de subir documentos');
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $estaciones = Estaciones::findOrFail($id);

        $lista[] = explode(' ', $request->list);             //$request->list;
        

        //return response()->json($request->file('files0'));

        foreach ($lista[0] as $value) {
            if ($estaciones && $request->hasFile($value)) {

                
                
                $direccion = $request->file($value)->store('uploads/'.$estaciones["nombre"].'/'.'doc/', 'public');
                
                $file = $request->file($value);
                $documento = new Link_doc;
                $documento->id_estacion = $estaciones["id"];
                $documento->nombre = time().'_'.$file->getClientOriginalExtension();
                $documento->nombre_estacion = $estaciones["nombre"];
                
                
                if (strpos($direccion, '.bin')) {
                    $newPath = str_replace('.bin', '.docx', $direccion);
                    
                    $documento->direccion = $newPath;
                    
                    if (Storage::exists($direccion)) {
                        rename($direccion, $newPath);
                    
                    }

                } else {
                    $documento->direccion = $direccion;  
                }
                $documento->save();


                
                

                $data[] = "ok";
              } else {
                $data[] = "no";
              }

             $data[] = $value;
        }

       
        //return response()->json(print_r($documento));
        return redirect()->route("estaciones.index")->with(["mensaje" => "Se subieron exitosamente los documentos",]); //response()->json($estacion);//
        
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
        //
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
