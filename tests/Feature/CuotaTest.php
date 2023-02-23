<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Empleado;

class CuotaTest extends TestCase
{

    //Menu principal, noticias

    public function test_formMantenimiento()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('formMantenimiento'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('formMantenimiento');
    }

    public function test_formCuotaExcep()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simulamos una petición GET a la ruta '/formRegEmpleado'
        $response = $this->get(route('formCuotaExcep'));

        // Verificamos que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificamos que la vista 'formRegEmpleado' fue cargada
        $response->assertViewIs('formCuotaExcep');
    }

    public function test_listaCuotas()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('listaCuotas', ['filtro' => "SI"]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('listaCuotas');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuotas');
    }

    public function test_confirmacionBorrarCuota()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('confirmacionBorrarCuota', ['cuota' => 53]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('confirmacionBorrarCuota');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuota');
    }

    public function test_formCuotaEdit()
    {
        // Autenticar al usuario
        $user = Empleado::where('email', 'luis@gmail.com')->first();
        $this->actingAs($user);

        // Simular una petición GET a la ruta '/confirmacionBorrarEmpleado/{empleado}'
        $response = $this->get(route('formCuotaEdit', ['cuota' => 53]));

        // Verificar que la petición fue exitosa (código de respuesta HTTP 200)
        $response->assertStatus(200);

        // Verificar que la vista 'confirmarBorrar' fue cargada
        $response->assertViewIs('formCuotaEdit');

        // Verificamos que la vista contiene una variable llamada 'empleados'
        $response->assertViewHas('cuota');
    }

    public function test_FormularioCuotaExcep()
    {
        $user = Empleado::where('email', 'luis@gmail.com')->first();

        $response = $this->actingAs($user)
            ->post('cuota', [
                'clientes_id' => 1,
                'concepto' => 'Netflix',
                'fechaEmision' => '2023-02-13',
                'importe' => '100',
                'pagada' => 'no',
                'fechaPago' => '2023-02-13',
                'notas' => 'hay que pagar',
            ]);

        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
        $response = $this->get(route('formCuotaExcep'));

        $response->assertStatus(200);
        
        $response->assertViewIs('formCuotaExcep');
    }
}
