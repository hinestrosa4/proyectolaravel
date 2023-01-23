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
        <h1>Borrar Cliente: <br>{{ $cliente->nombre }}</h1>

        <div id="cuerpo">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CIF</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">IBAN</th>
                            <th scope="col">Cuota</th>
                            <th scope="col">Moneda</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cif }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->iban }}</td>
                            <td>{{ $cliente->cuota }}€</td>
                            <td>{{ $cliente->moneda }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>¿Está seguro de que desea borrar este cliente?</p>

            <div id="centrar">
                <form action="{{ route('borrarCliente', $cliente) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    <a class="btn btn-primary" href="{{ route('listaClientes') }}">Volver</a>
                </form>
            </div>
        </div>


    @endsection
