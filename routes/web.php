<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Mostrar vistas
Route::get('/formRegEmpleado', 'App\Http\Controllers\FormRegEmpleadoController')->name('formRegEmpleado');
Route::get('/formRegCliente', 'App\Http\Controllers\FormRegClienteController')->name('formRegCliente');
Route::get('/formMantenimiento', 'App\Http\Controllers\FormMantenimientoController')->name('formMantenimiento');

//Recoger datos formulario
Route::post('formRegEmpleado', 'App\Http\Controllers\ValidarFormRegEmpleadoController@store');
Route::post('formRegCliente', 'App\Http\Controllers\ValidarFormRegClienteController@store');
Route::post('formMantenimiento', 'App\Http\Controllers\ValidarFormMantenimientoController@store');