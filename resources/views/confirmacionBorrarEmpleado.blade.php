@section('title', 'Confirmar Borrar Empleado')
@extends('base')
@section('menu')
    <style>
        table {
            text-align: center;
        }

        #form {
            margin: 1em;
        }
    </style>

    <div class="container">
        <h1>Borrar Empleado: <br>{{ $empleado->nombre }}</h1>

        <div id="cuerpo">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIF</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Fecha Alta</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Admin</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nif }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->password }}</td>
                            <td>{{ $empleado->fecha_alta }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->es_admin }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>¿Está seguro de que desea borrar este empleado?</p>

            <div id="centrar">
                <form action="{{ route('borrarEmpleado', $empleado) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    <a class="btn btn-primary" href="{{ route('listaEmpleados') }}">Volver</a>
                </form>
            </div>
        </div>


    @endsection
