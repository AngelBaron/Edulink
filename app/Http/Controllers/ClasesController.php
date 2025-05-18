<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Calificacion;
use App\Models\Canal;
use App\Models\Maestro;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    public function mostrar()
    {

        $maestros = Maestro::with('user')->get();

        return view('clases', compact('maestros'));
    }


    public function verclase($id)
    {
        $maestro = Maestro::with('materia', 'user')->find($id);
        return view('clase', compact('maestro'));
    }

    public function verAvisos($id)
    {
        $canal = Canal::where('maestro_id', $id)->first();
        $avisos = Aviso::where('canal_id', $canal->id)->get();
        return view('verAvisos', compact('avisos'));
    }

    public function verMateriaMaestro($id)
    {
        $calificaciones = Calificacion::with('alumno')->where('materia_id', $id)->get();
        return view('verMateriaMaestro', compact('calificaciones'));
    }

    public function ConsultarMaestros(Request $request)
    {
        $query = $request->input('query');

        $maestros = Maestro::with('user')
            ->whereHas('user', function ($q) use ($query) {
                $q->whereRaw("CONCAT(name, ' ', apaterno, ' ', amaterno) LIKE ?", ["%{$query}%"])
                    ->orWhereRaw("CONCAT(apaterno, ' ', amaterno, ' ', name) LIKE ?", ["%{$query}%"])
                    ->orWhere('name', 'like', "%{$query}%")
                    ->orWhere('apaterno', 'like', "%{$query}%")
                    ->orWhere('amaterno', 'like', "%{$query}%");
            })
            ->get();

        return response()->json($maestros);
    }
}
