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
        <h1>Borrar Cuota: {{ $cuota->id }}</h1>

        <div id="cuerpo">
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
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $cuota->id }}</td>
                            <td>
                                @if (!is_null($cuota->cliente) && !is_null($cuota->cliente->deleted_at))
                                    Cliente dado de baja
                                @elseif (!is_null($cuota->cliente))
                                    {{ $cuota->cliente->cif }}
                                @else
                                    Cliente no encontrado
                                @endif
                            </td>
                            <td>{{ $cuota->concepto }}</td>
                            <td>{{ $cuota->fechaEmision }}</td>
                            <td>{{ $cuota->importe }}€</td>
                            <td>{{ $cuota->pagada }}</td>
                            <td>{{ $cuota->fechaPago }}</td>
                            <td>{{ $cuota->notas }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>¿Está seguro de que desea borrar esta cuota?</p>

            <div id="centrar">
                <form action="{{ route('borrarCuota', $cuota) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    <a class="btn btn-primary" href="{{ route('listaCuotas') }}">Volver</a>
                </form>
            </div>
        </div>


    @endsection
