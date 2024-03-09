<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Aquí puedes enviar el correo de verificación
        Mail::to($user->email)->send(new VerifyEmail($user));

        // Redireccionar a alguna parte de tu aplicación
        return redirect()->route('ruta-donde-redirigir');

        // Puedes agregar mensajes de éxito o error según sea necesario
    }
}
