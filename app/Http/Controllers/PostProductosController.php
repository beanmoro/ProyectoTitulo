<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostProducto;
use App\Models\Negocio;
use App\Models\Producto;

class PostProductosController extends Controller
{
    //



    //Funciones de Relacion

    public function setNegocio(Request $request){

        $postproducto = PostProducto::findOrFail($request->postprod_id);
        $negocio = Negocio::findOrFail($request->patente);
        $postproducto->negocio()->attach($negocio->patente);
        return $postproducto;
    }

    public function getNegocio(PostProducto $postproducto){

        return $postproducto->negocio()->get();
    }

    public function setProducto(Request $request){
        $postproducto = PostProducto::findOrFail($request->postprod_id);
        $producto = Producto::findOrFail($request->producto_id);
        $postproducto->producto()->attach($producto->id);
        return $postproducto;
    }

    public function getProducto(PostProducto $postproducto){
        return $postproducto->producto()->get();
    }

    public function getOferta(PostProducto $postproducto){
        return $postproducto->oferta()->get();
    }

}
