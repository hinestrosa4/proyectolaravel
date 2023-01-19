<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ValidarFormTareaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'cliente' => 'required',
            'nombre' => 'required|min:3',
            'descripcion' => 'required|min:5',
            'direccion' => 'required|min:5',
            'poblacion' => 'required',
            'codigoPostal' => 'required|regex:/^\d{5}(-\d{4})?$/',
            'provincia' => 'required',
            'estado' => 'required',
            'operario' => 'required',
            'fechaRealizacion' => 'required|after:now',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        ]);

        $datos['fechaCreacion'] = (new \DateTime())->format('Y-m-d');
        Tarea::create($datos);
        session()->flash('message', 'La tarea ha sido registrado correctamente');
        return redirect()->route('formTarea');
    }
}
