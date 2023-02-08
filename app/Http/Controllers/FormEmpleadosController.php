<?php

namespace App\Http\Controllers;

use App\Http\Rules\Validaciones;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
         return view('formRegEmpleado');
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

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('formEmpleadoEdit', compact('empleado'));
    }

    public function update(Empleado $empleado)
{
    $datos = request()->validate([
        'nif' => ['required', function ($attribute, $value, $fail) {
            $validarDNI = new Validaciones();
            if (!$validarDNI->validateDni($value)) {
                $fail("The " . $attribute . ' is invalid.');
            }
        }],
        'nombre' => 'required|min:3',
        'password' => 'required|min:5',
        'fecha_alta' => 'required',
        'email' => 'required|email',
        'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        'es_admin' => 'required',
    ]);

     $datos['password'] = Hash::make($datos['password']);

    $empleado->update($datos);
    session()->flash('message', 'El empleado ha sido actualizada correctamente.');
    return redirect()->route('listaEmpleados');
}
}
