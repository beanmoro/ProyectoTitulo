<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reporte;

class ReportesController extends Controller
{
    public function crearReportes(Request $request){
        
        $request->validate([
            'asunto' => ['required', 'string', 'max:128'],
            'texto' =>['required', 'string', 'max:512'],
            'tipo' =>['required', 'integer']

        ]);

        $reporte = Reporte::create([
            'rut' => Auth::user()->rut,
            'asunto' => $request->asunto,
            'texto' => $request->texto,
            'tipo' => $request->tipo,
            
            
            
        ]);


        return redirect()->route('soporte_reporte');
    }

    public function getReporte(){
        $reporte = Reporte::all();
        return $reporte;
    }
}
