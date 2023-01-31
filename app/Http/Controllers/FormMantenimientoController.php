<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        $clientes = Cliente::all();
        return view('formMantenimiento', compact('clientes'));
    }

    public function listar()
    {
        $cuotas = Cuota::orderBy('id', 'asc')->paginate(10);
        return view('listaCuotas', compact('cuotas'));
    }

    public function confirmarBorrar(Cuota $cuota)
    {
        return view('confirmacionBorrarCuota', compact('cuota'));
    }

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota ha sido borrada correctamente.');
        return redirect()->route('listaCuotas');
    }
}
