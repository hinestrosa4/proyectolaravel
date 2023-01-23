<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class ValidarFormMantenimientoController extends Controller
{
    public function store()
    {
        $datos = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required|numeric',
            'pagada' => '',
            'fechaPago' => 'required',
            'notas' => 'required',
        ]);

        Cuota::create($datos);
        session()->flash('message', 'La cuota ha sido registrado correctamente');
        return redirect()->route('formMantenimiento');
    }
}
