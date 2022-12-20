<?php

namespace App\Http\Controllers;

use App\Models\Estaciones;
use Illuminate\Http\Request;

class EstacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estaciones.index');
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
        $request->validate([
            'longitud'=> 'required|numeric',
            'latitud' => 'required|numeric',
            'altitud' => 'required|numeric',
            'operativa' => 'required|boolean',
            'estado' => 'required|string',
        ]);

        $estacion = new Estaciones;
        
        $estacion->siglas = $request->siglas;
        $estacion->nombre = $request->nombre;
        $estacion->ubicacion = $request->ubicacion;
        $estacion->longitud = $request->longitud;
        $estacion->altitud = $request->altitud;
        $estacion->region = $request->region;
        $estacion->estado = $request->estado;
        $estacion->operativa = $request->operativa;
        $estacion->created_at = $request->created_at;
        $estacion->imagen = $request->imagen;

        $estacion -> save();

        return redirect()->route('estaciones.create')->with('success', 'Estacion creada correctamente');
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
