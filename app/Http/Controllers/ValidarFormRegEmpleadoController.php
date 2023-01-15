<?php

namespace App\Http\Controllers;

use App\Http\Rules\Validaciones;
use Illuminate\Http\Request;

class ValidarFormRegEmpleadoController extends Controller
{
    public function store()
    {
        request()->validate([
            'dni' => ['required', function ($attribute, $value, $fail) {
                $validarDNI = new Validaciones();
                if (!$validarDNI->validateDni($value)) {
                    $fail("The ".$attribute.' is invalid.');
                }
            }],
            'nombre' => 'required|min:3',
            'direccion' => 'required|min:5',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'tipo' => 'required|in:op,admin',
        ]);

        return view('formRegEmpleado');
    }
}