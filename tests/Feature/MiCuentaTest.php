<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class MiCuentaTest extends TestCase
{

    //Menu principal, noticias

    public function test_formMiCuenta()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('formMiCuenta', ['empleado' => 9]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('formMiCuenta');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('empleado');
    }
}
