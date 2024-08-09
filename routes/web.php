<?php

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Estacion\DetailsController;
use App\Http\Controllers\EstacionesControlle;
use App\Http\Controllers\Estacion\PanelController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', function () {
    if (Auth::check()){
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }

});

Route::get('sigeses', function () {
     if (Auth::check()){
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/estaciones', EstacionesControlle::class)->parameters(["estaciones"=>"estacion"]);
Route::get('/visita/{id}', [EstacionesControlle::class, 'visita'])->name('estaciones.visita');
Route::post('/visita/{id}/{fecha}', [EstacionesControlle::class, 'visitas'])->name('estaciones.visitas');
Route::post('/visita/{id}', [EstacionesControlle::class, 'visitasRegist'])->name('estaciones.vRegist');
Route::get('/visita/edit/{id}/{idv}',[EstacionesControlle::class, 'visitasEdit'])->name('estaciones.vEdit');
Route::post('/visita/update/{id}/{idv}',[EstacionesControlle::class, 'visitasUpdate'])->name('estaciones.vUpdate');
Route::post('/visita/delete/{id}/{idv}', [EstacionesControlle::class, 'visitasDelete'])->name('estaciones.vDelete');

Route::get('/update/{id}', 'App\Http\Controllers\Admin\FileController@index')->name('update');
Route::post('/update-store/', [FileController::class, 'store'])->name('update.store');

Route::get('/estaciones/details/{id}',[DetailsController::class, 'index'])->name('details.index');
Route::post('/estaciones/details/{id}/',[DetailsController::class, 'store'])->name('details.store');
Route::get('/estaciones/details/{id}/edit',[DetailsController::class, 'edit'])->name('details.edit');
Route::post('/estaciones/details/{id}/edit',[DetailsController::class, 'update'])->name('details.update');


//Route::resource('/details', DetailsController::class)->parameters(["details"=>'detail']);


Route::get('/admin/panel', [App\Http\Controllers\Estacion\PanelController::class, 'index'])->name('panel.index');
Route::get('/admin/panel/document', [App\Http\Controllers\Estacion\PanelController::class, 'document'])->name('panel.document');
Route::get('/admin/panel/document/{id}', 'App\Http\Controllers\Estacion\PanelController@documentShow')->name('panel.show');
Route::get('/admin/panel/detail', [App\Http\Controllers\Estacion\PanelController::class, 'detail'])->name('panel.detail');
Route::post('/admin/panel/detail', [App\Http\Controllers\Estacion\PanelController::class, 'detail'])->name('panel.detail');
Route::get('/admin/panel/user', [App\Http\Controllers\Estacion\PanelController::class, 'user'])->name('panel.user');
Route::post('/admin/panel', [App\Http\Controllers\Estacion\PanelController::class, 'buscar'])->name('panel.buscar');

Route::post('/details/updateEdit', [DetailsController::class, 'updateEdit'])->name('details.updateEdit');
Route::post('/details/borrarData', [DetailsController::class, 'borrarData'])->name('details.borrarData');
Route::delete('/admin/panel/user/{id}', 'App\Http\Controllers\Estacion\PanelController@userDelete')->name('panel.user.delete');
Route::delete('/admin/panel/document/{id}', 'App\Http\Controllers\Estacion\PanelController@documentDelete')->name('panel.delete');

Route::get('/excel', 'App\Http\Controllers\Estacion\PanelController@excel')->name('excel');


Route::get('/sorteo', function() {
    return view('sorteo.index');
});

Route::get('/mantenimiento', function(){
    return view('mante');
});


/*

Route::get('/prueba', function() {
    return view('estaciones.visitas.planilla');
});
*/
