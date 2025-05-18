<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Maestro;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriasController extends Controller
{
    public function mostrar()
    {

        $maestro = Maestro::where('user_id', Auth::user()->id)->first();
        $materias = Materia::where('maestro_id', $maestro->id)->get();

        return view('agregarmateria', compact('materias'));
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $materia = Materia::create([
            'name' => $request->name,
            'maestro_id' => Maestro::where('user_id', Auth::user()->id)->first()->id,
        ]);

        $alumnos = Alumno::where('maestro_id', $materia->maestro_id)->get();

        foreach ($alumnos as $alumno) {
            Calificacion::create([
                'alumno_id' => $alumno->id,
                'materia_id' => $materia->id,
            ]);
        }


        return redirect()->route('AgregarMaterias')->with('success', 'Materia agregada correctamente');
    }


    public function actualizar(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $materia = Materia::find($request->id);
        $materia->name = $request->name;
        $materia->save();

        return redirect()->route('AgregarMaterias')->with('success', 'Materia actualizada correctamente');
    }


    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
        return redirect()->route('AgregarMaterias')->with('success', 'Materia eliminada correctamente');
    }
}
