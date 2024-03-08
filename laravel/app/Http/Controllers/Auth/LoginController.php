<?php
// app/Http/Controllers/Auth/LoginController.php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember')) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('privada'));
        }

        // Si la autenticación falla, redirige de nuevo al formulario de inicio de sesión
        return redirect()->route('usuarios.login')->with('error', 'Credenciales incorrectas. Por favor, intenta de nuevo.');
    }
}
