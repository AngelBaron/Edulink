<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionMaestro;
use App\Models\Canal;
use App\Models\Maestro;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MaestroController extends Controller
{
    protected static ?string $password;
    public function mostrar(){
        return view('RegistroMaestro');
    }

    public function registrar(Request $request){
        $password = Str::random(10);
        $passwordHashed = Hash::make($password);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apaterno' => ['required', 'string', 'max:255'],
            'amaterno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'email' => $request->email,
            'password' => $passwordHashed,
            'role' => "Maestro",
        ]);

        $maestro = Maestro::create([
            'user_id' => $user->id,
        ]);

        Canal::create([
            'maestro_id' => $maestro->id,
        ]);

        Mail::to($user->email)->send(new NotificacionMaestro($user->name,$password));

        event(new Registered($user));

        return redirect()->route('RegistroMaestro')->with('success','Maestro registrado correctamente');

    }
}
