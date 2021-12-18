<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Postproducto;
use App\Models\Negocio;
use App\Models\Producto;

class PostProductosController extends Controller
{
    //
    public function crearPostProductos(Request $request){
        


        $request->validate([
            'producto' => ['unique:postproductos,producto_id'],
            'precio' => ['required', 'numeric', 'gt:0'],
            'stock_referencial' => ['required', 'numeric','gt:0'],
        ]);

        
        $postproducto = new Postproducto();
        $postproducto->producto_id = $request->producto;
        $postproducto->precio = $request->precio;
        $postproducto->stock_referencial = $request->stock_referencial;
        $postproducto->save();

        $negocio = Negocio::where('rut', Auth::user()->rut)->first();

        $postproducto->negocio()->attach($negocio->patente);


        return redirect()->route('administrar_negocio');
    }


    public function getPostProductos(){
        $postproductos = Postproducto::all();
        foreach($postproductos as $postproducto){
            $postproducto->load('producto');
        }

        return $postproductos;
    }

    //Funciones de Relacion

    public function setNegocio(Request $request){

        $postproducto = Postproducto::findOrFail($request->postprod_id);
        $negocio = Negocio::findOrFail($request->patente);
        $postproducto->negocio()->attach($negocio->patente);
        return $postproducto;
    }

    public function getNegocio(Postproducto $postproducto){

        return $postproducto->negocio()->get();
    }

    public function setProducto(Request $request){
        $postproducto = Postproducto::findOrFail($request->postprod_id);
        $producto = Producto::findOrFail($request->producto_id);
        $postproducto->producto()->attach($producto->id);
        return $postproducto;
    }

    public function getProducto(Postproducto $postproducto){
        return $postproducto->producto()->get();
    }

    public function getOferta(Postproducto $postproducto){
        return $postproducto->oferta()->get();
    }

}
