<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = "cuotas";
    public $timestamps = false;
    protected $fillable = ['id', 'clientes_id', 'concepto', 'fechaEmision', 'importe', 'pagada', 'fechaPago', 'notas'];
}
