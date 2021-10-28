<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Rutas de Controllers
use App\Http\Controllers\NegociosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Negocios
Route::post("negocios/post",[NegociosController::class, "crearNegocios"]);
Route::get("negocios/get",[NegociosController::class, "getNegocio"]);