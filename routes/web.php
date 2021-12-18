<?php

use Illuminate\Support\Facades\Route;
//Imports de controllers
use App\Http\Controllers\NegociosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\EtiquetasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PostProductosController;
use App\Http\Controllers\OfertasController;


use App\Models\Producto;
use App\Models\Negocio;
use App\Models\Etiqueta;
use App\Models\Postproducto;
use App\Models\Oferta;
use App\Models\Reporte;
use App\Models\User;

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


Route::get("/",function(){
    $productos = Producto::latest();


    return view('home', [
        'productos' => $productos->take(10)->get()
    ]);

})->name("home");




Route::get('/buscar', function () {
    if(Auth::user()->role >= 0){
        $productos = Producto::latest();

        if(request('producto') != null) {
            $productos->where('nombre', 'like', '%' . request('producto') . '%')
            ->orWhere('etiquetas', 'like',  '%' . request('producto') . '%')
            ->orWhere('marca', 'like',  '%' . request('producto') . '%')->orWhereHas('etiquetas', function($query){
                return $query->where('nombre', 'like', '%' . request('producto') . '%');
            });

            
        }
    
        return view('pages.client.buscar', [
            'productos' => $productos->get()
        ]);
    }else{

        return invalidRole();
        
    }
})->middleware(['auth'])->name('buscar');

Route::get('/favoritos', function () {
    if(Auth::user()->role >= 0){
        return view('pages.client.favoritos');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('favoritos');

Route::get('/publicar_negocio', function () {
    if(Auth::user()->role == 0){
        return view('pages.client.publicar_negocio');
    }else if(Auth::user()->role == 3){
        return view('pages.client.solicitado');    
    }else{
        return redirect()->route('buscar');
    }
})->middleware(['auth'])->name('publicar_negocio');


Route::get('/negocio/administrar', function(){
    if(Auth::user()->role >= 1){
        
        $negocio = Negocio::where('rut', Auth::user()->rut)->first();
        $postproductos = $negocio->postproductos()->get();
        $ofertas = OfertasController::getOfertas();


        return view('pages.seller.negocio', [
            'negocio' => $negocio,
            'postproductos' => $postproductos,
            'ofertas' => $ofertas,
        ]);
    }else{

        return redirect()->route('buscar');
    }


})->middleware(['auth'])->name('administrar_negocio');

Route::get('/negocio/editar', function(){
    if(Auth::user()->role >= 1){
        $negocio = Negocio::where('rut', Auth::user()->rut);

        return view('pages.seller.editar', [
            'negocio' => $negocio->first()
        ]);
    }else{

        return redirect()->route('buscar');
    }

})->middleware(['auth'])->name('editar_negocio');

Route::get('/negocio/administrar/agregar_producto', function(){
    if(Auth::user()->role >= 1){

        return view('pages.seller.agregar_producto',[
            'productos' => Producto::latest()->get()
        ]);
    }else{

        return redirect()->route('buscar');
    }


})->middleware(['auth'])->name('agregar_postproducto');

Route::get('/negocio/administrar/agregar_oferta', function(){
    if(Auth::user()->role >= 1){

        $postproductos = PostProductosController::getPostProductos();

        return view('pages.seller.agregar_oferta', [
            'postproductos' => $postproductos
        ]);
    }else{

        return redirect()->route('buscar');
    }


})->middleware(['auth'])->name('agregar_oferta');

Route::get('/negocio/{patente}', function ($patente) {
    if(Auth::user()->role >= 0){
        return view('pages.client.negocio', [

            'negocio' => Negocio::findOrFail($patente)
        ]);

    }else{
        return redirect()->route('buscar');
    }
})->middleware(['auth'])->name('negocio');


Route::get('/soporte_respuesta', function () {
    if(Auth::user()->role >= 0){
        return view('pages.admin.soporte_respuesta');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('soporte_respuesta');

Route::get('/solicitud_negocio', function () {
    if(Auth::user()->role >= 0){
        return view('pages.admin.solicitud_negocio');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('solicitud_negocio');

Route::get('/soporte_reporte', function () {
    if(Auth::user()->role >= -1){
        return view('pages.client.soporte_reporte');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('soporte_reporte');

Route::get('/nueva_etiqueta', function () {
    if(Auth::user()->role == 2){
        return view('pages.admin.nueva_etiqueta');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('nueva_etiqueta');

Route::get('/producto', function () {
    if(Auth::user()->role == 2){
        return view('pages.admin.producto', [
            'etiquetas' => Etiqueta::latest()->get()
        ]);
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('producto');

Route::get('/usuarios', function () {
    if(Auth::user()->role == 2){
        return view('pages.admin.usuarios');
    }else{
        return invalidRole();
    }
})->middleware(['auth'])->name('usuarios');

Route::get('/reporte/{id}', function ($id) {
    if(Auth::user()->role >= 0){
        return view('pages.client.reporte', [

            'reporte' => Reporte::findOrFail($id)
        ]);

    }else{
        return redirect()->route('buscar');
    }
})->middleware(['auth'])->name('reporte');


Route::get('/admin/reporte/{id}', function ($id) {
    if(Auth::user()->role == 2){
        return view('pages.admin.reporte', [

            'reporte' => Reporte::findOrFail($id)
        ]);

    }else{
        return redirect()->route('buscar');
    }
})->middleware(['auth'])->name('admin_reporte');


Route::get('/admin', function () {
    if(Auth::user()->role == 2){
        return view('admin_dashboard');
    }
    return redirect()->route('dashboard');

})->middleware(['auth'])->name('admin_dashboard');




require __DIR__.'/auth.php';

//Negocios
Route::post("negocios/post",[NegociosController::class, "crearNegocios"])->name('negocios.post');
Route::delete("negocios/delete/{negocio}",[NegociosController::class, "eliminarNegocio"])->name('negocios.delete');
Route::get("negocios/get",[NegociosController::class, "getNegocio"])->name('negocios.get');
Route::put("negocios/{negocio}/editar/telefono", [NegociosController::class, "editarTelefonoNegocio"])->name('negocios.editar.telefono');

//Reportes
Route::post("reportes/post",[ReportesController::class, "crearReportes"])->name('reportes.post');
Route::get("reportes/get",[ReportesController::class, "getReporte"])->name('reportes.get');
Route::get("reportes/get/{rut}", [ReportesController::class, "getReporteRut"])->name('reportes.get.rut');
Route::patch("reporte/{reporte}/responder", [ReportesController::class, "update"])->name('reportes.responder');
Route::put("reporte/{reporte}/estado",[ReportesController::class, "setEstado"])->name('reportes.estado');
Route::post("reportes/delete",[ReportesController::class, "eliminarReporte"])->name('reportes.delete');

//Etiquetas
Route::post("etiquetas/post",[EtiquetasController::class, "crearEtiquetas"])->name('etiquetas.post');
Route::get("etiquetas/get",[EtiquetasController::class, "getEtiqueta"])->name('etiquetas.get');
Route::post("etiquetas/delete",[EtiquetasController::class, "eliminarEtiqueta"])->name('etiquetas.delete');

//PostProductos
Route::post("postproductos/post",[PostProductosController::class, "crearPostProductos"])->name('postproductos.post');
Route::get("postproductos/get",[PostProductosController::class, "getPostProductos"])->name('postproductos.get');


//Ofertas
Route::post("ofertas/post", [OfertasController::class, "crearOferta"])->name('oferta.post');
Route::get("ofertas/get", [OfertasController::class, "getOfertas"])->name('oferta.get');

//Productos
Route::post("productos/post",[ProductosController::class, "crearProductos"])->name('productos.post');
Route::get("productos/get",[ProductosController::class, "getProducto"])->name('productos.get');
Route::post("productos/delete",[ProductosController::class, "eliminarProducto"])->name('productos.delete');

//Usuarios
Route::get("usuarios/get",[UsuariosController::class, "getUsuarios"])->name('usuarios.get');
Route::put("usuarios/ban/{user}",[UsuariosController::class, "banUsuario"])->name('usuarios.ban');
Route::put("usuarios/desban/{user}",[UsuariosController::class, "desbanUsuario"])->name('usuarios.desban');
Route::put("usuarios/cliente/{user}",[UsuariosController::class, "setUsuarioCliente"])->name('usuarios.cliente');
Route::put("usuarios/vendedor/{user}",[UsuariosController::class, "setUsuarioVendedor"])->name('usuarios.vendedor');

//Rutas de Relaciones

//Feedback
Route::post('/feedback/usuario', [FeedbackController::class, 'setUsuario']);
Route::get('/feedback/{fb}/usuario', [FeedbackController::class, 'getUsuario']);

//Negocio
Route::post('/negocio/usuario', [NegociosController::class, 'setUsuario']);
Route::get('/negocio/{negocio}/usuario', [NegociosController::class, 'getUsuario']);
Route::post('/negocio/postproducto', [NegociosController::class, 'addPostProducto']);
Route::get('/negocio/{negocio}/postproductos', [NegociosController::class, 'getPostProductos']);
Route::post('/negocio/{negocio}/postproducto/remover', [NegociosController::class, 'removerPostProducto']);
Route::post('/negocio/feedback', [NegociosController::class, 'addFeedback']);
Route::get('/negocio/{negocio}/feedback', [NegociosController::class, 'getFeedback']);
Route::post('/negocio/{negocio}/feedback/remover', [NegociosController::class, 'removeFeedback']);

//PostProducto
Route::post('/postproducto/negocio', [PostProductosController::class, 'setNegocio']);
Route::get('/postproducto/{postproducto}/negocio', [PostProductosController::class, 'getNegocio']);
Route::post('/postproducto/producto', [PostProductosController::class, 'setProducto']);
Route::get('/postproducto/{postproducto}/producto', [PostProductosController::class, 'getProducto']);
Route::get('/postproducto/{postproducto}/oferta', [PostProductosController::class, 'getOferta']);

//Producto
Route::post('/producto/etiqueta', [ProductosController::class, 'addEtiqueta']);
Route::get('/producto/{producto}/etiquetas', [ProductosController::class, 'getEtiquetas']);

//Reporte
Route::get('/reporte/{reporte}/usuario', [ReportesController::class, 'getUsuario']);

//Usuario

Route::post('/usuario/negocio', [UsuariosController::class, 'addNegocio']);
Route::get('/usuario/{user}/negocio', [UsuariosController::class, 'getNegocio']);
Route::post('/usuario/favorito', [UsuariosController::class, 'addFavorito']);
Route::get('/usuario/{user}/favoritos', [UsuariosController::class, 'getFavoritos']);
Route::post('/usuario/{user}/favoritos/remover', [UsuariosController::class, 'removeFavorito']);
Route::post('/usuario/reporte', [UsuariosController::class, 'AddReporte']);
Route::get('/usuario/{user}/reportes', [UsuariosController::class, 'getReportes']);
Route::post('/usuario/{user}/reporte/remover', [UsuariosController::class, 'removeReporte']);



function invalidRole(){
    if(Auth::user()->role == -1){

        return view('pages.banned');
    }else{

        return redirect()->route('home');
    }
}