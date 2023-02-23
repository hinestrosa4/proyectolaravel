<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class ClienteTest extends TestCase
{

    //Menu principal, noticias

    public function test_formRegCliente()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('formRegCliente'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('formRegCliente');
    }

    public function test_listaClientes()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('listaClientes'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('listaClientes');
    }

    public function test_confirmarBorrar()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('confirmacionBorrarCliente', ['cliente' => 9]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('confirmacionBorrarCliente');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cliente');
    }
}
