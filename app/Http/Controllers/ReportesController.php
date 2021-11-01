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

    public function eliminarReporte(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return "ok";
    }

    public function update(Reporte $reporte){

        $attribs = request()->validate([
            'respuesta' => ['required', 'string', 'max:1024'],

        ]);

        $reporte->update($attribs);

        return back();
    }
}
