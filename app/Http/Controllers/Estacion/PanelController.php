<?php
namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
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
        return view('admin.panel.index', compact('estaciones'));
    }



    public function document(Request $request) {
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
        

        return view('admin/panel/document', compact('estaciones'));

    }

    public function documentShow($id) {
        $documentos = [];

        if ((DB::table('link_docs')->where('id_estacion', $id)->get()) != "[]") {
            foreach (DB::table('link_docs')->where('id_estacion', $id)->get() as $document) {
                $documentos[] = $document; 
            }
            // 
            $nombres = $documentos[0];
            return view('admin/panel/show', compact('documentos', 'nombres'));

        } else {

            $nombre = DB::table('estaciones')->where('id', $id)->get();
            $error = $nombre[0]->nombre;
            
            //return response()->json($nombre[0]->nombre);

            return view('layouts.error')->with('mensaje', 'Documentos')->with('error', $error);

        }
        


        
    }

    public function detail(Request $request) {
        $autores = User::all();
        
        if ($request->id == 'all') {
            $details = [];
            foreach (Details::all() as $detail){
                $details[] = $detail;
            }
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores')); 
        
        } elseif ($request->id) {
            $details = [];
            $details = DB::table('details')->where('id', $request->id)->get();            
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores')); 
        
        } else {
            $details = [];
            foreach (Details::all() as $detail){
                $details[] = $detail;
            }
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores'));            
        }
        
        

    }

}