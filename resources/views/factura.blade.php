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
                        <td>{{ $cuota->importe }}€</td>
                    </tr>
                    <tr>
                        <td><b>Importe (en AFN):</b></td>
                        <td>
                            <?php
                            use GuzzleHttp\Client;
                            
                            // Crea una instancia de cliente de Guzzle
                            $client = new Client();
                            
                            // URL base para la API de Exchange Rates
                            $base_url = 'https://api.exchangeratesapi.io/latest';
                            
                            // Monedas de origen y destino para la conversión
                            $source_currency = 'EUR';
                            $target_currency = 'USD';
                            
                            // Parámetros de consulta para la solicitud GET a la API
                            $params = [
                                'base' => $source_currency,
                                'symbols' => $target_currency,
                            ];
                            
                            // Envía la solicitud GET a la API y recibe la respuesta JSON
                            $response = $client
                                ->request('GET', $base_url, [
                                    'query' => $params,
                                ])
                                ->getBody()
                                ->getContents();
                            
                            // Procesa la respuesta JSON para obtener la tasa de conversión
                            $exchange_rates = json_decode($response, true);
                            $conversion_rate = $exchange_rates['rates'][$target_currency];
                            
                            // Realiza la conversión de EUR a USD
                            $converted_amount = $cuota->importe * $conversion_rate;
                            
                            // Muestra el resultado de la conversión
                            echo $converted_amount . ' ' . $target_currency;
                            
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Pagada:</b></td>
                        <td>{{ $cuota->pagada }}</td>
                    </tr>
                    <tr>
                        <td><b>Fecha Pago:</b></td>
                        <td>{{ date('d-m-Y', strtotime($cuota->fechaPago)) }}</td>
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
