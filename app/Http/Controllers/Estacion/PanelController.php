<?php
namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use App\Models\Details;
use App\Models\Visitas;
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
        // return response()->json($request);
        $estaciones = [];

        foreach (Estaciones::all() as $estacion) {
            $estaciones[] = $estacion;
            $estadosList = [
                "Amazonas", "Anzoátegui",
                "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
                "Cojedes", "Delta Amacuro", "Dependencias Federales",
                "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
                "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
                "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
            ];
            $regionList = ["Occidente", "Centro", "Oriente"];

            $estacion->estado = $estadosList[$estacion['estado']];

        }
        if ($estaciones == []) {
            $estaciones = [];
            //echo $estaciones;
        }
        //return response()->json($estacion);
        return view('admin.panel.index', compact('estaciones'));
    }



    public function document(Request $request) {
        $estaciones = [];

        foreach (Estaciones::all() as $estacion) {
            $estaciones[] = $estacion;
            $estadosList = [
                "Amazonas", "Anzoátegui",
                "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
                "Cojedes", "Delta Amacuro", "Dependencias Federales",
                "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
                "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
                "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
            ];
            $regionList = ["Occidente", "Centro", "Oriente"];

            $estacion->estado = $estadosList[$estacion['estado']];

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
            
            return redirect()->route('panel.show', $id);
/*             return redirect()->route('estaciones.index')->with('mensaje', 'Se elimino exitosamente');
 */        }
        
    }

    public function detail(Request $request) {
        $item = 'all';
        $DB = Details::all();
        $details = [];
        //$autores = [];
        //$autor_detail = [];
        //$updated_detail = [];
        foreach ($DB as $detail){
            $autor = $detail->autor;
            $autor = User::where('id', '=', $autor)->first('name');
            $detail->autor = $autor['name'];
            $details[] = $detail;
        }

        return view('admin/panel/detail', compact('item', 'details')); 
    }

    public function filtro($item, $Base){
            
            $serial = $item.'serial';
            $marca = $item.'marca';
            $modelo = $item.'modelo';
            $fecha = $item.'fecha';
            
            if ($item == "BUC_" || $item == "LNB_") {
                $frecuencia = $item.'frecuencia';
                if ($item == "LNB_") {
                    $banda = $item.'banda';
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, $frecuencia, $banda,'autor', 'updated_at')->get();
                } else {
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, $frecuencia,'autor', 'updated_at')->get();
                }
            } elseif ($item == "trompeta_" || $item == "parabolica_"){
                if ($item == "parabolica_") {
                    $diametro = $item.'diametro';
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $fecha, $diametro,'autor', 'updated_at')->get();
                } else {
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $fecha,'autor', 'updated_at')->get();
                }
            } elseif ($item == "sensor_") {
                $sensor= $item.'sen';
                $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, $sensor,'autor', 'updated_at')->get();
            } elseif ($item == 'regulador_voltaje_' || $item == 'banco_baterias_' || $item == 'panel_solar_') {
                $watts = $item.'watts';
                if ($item == 'banco_baterias_') {
                    $cantidad = $item.'cantidad';
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, $cantidad, $watts,'autor', 'updated_at')->get();
                }elseif ($item == 'panel_solar_') {
                    $DB = $Base::select('id', 'estacion', $item.'a_serial',  $item.'a_marca',  $item.'a_modelo',  $item.'a_fecha',  $item.'a_watts',  
                                                             $item.'b_serial',  $item.'b_marca',  $item.'b_modelo',  $item.'b_fecha',  $item.'b_watts', 
                                                             $item.'c_serial',  $item.'c_marca',  $item.'c_modelo',  $item.'c_fecha',  $item.'c_watts',
                                                             $item.'d_serial',  $item.'d_marca',  $item.'d_modelo',  $item.'d_fecha',  $item.'d_watts',
                                                             $item.'e_serial',  $item.'e_marca',  $item.'e_modelo',  $item.'e_fecha',  $item.'a_watts',
                                                             'autor', 'updated_at')->get();

                } else {
                    $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, $watts,'autor', 'updated_at')->get();
                }
            } else {
                $DB = $Base::select('id', 'estacion', $serial, $marca, $modelo, $fecha, 'autor', 'updated_at')->get();                
            }
            
            $lista = ['modelo', 'watts', 'diametro', 'frecuencia', 'banda', 'sensor', 'cantidad'];
            
            $retorno = [$DB, $serial, $marca, $fecha];
            foreach ($lista as $key) {
                if (isset($$key)) {
                    $retorno[$key] = $$key;
                }
            }
            return $retorno;
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

    public function buscar(Request $request) {
        $buscar = $request->buscar;
        $seccion = $request->seccion;

        //return response()->json($seccion);

        if ($buscar == null) {
            return redirect()->route('panel.index');            
        } elseif ($seccion == 'Estaciones' || $seccion == '') {
            $estaciones = Estaciones::where('nombre','like',"%$buscar%")->get();
            if ($estaciones == '[]') {
                $mensaje = 'lo sentimos no encontramos una estación sismologica con ese nombre';
                return view('admin.panel.index', compact('mensaje', 'estaciones', 'buscar')); 
            }
            return view('admin.panel.index', compact('estaciones', 'buscar'));

        } elseif ($seccion == 'Documentos') {
            //return response()->json($seccion);
            $estaciones = Estaciones::where('nombre','like',"%$buscar%")->get();
            if ($estaciones == '[]') {
                $mensaje = 'Lo sentimos no encontramos una estación sismologica con ese nombre';
                return view('admin.panel.document', compact('mensaje', 'estaciones', 'buscar')); 
            }
            return view('admin.panel.document', compact('estaciones', 'buscar', 'seccion'));
        } elseif ($seccion == 'Usuarios') {
            $array = User::where('name', 'like', "%$buscar%")->get();
            if ($array == '[]') {
                $mensaje = 'Lo sentimos no encontramos un usuario con ese nombre';
                return view('admin.panel.usuarios', compact('mensaje', 'array', 'buscar', 'seccion')); 
            }
            return view('admin.panel.usuarios', compact('array', 'buscar', 'seccion'));
        }
        

    }

    public function userDelete($id){
        
        User::destroy($id);
        
        return redirect()->route('panel.user');
    }

    public function excel(Request $request){
        $estaciones = [];

        foreach (Estaciones::all() as $estacion) {
            $estaciones[] = $estacion;
            $estadosList = [
                "Amazonas", "Anzoátegui",
                "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo",
                "Cojedes", "Delta Amacuro", "Dependencias Federales",
                "Distrito Federal", "Falcón", "Guárico", "Lara", "Mérida",
                "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre",
                "Táchira", "Trujillo", "Vargas", "Yaracuy", "Zulia"
            ];
            $regionList = ["Occidente", "Centro", "Oriente"];

            $estacion->estado = $estadosList[$estacion['estado']];

        }
        if ($estaciones == []) {
            $estaciones = [];
            //echo $estaciones;
        }
        return view('excel', compact('estaciones'));
    }
}
