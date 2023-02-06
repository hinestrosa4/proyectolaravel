<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return view('login');
  }

  public function login(Request $request)
  {
      $credentials = $request->only(['correo', 'clave']);
      
      if (Auth::guard('empleado')->attempt($credentials)) {
        $empleado = Auth::empleado();
          
          if ($empleado->es_admin) {
              return redirect()->route('listaTareas');
          } else {
              return redirect()->route('listaClientes');
          }
      }
      
      return back()->withInput()->withErrors(['message' => 'Credenciales inválidas']);
  }
  
}
