@section('title', 'Ver Clientes')

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
        <h1>Lista de Clientes</h1>
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
                        <th scope="col">CIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">IBAN</th>
                        <th scope="col">Cuota</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cif }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->iban }}</td>
                            <td>{{ $cliente->cuota }}€</td>
                            <td>{{ $cliente->paises->nombre }}</td>
                            <td>{{ $cliente->moneda }}</td>
                            <td><a class="btn btn-danger"
                                href="{{ route('confirmacionBorrarCliente', $cliente) }}">🗑️</a>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $clientes->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                        <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $clientes->currentPage() == $clientes->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


@endsection
