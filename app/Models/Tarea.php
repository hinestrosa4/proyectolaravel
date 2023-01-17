<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = "tareas";
    public $timestamps = false;
    protected $fillable = [
        'id', 'cliente', 'nombre', 'telefono', 'correo', 'descripcion', 'direccion', 'poblacion',
        'estado', 'operario', 'fechaRealizacion', 'codigoPostal', 'provincia', 'anotacionesAnt',
        'anotacionesPos', 'ficheroResumen'];
}
