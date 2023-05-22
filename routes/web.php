<?php

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Estacion\DetailsController;
use App\Http\Controllers\EstacionesControlle;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/estaciones', EstacionesControlle::class)->parameters(["estaciones"=>"estacion"]);
Route::get('/update/{id}', 'App\Http\Controllers\Admin\FileController@index')->name('update');
Route::post('/update-store/', [FileController::class, 'store'])->name('update.store');
Route::resource('/details', DetailsController::class)->parameters(["details"=>'detail']);


