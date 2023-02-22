<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Empleado;
use Illuminate\Http\Request;

class FormIncidenciaClienteController extends Controller
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
        $provincias = Provincia::all();
        $empleados = Empleado::all();
        return view('formIncidenciaCliente', compact('clientes', 'provincias', 'empleados'));
     }
}
