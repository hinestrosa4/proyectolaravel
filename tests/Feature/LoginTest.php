<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class LoginTest extends TestCase
{

    //Menu principal, noticias

    public function test_login()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('login'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('login');
    }
}
