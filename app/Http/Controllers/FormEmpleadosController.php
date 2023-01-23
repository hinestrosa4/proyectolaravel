<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class FormEmpleadosController extends Controller
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
        $empleados = Empleado::orderBy('id', 'asc')->paginate(10);
        return view('listaEmpleados', compact('empleados'));
    }

    public function confirmarBorrar(Empleado $empleado)
    {
        return view('confirmacionBorrarEmpleado', compact('empleado'));
    }

    public function borrarEmpleado(Empleado $empleado)
    {
        $empleado->delete();
        session()->flash('message', 'El empleado ha sido borrada correctamente.');
        return redirect()->route('listaEmpleados');
    }
}
