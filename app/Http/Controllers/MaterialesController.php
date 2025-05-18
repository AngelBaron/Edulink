<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Maestro;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialesController extends Controller
{
    public function mostrar()
    {
        $maestro = Maestro::where('user_id', Auth::user()->id)->first();
        $materials = Material::where('maestro_id', $maestro->id)->get();
        return view('AgregarMateriales', compact('materials'));
    }

    public function verTodosMateriales()
    {
        $alumno = Alumno::where('user_id', Auth::user()->id)->first();
        $maestro = Maestro::where('id', $alumno->maestro_id)->first();
        $materiales = Material::where('maestro_id', $maestro->id)->get();
        return view('verTodosMateriales', compact('materiales'));
    }

    public function ConsultarMateriales($nombreMaterial)
    {
        $alumno = Alumno::where('user_id', Auth::user()->id)->first();
        $maestro = Maestro::where('id', $alumno->maestro_id)->first();

        $materiales = Material::where('maestro_id', $maestro->id)
            ->where('file_name', 'like', '%' . $nombreMaterial . '%')
            ->get();

        return response()->json($materiales);
    }

    public function ConsultarMaterialesMaestro($nombreMaterial)
    {

        $maestro = Maestro::where('user_id', Auth::user()->id)->first();

        $materiales = Material::where('maestro_id', $maestro->id)
            ->where('file_name', 'like', '%' . $nombreMaterial . '%')
            ->get();

        return response()->json($materiales);
    }

    public function ConsultarTodosLosMaterialesMaestro()
    {
        
        $maestro = Maestro::where('user_id', Auth::user()->id)->first();

        $materiales = Material::where('maestro_id', $maestro->id)->get();

        return response()->json($materiales);
    }

    public function ConsultarTodosLosMateriales()
    {
        $alumno = Alumno::where('user_id', Auth::user()->id)->first();
        $maestro = Maestro::where('id', $alumno->maestro_id)->first();

        $materiales = Material::where('maestro_id', $maestro->id)->get();

        return response()->json($materiales);
    }

    public function agregar(Request $request)
    {


        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png'],
        ]);

        // Aquí puedes guardar el material en la base de datos o realizar cualquier otra acción necesaria

        $archivo = $request->file('file');
        $nombreOriginal = $archivo->getClientOriginalName();
        $nombreRandom = md5($nombreOriginal . microtime()) . '.' . $archivo->getClientOriginalExtension();
        $path = $archivo->storeAs('materials', $nombreRandom);

        $maestro = Maestro::where('user_id', Auth::user()->id)->first();

        // Guardar en la base de datos
        $material = new Material();
        $material->ubicacion = $nombreRandom;
        $material->maestro_id = $maestro->id;
        $material->file_name = $nombreOriginal; // Guardar el nombre original del archivo
        $material->save();

        return redirect()->route('AgregarMateriales')->with('success', 'Material agregado correctamente.');
    }

    public function actualizarMaterial(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $material = Material::find($request->id);
        $material->file_name = $request->name;
        $material->save();

        return redirect()->route('AgregarMateriales')->with('success', 'Material actualizado correctamente');
    }
    
    public function eliminarMaterial($id)
    {
        $material = Material::findOrFail($id);
        $path = storage_path('app\private\materials\\' . $material->ubicacion);

        if (file_exists($path)) {
            unlink($path); // Eliminar el archivo del sistema de archivos
        }

        $material->delete(); // Eliminar el registro de la base de datos

        return redirect()->route('AgregarMateriales')->with('success', 'Material eliminado correctamente.');
    }



    public function verArchivo($nombreArchivo)
    {
        $path = storage_path('app\private\materials\\' . $nombreArchivo);

        if (!file_exists($path)) {
            dd("Archivo no encontrado: " . $path);
        }

        return response()->file($path); // o ->download($path)
    }
}
