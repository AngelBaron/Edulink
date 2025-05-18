<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Maestro;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificacionesController extends Controller
{
    public function mostrar(){
        $alumno = Alumno::where('user_id', Auth::user()->id)->first();
        $maestro = Maestro::where('id', $alumno->maestro_id)->first();
        $materias = Materia::where('maestro_id', $maestro->id)->with('calificacions')->get();

        return view('MisCalificaciones', compact('materias', 'alumno'));
    }

    public function mostrarCalificacionesMaestro(){
        $maestro = Maestro::where('user_id', Auth::user()->id)->first();
        $materias = Materia::where('maestro_id', $maestro->id)->get();
        return view('calificacionesmaterias', compact('materias'));
    }

    public function CalificacionesPorMateria($id){
        $materia = Materia::with([
            'calificacions' => function ($query) use ($id) {
                $query->where('materia_id', $id)->with('alumno');
            }
        ])->find($id);
        
        return view('calificacionespormateria', compact('materia'));
    }

    public function RegistrarCalificaciones(Request $request, $id){

        $calificacions = $request->input('calificacions');

        foreach($calificacions as $alumnoId => $parciales){
            Calificacion::where('alumno_id', $alumnoId)
            ->where('materia_id', $id)
            ->update([
                'parcial1' => $parciales['parcial1'],
                'parcial2' => $parciales['parcial2'],
                'parcial3' => $parciales['parcial3'],

            ]);

        }


        
        return redirect()->route('CalificacionesPorMateria',$id)->with('success','Calificaciones registradas correctamente');
    }

    public function buscarCalificaciones(Request $request, $materiaId)
{
    $query = $request->input('query');

    $calificaciones = Calificacion::with('alumno')
        ->where('materia_id', $materiaId)
        ->whereHas('alumno', function ($q) use ($query) {
            $q->whereRaw("CONCAT(nombre_hijo, ' ', apaterno_hijo, ' ', amaterno_hijo) LIKE ?", ["%{$query}%"])
              ->orWhereRaw("CONCAT(apaterno_hijo, ' ', amaterno_hijo, ' ', nombre_hijo) LIKE ?", ["%{$query}%"])
              ->orWhereRaw("CONCAT(nombre_hijo, ' ', apaterno_hijo) LIKE ?", ["%{$query}%"])
              ->orWhereRaw("CONCAT(nombre_hijo, ' ', amaterno_hijo) LIKE ?", ["%{$query}%"]);
        })
        ->get();

    return response()->json($calificaciones);
}
}
