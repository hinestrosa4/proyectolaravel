<?php

namespace App\Http\Controllers;

use App\Http\Rules\Validaciones;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MiCuentaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('formMiCuenta', compact('empleado'));
    }

    public function update(Empleado $empleado)
    {
        $datos = request()->validate([
            'nombre' => 'required|min:3',
            'fecha_alta' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        ]);

        $empleado->update($datos);
        session()->flash('message', 'Tus datos han sido actualizada correctamente.');
        return redirect()->route('listaEmpleados');
    }
}
