<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidarFormMantenimientoController extends Controller
{
    public function store(){
        request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required',
            'pagada' => '',
            'fechaPago' => 'required',
            'notas' => 'required',
        ]);

        return view('formMantenimiento');
    }
}
