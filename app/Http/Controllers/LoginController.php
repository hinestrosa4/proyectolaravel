<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {

            $empleado = Empleado::where('email', $request->email)->first();

            if ($empleado->es_admin === 1) {
                session(['administrador']);
                return redirect()->route('listaEmpleados');
            } else {
                session(['operario' => $empleado->role]);
                return redirect()->route('listaTareas');
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Correo o contraseña incorrectos']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}