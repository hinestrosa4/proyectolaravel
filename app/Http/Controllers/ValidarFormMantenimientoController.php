<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use Illuminate\Http\Request;

class ValidarFormMantenimientoController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required|after:now',
            'notas' => 'required',
        ]);

        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $data['clientes_id'] = $cliente->id;
            $data['importe'] = $cliente->cuota;
            Cuota::create($data);
        }

        session()->flash('message', 'La cuota ha sido creada correctamente.');
        return redirect()->route('formMantenimiento');
    }
}