<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Factura</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Factura cuota {{ $cuota->id }}</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>ID:</b></td>
                        <td>{{ $cuota->id }}</td>
                    </tr>
                    <tr>
                        <td><b>Cliente:</b></td>
                        <td>{{ $cuota->cliente->nombre }} / {{ $cuota->cliente->cif }}</td>
                    </tr>
                    <tr>
                        <td><b>Concepto:</b></td>
                        <td>{{ $cuota->concepto }}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha Emisión:</b></td>
                        <td>{{ date('d-m-Y', strtotime($cuota->fechaEmision)) }}</td>
                    </tr>
                    <tr>
                        <td><b>Importe:</b></td>
                        <td>{{ $cuota->importe }} {{ $cuota->cliente->moneda }}</td>
                    </tr>
                    @if ($tipo_cambio != '')
                        <tr>
                            <td><b>Fecha de conversión</b></td>
                            <td>{{ date('d-m-Y', strtotime($tipo_cambio['fecha_conversion'])) }}</td>
                        </tr>
                        <tr>
                            <td><b>Importe moneda local</b></td>
                            <td>{{ $tipo_cambio['importe_api'] }} €</td>
                        </tr>
                    @endif
                    <tr>
                        <td><b>Pagada:</b></td>
                        <td>{{ $cuota->pagada }}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha Pago:</b></td>
                        <td>{{ !empty($cuota->fechaPago) ? date('d-m-Y', strtotime($cuota->fechaPago)) : ' ' }}</td>

                    </tr>
                    <tr>
                        <td><b>Notas:</td>
                        <td>{{ $cuota->notas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
