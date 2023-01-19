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
        $tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(2);
        return view('listaTareas', compact('tareas'));
    }

    public function confirmarBorrar(Request $request){
        $tarea = Tarea::find($request->id);
        return view ('confirmacionBorrar')->with('tarea', $tarea);
    }

    public function borrarTarea(Request $request){
        Tarea::find($request->id)->delete();
        session()->flash('message', 'La tarea ha sido borrada correctamente');
        return redirect()->route('listaTareas');
        }
}
