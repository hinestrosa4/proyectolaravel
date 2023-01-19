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
    <h1>Detalles de la tarea</h1>
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
                        <td>{{ $tarea->cliente }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Nombre:</td>
                        <td>{{ $tarea->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Telefono:</td>
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
                    <td class="bold">Estado:</td>
                        <td>{{ $tarea->estado }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Operario Encargado:</td>
                        <td>{{ $tarea->operario }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Fecha de realización:</td>
                        <td>{{ date('d-m-Y', strtotime($tarea->fechaRealizacion)) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Fecha Creación:</td>
                        <td>{{ $tarea->fechaCreacion }}</td>
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
                        <td>{{ $tarea->ficheroResumen }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('listaTareas') }}" class="btn btn-secondary" id="cancel-btn">Cancelar</a>
    </div>
@endsection
