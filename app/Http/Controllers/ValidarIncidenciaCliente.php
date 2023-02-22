<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ValidarIncidenciaCliente extends Controller
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
            'clientes_telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',

            'clientes_id' => 'required',
            'nombre' => 'required|min:3',
            'descripcion' => 'required|min:5',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => 'required|regex:/^\d{5}(-\d{4})?$/',
            'provincia' => 'required',
            'estado' => '',
            //  'empleados_id' => 'required',
            'fechaRealizacion' => 'required|after:now',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        ]);

        $cliente = Cliente::where('cif', $datos['clientes_id'])
            ->where('telefono', $datos['clientes_telefono'])
            ->first();
        //dd($cliente, $datos);
        if ($cliente && $cliente->telefono === $datos['clientes_telefono']) {
            //dd("bien");
            unset($datos['clientes_telefono']);
            $datos['clientes_id']=$cliente->id;
            $datos['estado'] = 'P';
            $datos['fechaCreacion'] = (new \DateTime())->format('Y-m-d');

            Tarea::create($datos);

            session()->flash('message', 'La tarea ha sido registrado correctamente');
            return redirect()->route('formIncidenciaCliente');
        } else {
            session()->flash('error', 'El teléfono no coincide con el registro del cliente.');
            return redirect()->route('formIncidenciaCliente');
        }
    }
}
