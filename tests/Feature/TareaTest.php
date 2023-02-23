<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class TareaTest extends TestCase
{

    //Menu principal, noticias

    public function test_formTarea()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('formTarea'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('formTarea');
    }

    public function test_listaTareas()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('listaTareas'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('listaTareas');
    }

    public function test_listaTareasOperario()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'santi@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('listaTareasOperario'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('listaTareas');
    }


    public function test_confirmacionBorrar()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'santi@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('confirmacionBorrar', ['tarea' => 24]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('confirmacionBorrar');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('tarea');
    }

    public function test_formTareaEdit()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'santi@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('formTareaEdit', ['tarea' => 24]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('formTareaEdit');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('tarea');
    }

    public function test_formTareaCompletar()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'santi@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('formTareaCompletar', ['tarea' => 24]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('formTareaCompletar');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('tarea');
    }

    public function test_detallesTareaOperario()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'santi@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('detallesTareaOperario', ['tarea' => 24]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('verDetalles');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('tarea');
    }
}
