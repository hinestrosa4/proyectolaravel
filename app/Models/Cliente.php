<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    public $timestamps = false;
    protected $fillable = ['cif', 'paises_id', 'nombre', 'telefono', 'correo', 'iban', 'cuota', 'moneda'];
    
    public function paises()
{
    return $this->belongsTo(Pais::class, 'paises_id');
}

}
