<?php
namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                    $updated = DB::table($tables)->where('estacion', '=', $detail->estacion)->first('updated_at');

                    $autor_detail[] = [$autor, $tables];
                    $updated_detail[] = [$updated, $tables];
                }
            
            }
            //return response()->json($updated_detail[0][0]->updated_at);
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail', 'updated_detail')); 
        
        } elseif ($request->id) {
            $details = [];
            $details = DB::table('details')->where('id', $request->id)->get();            
            foreach ($list2 as $tables) {
                $autor = DB::table($tables)->where('estacion', '=', $details[0]->estacion)->first('autor');
                $updated = DB::table($tables)->where('estacion', '=', $details[0]->estacion)->first('updated_at');
                
                $autor_detail[] = [$autor ,$tables];
                $updated_detail[] = [$updated, $tables];

            }
            
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail', 'updated_detail')); 
        
        } else {
            $details = [];
            $autor_detail = [];
            $updated_detail = [];
            foreach (Details::all() as $detail){
                $details[] = $detail;
                foreach ($list2 as $tables) {
                    $autor = DB::table($tables)->where('estacion', '=', $detail->estacion)->first('autor');
                    $updated = DB::table($tables)->where('estacion', '=', $detail->estacion)->first('updated_at');
                    
                    $autor_detail[] = [$autor ,$updated];
                    $updated_detail[] = [$updated, $tables];

                }
            }
            $options = Details::all();
            return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail', 'updated_detail'));            
        }
        
        

    }

    public function user(Request $request){
        
        //return view('admin/panel/detail', compact('details', 'options', 'autores', 'autor_detail', 'updated_detail')); 

        if ($request->nombre && $request->id) {
            
            if ($request->password != null) {
                $id = $request->id;
                $User = DB::table('users')->where('id','=', $id)->first(['name', 'username', 'cedula', 'email', 'password', 'tipo_usuario']);
    
                $User->name = $request->nombre;
                $User->username = $request->user;
                $User->cedula = $request->cedula;
                $User->email = $request->correo;
                
                $cont = Hash::make($request->password);
                
                $User->password = $cont;
                $User->tipo_usuario = $request->tipo;
    
                $array = json_decode(json_encode($User), true);
    
                DB::table('users')->where('id','=', $id)->update($array);

            } else {
                $id = $request->id;
                $User = DB::table('users')->where('id','=', $id)->first(['name', 'username', 'cedula', 'email', 'tipo_usuario']);
    
                $User->name = $request->nombre;
                $User->username = $request->user;
                $User->cedula = $request->cedula;
                $User->email = $request->correo;
                $User->tipo_usuario = $request->tipo;
    
                $array = json_decode(json_encode($User), true);
    
                DB::table('users')->where('id','=', $id)->update($array);
                
                //return response()->json($User);
            }

            $request->except('id', 'nombre', 'user', 'cedula', 'correo', 'tipo');
    
            //-------------------- de vuelta a la vista
            
            $var = User::get();
            
            $array = json_decode(json_encode($var), true);
            
                for ($i=0; $i <= ( count($array)-1 ) ; $i++) { 
                    $is_root = array_search('Root', $array[$i]);
                    if($is_root){
                        unset($array[$i]);
                        break;  
                    }
                }
            
            return view('admin/panel/usuarios', compact('array')); 
            

        } else {
            $var = User::get();
            
            $array = json_decode(json_encode($var), true);
            
                for ($i=0; $i <= ( count($array)-1 ) ; $i++) { 
                    $is_root = array_search('Root', $array[$i]);
                    if($is_root){
                        unset($array[$i]);
                        break;  
                    }
                }
            
            return view('admin/panel/usuarios', compact('array')); 
        }
        //return response()->json($request);
        
  
    }

    public function userDelete($id){
        
        User::destroy($id);
        
        return redirect()->route('panel.user');
    }

}