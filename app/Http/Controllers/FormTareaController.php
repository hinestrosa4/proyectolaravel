<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Empleado;
use Illuminate\Http\Request;

class FormTareaController extends Controller
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
        return view('formTarea', compact('clientes', 'provincias', 'empleados'));
    }

    public function listar()
    {
        $tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(10);
        return view('listaTareas', compact('tareas'));
    }

    public function confirmarBorrar(Tarea $tarea)
    {
        return view('confirmacionBorrar', compact('tarea'));
    }

    public function borrarTarea(Tarea $tarea)
    {
        $tarea->delete();
        session()->flash('message', 'La tarea ha sido borrada correctamente.');
        return redirect()->route('listaTareas');
    }

    public function verDetalles(Tarea $tarea)
    {
        return view('verDetalles', ['tarea' => $tarea]);
    }

    public function edit(Tarea $tarea)
    {
        $clientes = Cliente::all();
        $provincias = Provincia::all();
        $empleados = Empleado::all();
        return view('formTareaEdit', compact('tarea', 'clientes', 'provincias', 'empleados'));
    }

    public function update(Tarea $tarea)
    {
        $datos = request()->validate([
            'clientes_id' => 'required',
            'nombre' => 'required|min:3',
            'descripcion' => 'required|min:5',
            'direccion' => 'required|min:5',
            'poblacion' => 'required',
            'codigoPostal' => 'required|regex:/^\d{5}(-\d{4})?$/',
            'provincia' => 'required',
            'estado' => 'required',
            'empleados_id' => 'required',
            'fechaRealizacion' => 'required|after:now',
            'correo' => 'required|email',
            'anotacionesAnt' => '',
            'anotacionesPos' => '',
            // 'ficheroResumen' => 'required|file',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        ]);

        // $tarea->file('file');
        // $path = $tarea->store('App\Http\recourses\files');
        // $path = $tarea->storeAs('archivos', 'mi_archivo.jpg');



        $tarea->update($datos);
        session()->flash('message', 'La tarea ha sido actualizada correctamente.');
        return redirect()->route('listaTareas');
    }
}
