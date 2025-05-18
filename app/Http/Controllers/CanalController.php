<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Aviso;
use App\Models\Canal;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class CanalController extends Controller
{
    public function mostrar(){

        $canal = Canal::where('maestro_id', Maestro::where('user_id', Auth::user()->id)->first()->id)->first();

        $avisos = Aviso::where('canal_id', $canal->id)->get()->sortByDesc('created_at');

        return view('canal', compact('avisos'));
    }

    public function mostrarAlumno(){

        $canal = Canal::where('maestro_id', Maestro::where('id', Alumno::where('user_id',Auth::user()->id)->first()->maestro_id)->first()->id)->first();

        $avisos = Aviso::where('canal_id', $canal->id)->get()->sortByDesc('created_at');

        return view('canalAlumno', compact('avisos'));
    }

    public function agregar(Request $request){
        $request->validate([
            'titulo' => 'required',
            'cuerpo' => 'required',
        ]);

        // Aquí puedes guardar el aviso en la base de datos o realizar cualquier otra acción necesaria
        $canal = Canal::where('maestro_id', Maestro::where('user_id', Auth::user()->id)->first()->id)->first();

        Aviso::create([
            'canal_id' => $canal -> id, // Cambia esto según tu lógica
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
        ]);


        return redirect()->route('Canal')->with('success', 'Aviso agregado correctamente.');
    }
}
