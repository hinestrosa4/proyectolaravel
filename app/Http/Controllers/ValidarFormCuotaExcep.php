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

        $cliente = Cliente::where('id', $cuota['clientes_id'])->first();

        $tipo_cambio = "";

        if ($cliente['moneda'] != "EUR") {
            $tipo_cambio = $this->obtenerTipoDeCambio($cliente, $cuota);
        }
        $pdf = PDF::loadView('factura', compact('cuota', 'cliente', 'tipo_cambio'));
        $pdf_content = $pdf->output();

        Mail::send('email.cuotaPDF', ['cliente' => $data], function ($message) use ($email, $pdf_content) {
            $message->to($email)
                ->subject("Factura")
                ->attachData($pdf_content, 'Factura.pdf');
        });

        session()->flash('message', 'La cuota ha sido creada correctamente.');

        return redirect()->route('formCuotaExcep');
    }

    public function obtenerTipoDeCambio($cliente, $cuota)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=EUR&from=" . $cliente['moneda'] . "&amount=" . $cuota['importe'] . "",
            CURLOPT_HTTPHEADER => [
                "Content-Type: text/plain",
                "apikey: 9YH7VFtYyRiTEAvPcOywJj1QftMZz9zV"
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        return [
            'importe_api' => $response["result"],
            'fecha_conversion' => $response["date"],
            'rate' => $response["info"]["rate"]
        ];
    }
}
