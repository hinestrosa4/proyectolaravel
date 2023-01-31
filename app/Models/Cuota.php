<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuota extends Model
{
    use SoftDeletes;
    protected $table = "cuotas";
    public $timestamps = false;
    protected $fillable = ['id', 'clientes_id', 'concepto', 'fechaEmision', 'importe', 'pagada', 'fechaPago', 'notas'];

    public function cliente()
{
    return $this->belongsTo(Cliente::class, 'clientes_id');
}

}
