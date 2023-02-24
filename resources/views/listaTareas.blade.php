@section('title', 'Ver Tareas')

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
        <h1>Lista de Tareas</h1>
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
                        <th scope="col">Cliente</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Población</th>
                        {{-- <th scope="col">Codigo postal</th> --}}
                        <th class="col">Estado</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Fecha de realización</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        @if ($tarea->cliente && is_null($tarea->cliente->deleted_at))
                            <tr>
                                <td>{{ $tarea->id }}</td>
                                {{-- <td>{{ $tarea->cliente->nombre }}</td> --}}
                                <td>
                                    @if ($tarea->cliente)
                                        {{ $tarea->cliente->cif }}
                                    @else
                                        Cliente dado de baja
                                    @endif
                                </td>
                                <td>{{ $tarea->nombre }}</td>
                                <td>{{ $tarea->telefono }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>{{ $tarea->poblacion }}</td>
                                {{-- <td>{{ $tarea->codigoPostal }}</td> --}}
                                <td>
                                    @if ($tarea->estado === 'P')
                                        📝
                                    @elseif ($tarea->estado === 'C')
                                        ❌
                                    @elseif ($tarea->estado === 'R')
                                        ✅
                                    @endif
                                </td>
                                <td>
                                    @if (!is_null($tarea->empleado) && !is_null($tarea->empleado->deleted_at))
                                        Operario no asignado
                                    @elseif (!is_null($tarea->empleado))
                                        {{ $tarea->empleado->nombre }}
                                    @else
                                        Operario no asignado
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($tarea->fechaRealizacion)) }}</td>
                                <td>
                                    @if (Auth::check() && Auth::user()->es_admin === 1)
                                        <a class="btn btn-danger" href="{{ route('confirmacionBorrar', $tarea) }}"><i class="bi bi-trash"></i></a>
                                        <a href="{{ route('formTareaEdit', $tarea) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ route('verDetalles', $tarea) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->es_admin === 0)
                                        <a href="{{ route('formTareaCompletar', $tarea) }}" class="btn btn-success"><i class="bi bi-check-square"></i></a>
                                        <a href="{{ route('detallesTareaOperario', $tarea) }}"
                                            class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $tareas->lastPage(); $i++)
                        <li class="page-item {{ $tareas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tareas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
