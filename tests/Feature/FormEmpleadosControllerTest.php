<?php

namespace Tests\Feature;

use App\Models\Empleado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormEmpleadosControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the Empleados list view
     *
     * @return void
     */
    public function testListaEmpleadosView()
    {
        // Create 3 employees
        $empleados = Empleado::factory()->count(3)->create();

        // Visit the list view and assert that it loads correctly
        $response = $this->get(route('listaEmpleados'));
        $response->assertStatus(200);

        // Assert that the employees' names are present in the view
        foreach ($empleados as $empleado) {
            $response->assertSee($empleado->nombre);
        }
    }

    /**
     * Test deleting an employee
     *
     * @return void
     */
    public function testBorrarEmpleado()
    {
        // Create an employee
        $empleado = Empleado::factory()->create();

        // Confirm that the employee delete page loads correctly
        $response = $this->get(route('confirmarBorrarEmpleado', $empleado));
        $response->assertStatus(200);

        // Delete the employee and assert that they are no longer in the database
        $this->delete(route('borrarEmpleado', $empleado));
        $this->assertDatabaseMissing('empleados', ['id' => $empleado->id]);
    }

    /**
     * Test updating an employee's data
     *
     * @return void
     */
    public function testUpdateEmpleado()
    {
        // Create an employee
        $empleado = Empleado::factory()->create();

        // Submit a form with updated employee data
        $data = [
            'nif' => '12345678Z',
            'nombre' => 'Nuevo Nombre',
            'password' => 'nuevaclave',
            'fecha_alta' => '2022-01-01',
            'email' => 'nuevo@email.com',
            'telefono' => '123456789',
            'es_admin' => true,
        ];
        $response = $this->put(route('updateEmpleado', $empleado), $data);

        // Assert that the employee data has been updated in the database
        $this->assertDatabaseHas('empleados', [
            'id' => $empleado->id,
            'nif' => $data['nif'],
            'nombre' => $data['nombre'],
            'fecha_alta' => $data['fecha_alta'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'es_admin' => $data['es_admin'],
        ]);
    }
}
