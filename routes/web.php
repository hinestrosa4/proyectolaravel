<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormCuotaExcep;
use App\Http\Controllers\FormRegClienteController;
use App\Http\Controllers\FormMantenimientoController;
use App\Http\Controllers\FormTareaController;
use App\Http\Controllers\FormClienteController;
use App\Http\Controllers\FormEmpleadosController;
use App\Http\Controllers\ValidarFormRegEmpleadoController;
use App\Http\Controllers\ValidarFormRegClienteController;
use App\Http\Controllers\ValidarFormMantenimientoController;
use App\Http\Controllers\ValidarFormTareaController;
use App\Http\Controllers\ValidarFormCuotaExcep;
use App\Http\Controllers\LoginController;

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
Route::get('/formRegEmpleado', FormEmpleadosController::class)->name('formRegEmpleado');
Route::get('/formRegCliente', FormRegClienteController::class)->name('formRegCliente');
Route::get('/formMantenimiento', FormMantenimientoController::class)->name('formMantenimiento');//Remesa Mensual
Route::get('/formCuotaExcep', FormCuotaExcep::class)->name('formCuotaExcep');//Cuota Excepcional
Route::get('/formTarea', FormTareaController::class)->name('formTarea');
Route::get('/listaTareas', [FormTareaController::class, 'listar'])->name('listaTareas');
Route::get('/listaClientes', [FormClienteController::class, 'listar'])->name('listaClientes');
Route::get('/listaEmpleados', [FormEmpleadosController::class, 'listar'])->name('listaEmpleados');
Route::get('tareas/{tarea}', [FormTareaController::class, 'verDetalles'])->name('verDetalles');
Route::get('/listaCuotas/{filtro}', [FormMantenimientoController::class, 'listar'])->name('listaCuotas');
Route::get('/login', LoginController::class)->name('login');

//Borrar
Route::get('/confirmacionBorrar/{tarea}', [FormTareaController::class, 'confirmarBorrar'])->name('confirmacionBorrar');
Route::delete('/borrarTarea/{tarea}', [FormTareaController::class, 'borrarTarea'])->name('borrarTarea');
Route::get('/confirmacionBorrarEmpleado/{empleado}', [FormEmpleadosController::class, 'confirmarBorrar'])->name('confirmacionBorrarEmpleado');
Route::delete('/borrarEmpleado/{empleado}', [FormEmpleadosController::class, 'borrarEmpleado'])->name('borrarEmpleado');
Route::get('/confirmacionBorrarCliente/{cliente}', [FormClienteController::class, 'confirmarBorrar'])->name('confirmacionBorrarCliente');
Route::delete('/borrarCliente/{cliente}', [FormClienteController::class, 'borrarCliente'])->name('borrarCliente');
Route::get('/confirmacionBorrarCuota/{cuota}', [FormMantenimientoController::class, 'confirmarBorrar'])->name('confirmacionBorrarCuota');
Route::delete('/borrarCuota/{cuota}', [FormMantenimientoController::class, 'borrarCuota'])->name('borrarCuota');

//Editar
Route::get('formTareaEdit/{tarea}/editar', [FormTareaController::class, 'edit'])->name('formTareaEdit');
Route::put('/formTareaUpdate/{tarea}', [FormTareaController::class, 'update'])->name('formTareaUpdate');
Route::get('formTareaCompletar/{tarea}/completar', [FormTareaController::class, 'completar'])->name('formTareaCompletar');
Route::put('/formTareaUpdateCompletar/{tarea}', [FormTareaController::class, 'updateCompletar'])->name('formTareaUpdateCompletar');
Route::get('formEmpleadoEdit/{empleado}/editar', [FormEmpleadosController::class, 'edit'])->name('formEmpleadoEdit');
Route::put('/formEmpleadoUpdate/{empleado}', [FormEmpleadosController::class, 'update'])->name('formEmpleadoUpdate');
Route::get('formCuotaEdit/{cuota}/editar', [FormMantenimientoController::class, 'edit'])->name('formCuotaEdit');
Route::put('/formCuotaUpdate/{cuota}', [FormMantenimientoController::class, 'update'])->name('formCuotaUpdate');

//Recoger datos formulario
Route::post('formRegEmpleado', [ValidarFormRegEmpleadoController::class, 'store']);
Route::post('formRegCliente', [ValidarFormRegClienteController::class, 'store']);
Route::post('formMantenimiento', [ValidarFormMantenimientoController::class, 'store']);//Remesa Mensual
Route::post('formCuotaExcep', [ValidarFormCuotaExcep::class, 'store']);//Cuota Excepcional
Route::post('formTarea', [ValidarFormTareaController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);