<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class FormClienteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function listar()
    {
        $clientes = Cliente::orderBy('id', 'asc')->paginate(10);
        return view('listaClientes', compact('clientes'));
    }

    public function confirmarBorrar(Cliente $cliente)
    {
        return view('confirmacionBorrarCliente', compact('cliente'));
    }

    public function borrarCliente(Cliente $cliente)
    {
        $cliente->delete();
        session()->flash('message', 'El cliente ha sido borrada correctamente.');
        return redirect()->route('listaClientes');
    }
}
