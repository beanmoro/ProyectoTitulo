<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Negocio;
use App\Models\User;
use App\Models\PostProducto;
use App\Models\Feedback;

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


    //Funciones de Relacion

    public function setUsuario(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $usuario = User::findOrFail($request->user_id);
        $negocio->usuario()->attach($usuario->id);
        return $negocio;

    }

    public function getUsuario(Negocio $negocio){

        return $negocio->usuario()->get();
    }


    public function addPostProducto(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $postproducto = PostProducto::findOrFail($request->postprod_id);
        $negocio->postproductos()->attach($postproducto->id);
        return $negocio;
        
    }
    
    public function getPostProductos(Negocio $negocio){
        return $negocio->postproductos()->get();
    }


    public function removePostProducto(Negocio $negocio, Request $request){

        $postproducto = PostProducto::findOrFail($request->postprod_id);
        $negocio->postproductos()->detach($postproducto->id);
        return $negocio;
    }

    public function addFeedback(Request $request){

        $negocio = Negocio::findOrFail($request->patente);
        $feedback = Feedback::findOrFail($request->feedback_id);
        $negocio->feedback()->attach($feedback->id);
        return $negocio;

    }

    public function getFeedback(Negocio $negocio){
        return $negocio->feedback()->get();
    }

    public function removeFeedback(Negocio $negocio, Request $request){
        
        $feedback = Feedback::findOrFail($request->feedback_id);
        $negocio->feedback()->detach($feedback->id);
        return $negocio;
    }

    
}
