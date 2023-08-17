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

        foreach (Estaciones::all() as $estacion) {
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

            $estacion->estado = $estadosList[$estacion['estado']];
            $estacion->region = $regionList[$estacion['region']];
        }
        if ($estaciones == []) {
            $estaciones = [];
            //echo $estaciones;
        }
        
        return view('home', compact('estaciones'));

    }
}
