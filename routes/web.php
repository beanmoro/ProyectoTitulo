<?php

use Illuminate\Support\Facades\Route;
//Imports de controllers
use App\Http\Controllers\NegociosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\EtiquetasController;
use App\Models\Negocio;
use App\Models\Etiqueta;
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


Route::view("/","home")->name("home");
Route::get('/dashboard', function () {
    if(Auth::user()->role == 0){
        return view('dashboard');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('dashboard');

Route::get('/buscar', function () {
    if(Auth::user()->role == 0){
        return view('pages.client.buscar');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('buscar');

Route::get('/favoritos', function () {
    if(Auth::user()->role == 0){
        return view('pages.client.favoritos');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('favoritos');

Route::get('/publicar_negocio', function () {
    if(Auth::user()->role == 0){
        return view('pages.client.publicar_negocio');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('publicar_negocio');

Route::get('/negocio/{id}', function ($id) {
    if(Auth::user()->role == 0){
        return view('pages.client.negocio', [

            'negocio' => Negocio::findOrFail($id)
        ]);

    }else{
        return view('buscar');
    }
})->middleware(['auth'])->name('negocio');




Route::get('/soporte_reporte', function () {
    if(Auth::user()->role == 0){
        return view('pages.client.soporte_reporte');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('soporte_reporte');

Route::get('/nueva_etiqueta', function () {
    if(Auth::user()->role == 0){
        return view('pages.admin.nueva_etiqueta');
    }else{
        return view('home');
    }
})->middleware(['auth'])->name('nueva_etiqueta');

Route::get('/admin', function () {
    if(Auth::user()->role == 0){
        return view('admin_dashboard');
    }
    return redirect()->route('dashboard');

})->middleware(['auth'])->name('admin_dashboard');

require __DIR__.'/auth.php';

//Negocios
Route::post("negocios/post",[NegociosController::class, "crearNegocios"])->name('negocios.post');
Route::get("negocios/get",[NegociosController::class, "getNegocio"])->name('negocios.get');

//Reportes
Route::post("reportes/post",[ReportesController::class, "crearReportes"])->name('reportes.post');
Route::get("reportes/get",[ReportesController::class, "getReporte"])->name('reportes.get');

//Etiquetas
Route::post("etiquetas/post",[EtiquetasController::class, "crearEtiquetas"])->name('etiquetas.post');
Route::get("etiquetas/get",[EtiquetasController::class, "getEtiqueta"])->name('etiquetas.get');
Route::post("etiquetas/delete",[EtiquetasController::class, "eliminarEtiqueta"])->name('etiquetas.delete');