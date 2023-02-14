<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Factura</title>
</head>
<body>
    <h1 class="text-center mb-5">Factura Cuota {{ $cuota->id }}</h1>
    <div class="container">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID:</td>
                    <td>{{ $cuota->id }}</td>
                </tr>
                <tr>
                    <td>Cliente:</td>
                    <td>{{ $cuota->cliente->cif }}</td>
                </tr>
                <tr>
                    <td>Concepto:</td>
                    <td>{{ $cuota->concepto }}</td>
                </tr>
                <tr>
                    <td>Fecha Emisión:</td>
                    <td>{{ date('d-m-Y', strtotime($cuota->fechaEmision)) }}</td>
                </tr>
                <tr>
                    <td>Importe:</td>
                    <td>{{ $cuota->importe }}€</td>
                </tr>
                <tr>
                    <td>Pagada:</td>
                    <td>{{ $cuota->pagada }}</td>
                </tr>
                <tr>
                    <td>Fecha Pago:</td>
                    <td>{{ date('d-m-Y', strtotime($cuota->fechaPago)) }}</td>
                </tr>
                <tr>
                    <td>Notas:</td>
                    <td>{{ $cuota->notas }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>