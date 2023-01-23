<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormRegEmpleadoController;
use App\Http\Controllers\FormRegClienteController;
use App\Http\Controllers\FormMantenimientoController;
use App\Http\Controllers\FormTareaController;
use App\Http\Controllers\ValidarFormRegEmpleadoController;
use App\Http\Controllers\ValidarFormRegClienteController;
use App\Http\Controllers\ValidarFormMantenimientoController;
use App\Http\Controllers\ValidarFormTareaController;
use App\Http\Controllers\FormClienteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Mostrar vistas
Route::get('/formRegEmpleado', FormRegEmpleadoController::class)->name('formRegEmpleado');
Route::get('/formRegCliente', FormRegClienteController::class)->name('formRegCliente');
Route::get('/formMantenimiento', FormMantenimientoController::class)->name('formMantenimiento');
Route::get('/formTarea', FormTareaController::class)->name('formTarea');
Route::get('/listaTareas', [FormTareaController::class, 'listar'])->name('listaTareas');
Route::get('/confirmacionBorrar/{tarea}', [FormTareaController::class, 'confirmarBorrar'])->name('confirmacionBorrar');
Route::get('/listaClientes', [FormClienteController::class, 'listar'])->name('listaClientes');
Route::delete('/borrarTarea/{tarea}', [FormTareaController::class, 'borrarTarea'])->name('borrarTarea');
Route::get('tareas/{tarea}', [FormTareaController::class, 'verDetalles'])->name('verDetalles');

//Recoger datos formulario
Route::post('formRegEmpleado', [ValidarFormRegEmpleadoController::class, 'store']);
Route::post('formRegCliente', [ValidarFormRegClienteController::class, 'store']);
Route::post('formMantenimiento', [ValidarFormMantenimientoController::class, 'store']);
Route::post('formTarea', [ValidarFormTareaController::class, 'store']);