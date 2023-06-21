<?php
namespace App\Http\Controllers\Estacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view('admin.panel.index');
    }



}