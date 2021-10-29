<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegociosController;
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