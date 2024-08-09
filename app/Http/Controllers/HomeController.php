<?php

namespace App\Http\Controllers;

use App\Models\Estaciones;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estaciones = [];

        $Data = Estaciones::select('id', 'siglas', 'nombre', 'custodio', 'ubicacion', 'estado', 'latitud', 'longitud', 'operativa', 'imagen_n')->get();

        foreach ($Data as $estacion) {
            $estaciones[] = $estacion;
            $estadosList = [
                "Seleccione un Estado", "Amazonas", "Anzoátegui",
                "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
                "Cojedes", "Delta Amacuro", "Dependencias Federales",
                "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
                "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
                "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
            ];
            $regionList = ["Occidente", "Centro", "Oriente"];

            $estacion->estado = $estadosList[$estacion['estado']+1];

        }
        if ($estaciones == []) {
            $estaciones = [];
            //echo $estaciones;
        }

        

        //return response()->json($estaciones);
        return view('home', compact('estaciones'));

    }
}
