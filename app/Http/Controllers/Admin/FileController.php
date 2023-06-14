<?php

namespace App\Http\Controllers\Admin;

use App\Models\Estaciones;
use App\Http\Controllers\Controller;
use App\Models\Link_doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $id = $_SERVER['REQUEST_URI'];
        $id1 = str_replace("update", "", $id);
        $id = str_replace("//", "", $id1);

        return view('estaciones.update', compact("id"));

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
        
        foreach ($lista[0] as $value) {
            if ($estaciones && $request->hasFile($value)) {

                
                
                $direccion = $request->file($value)->store('uploads/'.$estaciones["nombre"].'/'.'doc/', 'public');
                
                $documento = new Link_doc;
                $documento->id_estacion = $estaciones["id"];
                $documento->nombre_estacion = $estaciones["nombre"];
                $documento->direccion = $direccion;
                $documento->save();

                $data[] = "ok";
              } else {
                $data[] = "no";
              }

             $data[] = $value;
        }

       
        
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
