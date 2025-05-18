<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionAlumno;
use App\Models\Alumno;
use App\Models\Calificacion;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PadreController extends Controller
{
    protected static ?string $password;
    public function PadreRegisterView(){
        return view('RegistrarPadre');
    }


    public function PadreRegister(Request $request){
        $password = Str::random(10);
        $passwordHashed = Hash::make($password);
        $request->validate([
            'name' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
            'email' => 'required|email',
            'nombre_hijo' => 'required',
            'apaterno_hijo' => 'required',
            'amaterno_hijo' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'email' => $request->email,
            'password' => $passwordHashed,
            'role' => "Alumno",
        ]);

        $maestro = Maestro::where('user_id', Auth::user()->id)->first();

        $alumno = Alumno::create([
            'user_id' => $user->id,
            'maestro_id' => $maestro->id, 
            'nombre_hijo' => $request->nombre_hijo,
            'apaterno_hijo' => $request->apaterno_hijo,
            'amaterno_hijo' => $request->amaterno_hijo,
        ]);

        $materias = Materia::where('maestro_id', $maestro->id)->get();

        foreach ($materias as $materia) {
            Calificacion::create([
                'alumno_id' => $alumno->id,
                'materia_id' => $materia->id,
                'calificacion' => 0,
            ]);
        }

        Mail::to($user->email)->send(new NotificacionAlumno($user->name,$password));

        event(new Registered($user));


        return redirect()->route('RegistrarPadre')->with('success', 'Alumno guardado exitosamente');
    }
}
