<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class ValidarFormCuotaExcep extends Controller
{
    public function formularioCuota(Request $request)
    {
        $clientes = Cliente::all();
        return view('formCuotaExcep', compact('clientes'));
    }

    public function store()
    {
        $data = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'importe' => 'required',
            'fechaEmision' => 'required|after:now',
            'notas' => 'required',
        ]);

        $cuota = Cuota::create($data);

        $email = 'hinestrosarafa@gmail.com';

        $pdf = PDF::loadView('factura', compact('cuota'));
        $pdf_content = $pdf->output();

        Mail::send('email.cuotaPDF', ['empleado' => $data], function ($message) use ($email, $pdf_content) {
            $message->to($email)
                ->subject("Factura")
                ->attachData($pdf_content, 'Factura.pdf');
        });

        session()->flash('message', 'La cuota ha sido creada correctamente.');

        return redirect()->route('formCuotaExcep');
    }
}