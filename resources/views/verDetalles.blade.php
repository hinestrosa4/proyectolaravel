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
    .bold {
        font-weight: bold;
    }
</style>

@section('menu')



<div id="cuerpo">
    <h1>Detalles de la tarea {{ $tarea->id }}</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <tbody>
                    <tr>
                        <td class="bold">ID:</td>
                        <td>{{ $tarea->id }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Cliente:</td>
                        {{-- <td>{{ $tarea->cliente->cif }}</td> --}}
                        <td>
                            @if (!is_null($tarea->cliente))
                                @if (!is_null($tarea->cliente->deleted_at))
                                    Empleado dado de baja
                                @else
                                    {{ $tarea->cliente->cif }}
                                @endif
                            @else
                                Empleado no encontrado
                            @endif
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="bold">Nombre:</td>
                        <td>{{ $tarea->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Teléfono:</td>
                        <td>{{ $tarea->telefono }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Correo:</td>
                        <td>{{ $tarea->correo }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Descripción:</td>
                        <td>{{ $tarea->descripcion }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Dirección:</td>
                        <td>{{ $tarea->direccion }}</td>
                    </tr>
                    <tr>
                    <td class="bold">Estado:</td>
                    <td>
                        @if ($tarea->estado === "P")
                          Pendiente
                        @elseif ($tarea->estado === "C")
                          Cancelada
                        @elseif ($tarea->estado === "R")
                          Realizada
                        @endif
                      </td>
                    </tr>
                    <tr>
                        <td class="bold">Operario Encargado:</td>
                        <td>
                            @if (!is_null($tarea->empleado) && !is_null($tarea->empleado->deleted_at))
                            Empleado dado de baja
                            @elseif (!is_null($tarea->empleado))
                                {{ $tarea->empleado->nombre }}
                            @else
                                Empleado no encontrado
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Fecha de realización:</td>
                        <td>{{ date('d-m-Y', strtotime($tarea->fechaRealizacion)) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Fecha Creación:</td>
                        <td>{{ date('d-m-Y', strtotime($tarea->fechaCreacion)) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Codigo postal:</td>
                        <td>{{ $tarea->codigoPostal }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Provincia:</td>
                        <td>{{ $tarea->provincia }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Anotaciones Anteriores:</td>
                        <td>{{ $tarea->anotacionesAnt }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Anotaciones Posteriores:</td>
                        <td>{{ $tarea->anotacionesPos }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Fichero Resumen:</td>
                        <td>
                            @if ($tarea->ficheroResumen)
                                <a class="btn btn-info" href="{{ Storage::url('public/files/'.$tarea->ficheroResumen) }}"download="{{ basename($tarea->ficheroResumen) }}">Descargar</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a  href="{{ Auth::check() && Auth::user()->es_admin === 1 ? route('listaTareas') : route('listaTareasOperario') }}" class="btn btn-secondary" id="cancel-btn">Cancelar</a>
    </div>
@endsection