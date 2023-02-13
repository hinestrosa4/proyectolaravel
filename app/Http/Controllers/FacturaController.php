<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class FacturaController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        /** Obtenemos los parametros */
        $asunto = $request->asunto;
        $contenido = $request->contenido;
        $adjunto = $request->file('adjunto');
        /**
         * El primer parametro es nuestra vista
         * El segundo parametro son los valores a inyectar en la vista
         * El tercer parametro es la instancia que define los métodos necesarios para el envío del correo
         * use() nos permite introducir valores dentro del closure para ser utilizadas por la instancia
         */
        Mail::send('email', ['contenido' => $contenido], function ($mail) use ($asunto, $adjunto) {
            $mail->from('no-reply@miapp.com', 'Bot de correos');
            $mail->to('hinestrosarafa@mail.com');
            $mail->subject($asunto);
            $mail->attach($adjunto);
        });
        /** Respondemos con status OK */
        if (!$asunto) {
            return response()->json(['status' => 400, 'message' => 'El asunto es obligatorio']);
        }
        
        
    }
}
