<?php

namespace App\Http\Controllers;

use App\Http\Rules\Validaciones;
use Illuminate\Http\Request;

class ValidarFormRegClienteController extends Controller
{
    public function store(){
        request()->validate([
            'cif' => ['required', function ($attribute, $value, $fail) {
                $validarCIF = new Validaciones();
                if (!$validarCIF->validateCIF($value)) {
                    $fail("The ".$attribute.' is invalid.');
                }
            }],
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'iban' => 'required|regex:/^ES\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/',
            'cuota' => 'required|numeric',
        ]);
        return view('formRegCliente');
    }
}