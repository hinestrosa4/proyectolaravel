@section('title', 'Ver Empleados')

@extends('base')

<style>
    #cuerpo {
        margin: 1em;
    }

    #paginacion {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #cuerpo {
        margin: 2em;
    }

    table {
        text-align: center;
    }
</style>

@section('menu')
    <div id="cuerpo">
        <h1>Lista de Empleados</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
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
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $empleado->nif }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->clave }}</td>
                            <td>{{ date('d-m-Y', strtotime($empleado->fecha_alta)) }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            @if ($empleado->es_admin == 1)
                                <td>Administrador</td>
                            @else
                                <td>Operario</td>
                            @endif
                            <td><a class="btn btn-danger"
                                    href="{{ route('confirmacionBorrarEmpleado', $empleado) }}">🗑️</a>
                                <a class="btn btn-warning" href="#">✏️</a>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $empleados->lastPage(); $i++)
                        <li class="page-item {{ $empleados->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $empleados->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
