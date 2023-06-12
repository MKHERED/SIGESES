<?php

namespace App\Http\Controllers\Admin;

use App\Models\Estaciones;
use App\Http\Controllers\Controller;
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
        $list = [];
        // $request->validate(['file' => 'required',
        //                     'file' => 'max:12288',
        //                     'file' => 'mimes:png,jpg']);
        
        // foreach ($request->file('file') as $file) {
        //      $list[] = $file;
        //  }
        //     $request->validate([
        //         'file' => 'required'
        //    ]);
    
            
        if ($request->hasFile("files")) {
            $list[] = 'si';
        } else {
            $list[] = 'no';
        }
        $list[] = $request->all();
        
        return response()->json($list);
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
