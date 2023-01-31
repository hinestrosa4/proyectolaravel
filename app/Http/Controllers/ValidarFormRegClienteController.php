<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Rules\Validaciones;
use Illuminate\Http\Request;

class ValidarFormRegClienteController extends Controller
{
    public function store()
    {
        $datos = request()->validate([
            'cif' => ['required', function ($attribute, $value, $fail) {
                $validarCIF = new Validaciones();
                if (!$validarCIF->validateCIF($value)) {
                    $fail("The " . $attribute . ' is invalid.');
                }
            }],
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'iban' => 'required|regex:/^ES\d{2}\d{4}\d{4}\d{2}\d{10}$/',
            'cuota' => 'required|numeric',
            'paises_id' => 'required',
            'moneda' => 'required',
        ]);

        Cliente::create($datos);
        session()->flash('message', 'El cliente ha sido registrado correctamente');
        return redirect()->route('formRegCliente');

        //return view('formRegCliente');
    }
}
