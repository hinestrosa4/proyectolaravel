@section('title', 'Registro Empleados')
@extends('base')
@section('menu')
    <style>
        #form {
            margin: 1em;
        }
    </style>

<div class="container">
    <h1>Borrar tarea {{ $tarea->id }}</h1>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Población</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Fecha de realización</th>
                    </tr>
                </thead>
                <tbody>

                        <tr>
                            <td>{{ $tarea->cliente }}</td>
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->telefono }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->direccion }}</td>
                            <td>{{ $tarea->poblacion }}</td>
                            <td>{{ $tarea->codigoPostal }}</td>
                            <td>{{ $tarea->provincia }}</td>
                            <td>{{ $tarea->operario }}</td>
                            <td>{{ date("d-m-Y", strtotime($tarea->fechaRealizacion)) }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    
    <p>¿Está seguro de que desea borrar esta tarea?</p>
    <a href="{{ route('borrarTarea', ['id' => $tarea->id]) }}" class="btn btn-danger" id="delete-task-btn">Borrar</a>
    <a href="{{ route('listaTareas') }}" class="btn btn-secondary" id="cancel-btn">Cancelar</a>
</div>

   
@endsection
