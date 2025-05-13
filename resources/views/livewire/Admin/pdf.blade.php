<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas de Tickets</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 40px;
        }
        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }
        header img, footer img {
            height: 60px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        p.descripcion {
            text-align: justify;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #BC955C;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        {{-- <img src="{{ public_path('images/logo.png') }}" alt="Logo AFAC" style="height: 60px;"> --}}
    </header>

    <h2>Reporte de Estadísticas de la Mesa de Ayuda </h2>

    <p class="descripcion">
        El presente informe muestra las estadísticas generales del sistema Mesa de ayuda correspondiente al periodo del  {{ $startDate }} al {{ $endDate }}
        Este informe tiene como objetivo proporcionar una visión general del rendimiento del sistema ,se incluyen métricas clave como la cantidad total de tickets registrados, 
        su estado actual (abiertos, en revisión y cerrados), el tiempo promedio de resolución por estado, así como el técnico más activo en el sistema durante dicho periodo.
    </p>

    <table>
        <thead>
            <tr>
                <th>Total Tickets</th>
                <th>Tickets Abiertos</th>
                <th>Tickets en Revisión</th>
                <th>Tickets Cerrados</th>
                <th>Tiempo Promedio de resolución</th>
                <th>Total de tickets por categoria</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalTickets }}</td>
                <td>{{ $openTickets }}</td>
                <td>{{ $inReviewTickets }}</td>
                <td>{{ $closedTickets }}</td>
                <td>{{ $avgClosedTime ? gmdate('H:i:s', $avgClosedTime * 60) : 'N/A' }}</td>
                <td>
                    <ul>
                        @foreach ($ticketsByCategory as $category => $total)
                            <li>{{ $category }}: {{ $total }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <footer>
        {{-- <img src="/images/logo.png" alt="Logo"> --}}
        <p>Agencia Federal de Aviación Civil - Sistema de Mesa de Ayuda</p>
    </footer>
</body>
</html>
