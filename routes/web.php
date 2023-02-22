<?php

use App\Http\Controllers\EmailController;
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
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\FormIncidenciaClienteController;
use App\Http\Controllers\RecuperarPassController;
use App\Http\Controllers\ValidarIncidenciaCliente;
use App\Http\Controllers\MiCuentaController;


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
/*---------- LOGIN ----------*/

Route::get('/', LoginController::class)->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/*---------- Incidencia Cliente ----------*/
Route::get('/formIncidenciaCliente', FormIncidenciaClienteController::class)->name('formIncidenciaCliente');
Route::post('formIncidenciaCliente', [ValidarIncidenciaCliente::class, 'store']);

//Correo
Route::get('/email', [EmailController::class, 'store'])->name('email');
Route::get('/formRecuperarPass', RecuperarPassController::class)->name('formRecuperarPass');
Route::post('recuperarPass', [RecuperarPassController::class, 'store'])->name('recuperarPass');

//Correo Factura
Route::get('/enviarCuotaCorreo/{empleado}/{cuota}', [EmailController::class, 'enviarCuota'])->name('enviarCuotaCorreo');

//Factura
Route::get('/generatePDF/{id}', FacturaController::class)->name('generatePDF');


Route::middleware(['auth'])->group(function () {

    /*---------- MI CUENTA ----------*/
    Route::get('formMiCuenta/{empleado}/editar', [MiCuentaController::class, '__invoke'])->name('formMiCuenta');
    Route::put('/formMiCuentaUpdate/{empleado}', [MiCuentaController::class, 'update'])->name('formMiCuentaUpdate');

    Route::middleware(['administrador'])->group(function () {
        /*---------- EMPLEADO ----------*/
        Route::get('/formRegEmpleado', FormEmpleadosController::class)->name('formRegEmpleado');
        Route::post('formRegEmpleado', [ValidarFormRegEmpleadoController::class, 'store']);

        /*----- Listar -----*/
        Route::get('/listaEmpleados', [FormEmpleadosController::class, 'listar'])->name('listaEmpleados');

        /*----- Borrar -----*/
        Route::get('/confirmacionBorrarEmpleado/{empleado}', [FormEmpleadosController::class, 'confirmarBorrar'])->name('confirmacionBorrarEmpleado');
        Route::delete('/borrarEmpleado/{empleado}', [FormEmpleadosController::class, 'borrarEmpleado'])->name('borrarEmpleado');

        /*--- Modificar ---*/
        Route::get('formEmpleadoEdit/{empleado}/editar', [FormEmpleadosController::class, 'edit'])->name('formEmpleadoEdit');
        Route::put('/formEmpleadoUpdate/{empleado}', [FormEmpleadosController::class, 'update'])->name('formEmpleadoUpdate');
    });

    Route::middleware(['administrador'])->group(function () {
        /*---------- CLIENTE ----------*/
        Route::get('/formRegCliente', FormRegClienteController::class)->name('formRegCliente');
        Route::post('formRegCliente', [ValidarFormRegClienteController::class, 'store']);

        /*----- Listar -----*/
        Route::get('/listaClientes', [FormClienteController::class, 'listar'])->name('listaClientes');

        /*----- Borrar -----*/
        Route::get('/confirmacionBorrarCliente/{cliente}', [FormClienteController::class, 'confirmarBorrar'])->name('confirmacionBorrarCliente');
        Route::delete('/borrarCliente/{cliente}', [FormClienteController::class, 'borrarCliente'])->name('borrarCliente');
    });

    Route::middleware(['administrador'])->group(function () {
        /*---------- CUOTAS ----------*/
        Route::get('/formMantenimiento', FormMantenimientoController::class)->name('formMantenimiento'); //Remesa Mensual
        Route::get('/formCuotaExcep', FormCuotaExcep::class)->name('formCuotaExcep'); //Cuota Excepcional
        Route::post('formMantenimiento', [ValidarFormMantenimientoController::class, 'store']); //Remesa Mensual
        Route::post('formCuotaExcep', [ValidarFormCuotaExcep::class, 'store']); //Cuota Excepcional

        /*----- Listar -----*/
        Route::get('/listaCuotas/{filtro}', [FormMantenimientoController::class, 'listar'])->name('listaCuotas');

        /*----- Borrar -----*/
        Route::get('/confirmacionBorrarCuota/{cuota}', [FormMantenimientoController::class, 'confirmarBorrar'])->name('confirmacionBorrarCuota');
        Route::delete('/borrarCuota/{cuota}', [FormMantenimientoController::class, 'borrarCuota'])->name('borrarCuota');

        /*--- Modificar ---*/
        Route::get('formCuotaEdit/{cuota}/editar', [FormMantenimientoController::class, 'edit'])->name('formCuotaEdit');
        Route::put('/formCuotaUpdate/{cuota}', [FormMantenimientoController::class, 'update'])->name('formCuotaUpdate');
    });


    /*---------- TAREA ----------*/
    Route::middleware(['administrador'])->group(function () {
        Route::get('/formTarea', FormTareaController::class)->name('formTarea');
        Route::post('formTarea', [ValidarFormTareaController::class, 'store']);
    });

    /*----- Listar -----*/
    Route::get('/listaTareas', [FormTareaController::class, 'listar'])->name('listaTareas');
    Route::get('/listaTareasOperario', [FormTareaController::class, 'listarOperario'])->name('listaTareasOperario');
    Route::get('tareas/{tarea}', [FormTareaController::class, 'verDetalles'])->name('verDetalles');

    /*----- Borrar -----*/
    Route::get('/confirmacionBorrar/{tarea}', [FormTareaController::class, 'confirmarBorrar'])->name('confirmacionBorrar');
    Route::delete('/borrarTarea/{tarea}', [FormTareaController::class, 'borrarTarea'])->name('borrarTarea');

    /*--- Modificar ---*/
    Route::get('formTareaEdit/{tarea}/editar', [FormTareaController::class, 'edit'])->name('formTareaEdit');
    Route::put('/formTareaUpdate/{tarea}', [FormTareaController::class, 'update'])->name('formTareaUpdate');

    /*--- Completar ---*/
    Route::middleware(['operario'])->group(function () {
        Route::get('formTareaCompletar/{tarea}/completar', [FormTareaController::class, 'completar'])->middleware('VerificarEmpleadoTarea')->name('formTareaCompletar');
        Route::put('/formTareaUpdateCompletar/{tarea}', [FormTareaController::class, 'updateCompletar'])->name('formTareaUpdateCompletar');
    });

    /*----- Listar de Operario -----*/
    Route::middleware(['operario'])->group(function () {
        //Ver detalles de una Tarea siendo operario
        Route::get('/detallesTareaOperario/{tarea}', [FormTareaController::class, 'verDetalles'])->middleware('VerificarEmpleadoTarea')->name('detallesTareaOperario');
    });
});
