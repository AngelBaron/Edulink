<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Document;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class MiClaseController extends Controller
{
    public function mostrar()
    {
        return view('MiClase');
    }

    public function ConsultarDocumentos()
    {

        return view('ConsultarDocumentos');
    }

    public function ConsutarDocumentosTotales()
    {
        $maestro_id = Maestro::where('user_id', Auth::user()->id)->first();
        $alumnos = Alumno::with('documents')->where('maestro_id', $maestro_id->id)->get();
        return response()->json($alumnos);
    }

    public function ConsultarDocumentosValidados()
    {
        $maestro_id = Maestro::where('user_id', Auth::user()->id)->first();
        $alumnos = Alumno::with('documents')->where('maestro_id', $maestro_id->id)->get();
        $alumnos = $alumnos->filter(function ($alumno) {
            return $alumno->documents->contains(function ($document) {
                return $document->validado == 1;
            });
        })
        ->values();
        return response()->json($alumnos);
    }

    public function ConsultarDocumentosRechazados()
    {
        $maestro_id = Maestro::where('user_id', Auth::user()->id)->first();
        $alumnos = Alumno::with('documents')->where('maestro_id', $maestro_id->id)->get();
        $alumnos = $alumnos->filter(function ($alumno) {
            return $alumno->documents->contains(function ($document) {
                return $document->validado == 2;
            });
        })
            ->values();
        return response()->json($alumnos);
    }

    public function ConsultarDocumentosPendientes()
    {
        $maestro_id = Maestro::where('user_id', Auth::user()->id)->first();
        $alumnos = Alumno::with('documents')->where('maestro_id', $maestro_id->id)->get();
        $alumnos = $alumnos->filter(function ($alumno) {
            return $alumno->documents->contains(function ($document) {
                return $document->validado == 0;
            });
        })
            ->values();
        return response()->json($alumnos);
    }




    public function verDocument($nombreArchivo)
    {
        $path = storage_path('app\private\documents\\' . $nombreArchivo);

        if (!file_exists($path)) {
            dd("Archivo no encontrado: " . $path);
        }

        return response()->file($path); // o ->download($path)
    }

    public function validarDocumentos($item)
    {
        $document = Document::where('alumno_id', $item)->get();
        foreach ($document as $doc) {
            $doc->validado = 1;
            $doc->save();
        }
        return redirect()->back()->with('success', 'Los documentos han sido validados correctamente.');
    }

    public function rechazarDocumentos($item)
    {
        $document = Document::where('alumno_id', $item)->get();
        foreach ($document as $doc) {
            $doc->validado = 2;
            $doc->save();
        }
        return redirect()->back()->with('success', 'El documento ha sido rechazado correctamente.');
    }

    public function ConsultarDocumentosPorNombreYApellido($nombre=null, $apaterno=null, $amaterno=null)
    {
        $maestro_id = Maestro::where('user_id', Auth::user()->id)->first();
        $alumnos = Alumno::with('documents')->where('maestro_id', $maestro_id->id)->get();
        $alumnos = $alumnos->filter(function ($alumno) use ($nombre, $apaterno, $amaterno) {
            return ($nombre ? str_contains(strtolower($alumno->nombre_hijo), strtolower($nombre)) : true) &&
                ($apaterno ? str_contains(strtolower($alumno->apaterno_hijo), strtolower($apaterno)) : true) &&
                ($amaterno ? str_contains(strtolower($alumno->amaterno_hijo), strtolower($amaterno)) : true);
        });
        return response()->json($alumnos);
    }
}
