<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $empleados = Empleado::whereNotNull('nif')->get();
        //$empleados = Empleado::all();
        return view('formTarea', compact('clientes', 'provincias', 'empleados'));
    }

    public function listar()
    {
        $tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(10);

        return view('listaTareas', compact('tareas'));
    }

    public function listarOperario()
    {
        $tareas = Tarea::where('empleados_id', Auth::user()->id)
            ->orderBy('fechaRealizacion', 'desc')
            ->paginate(10);
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
        $empleados = Empleado::whereNotNull('nif')->get();
        //$empleados = Empleado::all();
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
            'ficheroResumen' => 'file',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
        ]);

        if (request()->hasFile('ficheroResumen')) {

            $ficheroResumen = request()->file('ficheroResumen');
            $nombre_original = $ficheroResumen->getClientOriginalName();
            $path = $ficheroResumen->storeAs('public/files', $nombre_original);

            $datos['ficheroResumen'] = $nombre_original;
        }

        $tarea->update($datos);
        session()->flash('message', 'La tarea ha sido actualizada correctamente.');
        return redirect()->route('listaTareas');
    }

    public function completar(Tarea $tarea)
    {
        return view('formTareaCompletar', compact('tarea'));
    }

    public function updateCompletar(Tarea $tarea)
    {
        $datos = request()->validate([
            'estado' => 'required',
            'anotacionesAnt' => '',
            'anotacionesPos' => '',
            'ficheroResumen' => 'file',
        ]);

        if (request()->hasFile('ficheroResumen')) {

            $ficheroResumen = request()->file('ficheroResumen');
            $nombre_original = $ficheroResumen->getClientOriginalName();
            $path = $ficheroResumen->storeAs('public/files', $nombre_original);

            $datos['ficheroResumen'] = $nombre_original;
        }

        $tarea->update($datos);
        session()->flash('message', 'La tarea ha sido completada correctamente.');
        return redirect()->route(Auth::check() && Auth::user()->es_admin === 1 ? 'listaTareas' : 'listaTareasOperario');
    }
}
