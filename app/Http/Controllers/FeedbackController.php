<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Negocio;
use App\Models\User;

class FeedbackController extends Controller
{
    //

    public function crearFeedback(Request $request){
        
        $request->validate([
            'comentario' => ['required', 'string', 'max:255'],
        ]);

        //dd($request);
        $feedback = new Feedback();
        $feedback->autor = Auth::user()->name;
        $feedback->calificacion = $request->calificacion;
        $feedback->comentario = $request->comentario;
        $feedback->save();

        
        $negocio = Negocio::findOrFail($request->patente);

        $feedback->negocios()->attach($negocio->patente);
        

        //return redirect()->route('buscar');
    }


    public function getFeedback(){
        $feedbacks = Feedback::all();
        foreach($feedbacks as $feedback){
            $feedback->load('usuario');
        }
        return $feedbacks;
    }
    
    public function setUsuario(Request $request){
        $fb = Feedback::findOrFail($request->feedback_id);
        $usuario = User::findOrFail($request->user_id);
        $fb->usuario()->attach($usuario->id);
        return $fb;
    }
    
    public function getUsuario(Feedback $fb){
        return $fb->usuario()->get();
    }



}
