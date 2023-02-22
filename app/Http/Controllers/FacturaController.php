<?php
namespace App\Http\Controllers;

use App\Mail\NosecaenMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Models\Cuota;

class FacturaController extends Controller
{
      /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        // $cuota = Cuota::findOrFail($id);
    
        // $pdf = PDF::loadView('factura', compact('cuota'));
    
        // return $pdf->download('factura_cuota_'.($id).'.pdf');
    }
}
