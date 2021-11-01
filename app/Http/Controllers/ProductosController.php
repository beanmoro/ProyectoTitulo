<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class ProductosController extends Controller
{
    public function crearProductos(Request $request){
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:32'],
            'descripcion' =>['required','string','max:512'],
            'marca' =>['required','string'],
            'etiquetas' =>['required','string']


        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'etiquetas' => $request->etiquetas
            
        ]);
        

        return redirect()->route('producto');
    }

    public function getProducto(){
        $producto = Producto::all();
        return $producto;
    }
}
