<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class EmpleadoTest extends TestCase
{

    //Menu principal, noticias

    public function test_formRegEmpleado()
{
    // Autenticar al usuario
    $user = Empleado::where('email', 'luis@gmail.com')->first();
    $this->actingAs($user);

    // Simulamos una petición GET a la ruta '/formRegEmpleado'
    $response = $this->get(route('formRegEmpleado'));

    // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
    $response->assertStatus(200);

    // Verificamos que la vista 'formRegEmpleado' fue cargada
    $response->assertViewIs('formRegEmpleado');
}

public function test_listaEmpleados()
{
    // Autenticar al usuario
    $user = Empleado::where('email', 'luis@gmail.com')->first();
    $this->actingAs($user);

    // Simular una petición GET a la ruta '/listaEmpleados'
    $response = $this->get(route('listaEmpleados'));

    // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
    $response->assertStatus(200);

    // Verificar que la vista 'listaEmpleados' fue cargada
    $response->assertViewIs('listaEmpleados');

    // Verificar que se ha cargado al menos un empleado en la vista
    $response->assertViewHas('empleados');
}

public function test_confirmacionBorrarEmpleado()
{
    // Autenticar al usuario
    $user = Empleado::where('email', 'luis@gmail.com')->first();
    $this->actingAs($user);

    // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
    $response = $this->get(route('confirmacionBorrarEmpleado', ['empleado' => 9]));

    // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
    $response->assertStatus(200);

    // Verificar que la vista 'confirmarBorrar' fue cargada
    $response->assertViewIs('confirmacionBorrarEmpleado');

    // Verificamos que la vista contiene una variable llamada 'empleados'
    $response->assertViewHas('empleado');
}

public function test_formEmpleadoEdit()
{
    // Autenticar al usuario
    $user = Empleado::where('email', 'luis@gmail.com')->first();
    $this->actingAs($user);

    // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
    $response = $this->get(route('formEmpleadoEdit', ['empleado' => 9]));

    // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
    $response->assertStatus(200);

    // Verificar que la vista 'confirmarBorrar' fue cargada
    $response->assertViewIs('formEmpleadoEdit');

    // Verificamos que la vista contiene una variable llamada 'empleados'
    $response->assertViewHas('empleado');
}


}

