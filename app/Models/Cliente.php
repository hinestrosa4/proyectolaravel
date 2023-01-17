<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    public $timestamps = false;
    protected $fillable = ['cif', 'nombre', 'telefono', 'correo', 'iban', 'cuota', 'pais','moneda'];
    
}
