<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use Illuminate\Http\Request;

class ValidarFormCuotaExcep extends Controller
{
    public function formularioCuota(Request $request)
    {
        $clientes = Cliente::all();
        return view('formCuotaExcep', compact('clientes'));
    }

    public function store()
    {
        $data = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'importe' => 'required',
            'fechaEmision' => 'required|after:now',
            'notas' => 'required',
        ]);

        Cuota::create($data);

        session()->flash('message', 'La cuota ha sido creada correctamente.');

        return redirect()->route('formCuotaExcep');
    }
}