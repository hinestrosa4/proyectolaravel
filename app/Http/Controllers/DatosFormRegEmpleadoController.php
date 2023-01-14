<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosFormRegEmpleadoController extends Controller
{
    public function store(){

        request()->validate([
            'dni' => 'required|min:9',
            'nombre' => 'required|min:3',
            'direccion' => 'required|min:5',
            'correo' => 'required|email',
            'telefono' => 'required|min:9|max:9',
            'tipo' => 'required|in:op,admin'
        ]);

        return view('formRegEmpleado');
    }
}
