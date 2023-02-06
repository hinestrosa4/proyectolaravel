<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Rules\Validaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ValidarFormRegEmpleadoController extends Controller
{
    public function store()
    {
        $datos = request()->validate([
            'nif' => ['required', function ($attribute, $value, $fail) {
                $validarDNI = new Validaciones();
                if (!$validarDNI->validateDni($value)) {
                    $fail("The " . $attribute . ' is invalid.');
                }
            }],
            'nombre' => 'required|min:3',
            'clave' => 'required|min:5',
            'fecha_alta' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'es_admin' => 'required',
        ]);

        // $datos['clave'] = Hash::make($datos['clave']);

        Empleado::create($datos);
        session()->flash('message', 'El empleado ha sido registrado correctamente');
        return redirect()->route('formRegEmpleado');
    }
}
