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
use App\Http\Controllers\FacturaController;
use Spatie\Permission\Models\Role;

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

Route::get('/', LoginController::class)->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Correo
Route::get('/enviarCorreo', [FacturaController::class, 'enviarCorreo']);


// Route::middleware(['administrador'])->group(function () {

// });

Route::middleware(['auth'])->group(function () {

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
