@section('title', 'Ver Cuotas')

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
        <h1>Lista de Cuotas</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div style="text-align: center">
            <a class="btn btn-outline-dark" href="{{ route('listaCuotas', ['SI']) }}">Pagadas</a>
            <a class="btn btn-outline-dark" href="{{ route('listaCuotas', ['NO']) }}">NO pagadas</a>
            <a class="btn btn-outline-dark" href="{{ route('listaCuotas', ['fechaEmision']) }}">Fecha de emisión</a>
            <a class="btn btn-outline-dark" href="{{ route('listaCuotas', ['fechaPago']) }}">Fecha de pago</a>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha Emisión</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pagada</th>
                        <th scope="col">Fecha Pago</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuotas as $cuota)
                        @if (!is_null($cuota->cliente) && is_null($cuota->cliente->deleted_at))
                            <tr>
                                <td>{{ $cuota->id }}</td>
                                <td>{{ $cuota->cliente->cif }}</td>
                                <td>{{ $cuota->concepto }}</td>
                                <td>{{ date('d-m-Y', strtotime($cuota->fechaEmision)) }}</td>
                                <td>{{ $cuota->importe }}€</td>
                                <td>{{ $cuota->pagada }}</td>
                                <td>
                                    @if ($cuota->fechaPago)
                                        {{ date('d-m-Y', strtotime($cuota->fechaPago)) }}
                                    @endif
                                </td>
                                <td>{{ $cuota->notas }}</td>
                                <td><a class="btn btn-danger" href="{{ route('confirmacionBorrarCuota', $cuota) }}">🗑️</a>
                                    <a class="btn btn-warning" href="{{ route('formCuotaEdit', $cuota->id) }}">✏️</a>
                                    <a class="btn btn-success" href="{{ route('generatePDF', $cuota->id) }}">📋</a>
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
                    <li class="page-item {{ $cuotas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->previousPageUrl() }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $cuotas->lastPage(); $i++)
                        <li class="page-item {{ $cuotas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $cuotas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $cuotas->currentPage() == $cuotas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->nextPageUrl() }}">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
