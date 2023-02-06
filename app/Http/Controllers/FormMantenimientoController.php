<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Cuota;
use Illuminate\Http\Request;

class FormMantenimientoController extends Controller
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
        return view('formMantenimiento', compact('clientes'));
    }

    // public function listar()
    // {
    //     $cuotas = Cuota::orderBy('id', 'asc')->paginate(10);
    //     return view('listaCuotas', compact('cuotas'));
    // }

    public function listar($filtro = "")
    {
        $tareas = Tarea::all();
        switch ($filtro) {
            case "NO":
                $cuotas = Cuota::where('pagada', 'NO')->orderBy('fechaEmision', 'asc')->paginate(10);
                break;
            case "SI":
                $cuotas = Cuota::where('pagada', 'SI')->orderBy('fechaEmision', 'asc')->paginate(10);
                break;
            case "fechaPago":
                $cuotas = Cuota::orderBy('fechaPago', 'desc')->paginate(10);
                break;
            default:
                $cuotas = Cuota::orderBy('fechaEmision', 'desc')->paginate(10);
                break;
        }
        return view('listaCuotas', compact('cuotas', 'tareas'));
    }

    public function confirmarBorrar(Cuota $cuota)
    {
        return view('confirmacionBorrarCuota', compact('cuota'));
    }

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota ha sido borrada correctamente.');
        return redirect()->route('listaCuotas','fechaEmision');
    }

    public function edit($id)
    {
        $cuota = Cuota::findOrFail($id);
        $clientes = Cliente::all();
        return view('formCuotaEdit', compact('cuota','clientes'));
    }

    public function update(Cuota $cuota)
{
    $datos = request()->validate([
        'clientes_id' => 'required',
        'concepto' => 'required',
        'fechaEmision' => 'required',
        'importe' => 'required|numeric',
        'pagada' => '',
        'fechaPago' => 'required',
        'notas' => 'required',
    ]);

    $cuota->update($datos);
    session()->flash('message', 'La cuota ha sido actualizada correctamente.');
    return redirect()->route('listaCuotas','fechaEmision');
}
}
