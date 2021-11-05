<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Negocio;

class NegociosController extends Controller
{
    public function crearNegocios(Request $request){
        // $input = $request->all();
        // $negocio = new Negocio();
        // $negocio->patente = $input["patente"];
        // $negocio->nombre = $input["nombre"];
        // $negocio->direccion = $input["direccion"];
        // $negocio->telefono = $input["telefono"];
        
        // $negocio->save();
        // return $negocio;

        $request->validate([
            'patente' => ['required', 'string', 'unique:negocios'],
            'nombre' => ['required', 'string', 'min:8','max:64'],
            'direccion' => ['required', 'string', 'min:8', 'max:64'],
            'comuna' => ['required', 'string'],
            'telefono' => ['required', 'integer', 'unique:negocios']
        ]);

        $negocio = Negocio::create([
            'rut' => Auth::user()->rut,
            'patente' => $request->patente,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'comuna' => $request->comuna,
            'telefono' => $request->telefono,

        ]);

        $user = Auth::user();
        $user->role = 3;
        $user->save();


        return redirect()->route('publicar_negocio');
    }

    public function getNegocio(){
        $negocio = Negocio::all();
        return $negocio;
    }

    public static function findOrFail(){


    }
    
}
