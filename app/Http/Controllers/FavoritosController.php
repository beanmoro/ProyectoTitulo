<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\User;

class FavoritosController extends Controller
{
    //
    public function crearFavorito(Request $request){
        
        $request->validate([
            'nombre' => ['required', 'string', 'max:32'],
        ]);

        $favorito = new Favorito();
        $favorito->nombre = $request->nombre;
        $favorito->negocio_patente = $request->negocio_patente;
        $favorito->save();

        $usuario = User::Where('rut', Auth::user()->rut)->first();

        $favorito->usuario()->attach($usuario->id);

        return redirect()->route('favoritos');
    }
    public function getFavorito(){
        $favoritos = Favorito::all();
        foreach($favoritos as $favorito){
            $favorito->load('negocio');
        }
        return $favoritos;
    }

    public function eliminarFavorito(Request $request){

        $input = $request->all();
        $id = $input["id"];
        $favorito = Favorito::findOrFail($id);
        $usuarios = $favorito->usuarios()->get();
        foreach($usuarios as $usuario){
            $favorito->usuario()->detach($usuario->id);
        }

        $favorito->delete();
        return "ok";

    }

}
