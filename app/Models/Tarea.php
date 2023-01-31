<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use SoftDeletes;
    protected $table = "tareas";
    public $timestamps = false;
    protected $fillable = [
        'id', 'nombre', 'telefono', 'correo', 'descripcion', 'direccion', 'poblacion',
        'estado', 'operario', 'fechaRealizacion', 'fechaCreacion', 'codigoPostal', 'provincia', 'anotacionesAnt',
        'anotacionesPos', 'ficheroResumen', 'clientes_id', 'empleados_id'];

        public function cliente()
        {
            return $this->belongsTo('App\Models\Cliente', 'clientes_id');
        }

        public function empleado()
        {
            return $this->belongsTo('App\Models\Empleado', 'empleados_id');
        }
}
