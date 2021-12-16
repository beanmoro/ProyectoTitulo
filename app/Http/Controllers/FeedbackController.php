<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends Controller
{
    //



    
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
