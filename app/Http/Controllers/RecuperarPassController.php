<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Hash;

class RecuperarPassController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('formRecuperarPass');
    }

    public function store()
    {
        $data = request()->validate([
            'correo' => 'required',
        ]);

        $emailController = new EmailController();
        $password = $emailController->store($data['correo']);

        // Buscamos el empleado correspondiente al correo proporcionado
        $empleado = Empleado::where('email', $data['correo'])->first();
        if ($empleado) {
            $empleado->update(['password' => Hash::make($password)]);
        } else {
            // Manejar el caso en el que no se encuentra ningún empleado con el correo electrónico proporcionado
        }

        session()->flash('message', 'El correo ha sido enviado correctamente.');
        return redirect()->route('formRecuperarPass');
    }
}
