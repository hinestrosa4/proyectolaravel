<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Authenticatable
{
    use SoftDeletes;
    protected $table = "empleados";
    public $timestamps = false;
    protected $fillable = ['nif', 'nombre', 'password', 'fecha_alta', 'email', 'telefono', 'es_admin'];
}