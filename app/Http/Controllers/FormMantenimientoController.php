<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class FormMantenimientoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $clientes = Cuota::all();
        return view('formMantenimiento', compact('clientes'));
    }

    public function listar()
    {
        $cuotas = Cuota::orderBy('id', 'asc')->paginate(10);
        return view('listaCuotas', compact('cuotas'));
    }
}
