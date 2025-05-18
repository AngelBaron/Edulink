<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentosController extends Controller
{
    public function mostrar()
    {
        $alumno = Alumno::where('user_id', Auth::user()->id)->first();
        $documents = Document::where('alumno_id', $alumno->id)->get();

        if ($documents->isEmpty()) {
            return view('documentos');
        } else {
            return view('DocumentosVerAlumno', compact('documents'));
        }
    }



    public function subirDoc(Request $request)
    {
        $request->validate([
            'curp' => 'required|file|mimes:pdf,doc,docx',
            'acta' => 'required|file|mimes:pdf,doc,docx',
            'ine' => 'required|file|mimes:pdf,doc,docx',
        ]);



        $curp = $request->file('curp');
        $nombreArchivoCurp = time() . '_' . $curp->getClientOriginalName();
        $curp->storeAs('documents', $nombreArchivoCurp);

        $acta = $request->file('acta');
        $nombreArchivoActa = time() . '_' . $acta->getClientOriginalName();
        $acta->storeAs('documents', $nombreArchivoActa);

        $ine = $request->file('ine');
        $nombreArchivoIne = time() . '_' . $ine->getClientOriginalName();
        $ine->storeAs('documents', $nombreArchivoIne);

        $alumno = Alumno::where('user_id', Auth::user()->id)->first();

        $DocumentActa = new Document();
        $DocumentActa->ubicacion = $nombreArchivoActa;
        $DocumentActa->file_name = $acta->getClientOriginalName();
        $DocumentActa->alumno_id = $alumno->id;
        $DocumentActa->tipo = 'acta';
        $DocumentActa->save();

        $DocumentCurp = new Document();
        $DocumentCurp->ubicacion = $nombreArchivoCurp;
        $DocumentCurp->file_name = $curp->getClientOriginalName();
        $DocumentCurp->alumno_id = $alumno->id;
        $DocumentCurp->tipo = 'curp';
        $DocumentCurp->save();

        $DocumentIne = new Document();
        $DocumentIne->ubicacion = $nombreArchivoIne;
        $DocumentIne->file_name = $ine->getClientOriginalName();
        $DocumentIne->alumno_id = $alumno->id;
        $DocumentIne->tipo = 'ine';
        $DocumentIne->save();




        // Aquí puedes guardar la ruta en la base de datos si es necesario

        return redirect()->route('SubirDocumentos')->with('success', 'Documento subido correctamente.');
    }

    public function ActualizarDocumentos(Request $request)
    {
        $request->validate([
            'curp' => 'required|file|mimes:pdf,doc,docx',
            'acta' => 'required|file|mimes:pdf,doc,docx',
            'ine' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $alumno = Alumno::where('user_id', Auth::user()->id)->first();

        // CURP
        $curp = $request->file('curp');
        $nombreArchivoCurp = time() . '_' . $curp->getClientOriginalName();
        $curp->storeAs('documents', $nombreArchivoCurp);

        $docCurp = Document::where('alumno_id', $alumno->id)->where('tipo', 'curp')->first();
        if ($docCurp) {
            $docCurp->ubicacion = $nombreArchivoCurp;
            $docCurp->file_name = $curp->getClientOriginalName();
            $docCurp->validado = 0;
            $docCurp->save();
        } else {
            Document::create([
                'ubicacion' => $nombreArchivoCurp,
                'file_name' => $curp->getClientOriginalName(),
                'alumno_id' => $alumno->id,
                'tipo' => 'curp',
                'validado' => 0,
            ]);
        }

        // ACTA
        $acta = $request->file('acta');
        $nombreArchivoActa = time() . '_' . $acta->getClientOriginalName();
        $acta->storeAs('documents', $nombreArchivoActa);

        $docActa = Document::where('alumno_id', $alumno->id)->where('tipo', 'acta')->first();
        if ($docActa) {
            $docActa->ubicacion = $nombreArchivoActa;
            $docActa->file_name = $acta->getClientOriginalName();
            $docActa->validado = 0;
            $docActa->save();
        } else {
            Document::create([
                'ubicacion' => $nombreArchivoActa,
                'file_name' => $acta->getClientOriginalName(),
                'alumno_id' => $alumno->id,
                'tipo' => 'acta',
                'validado' => 0,
            ]);
        }

        // INE
        $ine = $request->file('ine');
        $nombreArchivoIne = time() . '_' . $ine->getClientOriginalName();
        $ine->storeAs('documents', $nombreArchivoIne);

        $docIne = Document::where('alumno_id', $alumno->id)->where('tipo', 'ine')->first();
        if ($docIne) {
            $docIne->ubicacion = $nombreArchivoIne;
            $docIne->file_name = $ine->getClientOriginalName();
            $docIne->validado = 0;
            $docIne->save();
        } else {
            Document::create([
                'ubicacion' => $nombreArchivoIne,
                'file_name' => $ine->getClientOriginalName(),
                'alumno_id' => $alumno->id,
                'tipo' => 'ine',
                'validado' => 0,
            ]);
        }

        return redirect()->route('SubirDocumentos')->with('success', 'Documentos actualizados correctamente y enviados para validación.');
    }

    public function verDocument($nombreArchivo)
    {
        $path = storage_path('app\private\documents\\' . $nombreArchivo);

        if (!file_exists($path)) {
            dd("Archivo no encontrado: " . $path);
        }

        return response()->file($path); // o ->download($path)
    }
}
