<?php
namespace App\Http\Rules;

class Validaciones
{
    public function validateDni($dni)
    {
        if (strlen($dni) != 9) {
            return false;
        }
        $dni = strtoupper($dni);
        $letra = substr($dni, -1, 1);
        $numeros = substr($dni, 0, 8);
        if (!is_numeric($numeros)) {
            return false;
        }
        if ($letra != substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1)) {
            return false;
        }
        return true;
    }
}