<?php
namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $donde = $nombre[0]->nombre;
            $error = 'documentos';
            
            $message = [
                'id'=>$id,
                'donde'=>$donde,
                'error'=>$error,
            ];
            
            return view('layouts.error')->with('mensaje', $message);
            //return view('layouts.error')->with('mensaje', 'Documentos')->with('error', $error);

        }
        


        
    }
    public function documentDelete(Request $request, $id){
        $id_estacion = $id;
        $nombre = $request->nombre;
        
        // consulta con doble parametro
        $datos = DB::table('link_docs')->where('nombre','=',$nombre, 'and', 'id_estacion', '=', $id_estacion)->first();

        if ($datos != null ) {
            Storage::disk('public')->delete($datos->direccion);
            DB::table('link_docs')->delete($datos->id);

            return redirect()->route('estaciones.index')->with('mensaje', 'Se elimino exitosamente');
        }
        
    }

    public function detail(Request $request) {
        $list2 = [
            'antenagps','antenaparabolica','bateria','controladorcarga', 
            'digitalizador','modemsatelital','panelsolar',
            'reguladorcarga','sismometro','trompetasatelital'
        ];
        
        $autores = User::all();

        if ($request->id == 'all') {
            $details = [];
            foreach (Details::all() as $detail){
                $details[] = $detail;

                foreach ($list2 as $tables) {
                    $autor = DB::table($tables)->where('estacion', '=', $detail->estacion)->first('autor');
                    $autor_detail[] = [$autor ,$tables];
                }
            
            }
            //return response()->json($autor_detail);
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail')); 
        
        } elseif ($request->id) {
            $details = [];
            $details = DB::table('details')->where('id', $request->id)->get();            
            foreach ($list2 as $tables) {
                $autor = DB::table($tables)->where('estacion', '=', $details[0]->estacion)->first('autor');
                $autor_detail[] = [$autor ,$tables];
            }
            
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail')); 
        
        } else {
            $details = [];
            foreach (Details::all() as $detail){
                $details[] = $detail;
                foreach ($list2 as $tables) {
                    $autor = DB::table($tables)->where('estacion', '=', $detail->estacion)->first('autor');
                    $autor_detail[] = [$autor ,$tables];
                }
            }
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail'));            
        }
        
        

    }

}