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
        El presente informe muestra las estadísticas generales del sistema Mesa de ayuda correspondiente al periodo seleccionado.
        Se incluyen métricas clave como la cantidad total de tickets registrados, su estado actual (abiertos, en revisión y cerrados),
        el tiempo promedio de resolución por estado, así como el técnico más activo en el sistema durante dicho periodo.
    </p>

    <table>
        <thead>
            <tr>
                <th>Total Tickets</th>
                <th>Tickets Abiertos</th>
                <th>Tickets en Revisión</th>
                <th>Tickets Cerrados</th>
                <th>Tiempo Promedio de resolución</th>
                <th>Técnico más Activo</th>
            </tr>
        </thead>
        <tbody>
            <tbody class="text-black">
                @if ($totalTickets !== null)
                    <tr class="border-t">
                        <td class="p-2">{{ $totalTickets }}</td>
                        <td class="p-2">{{ $openTickets }}</td>
                        <td class="p-2">{{ $inReviewTickets }}</td>
                        <td class="p-2">{{ $closedTickets }}</td>
                        <td class="p-2">{{ number_format($avgReviewTime) }} hrs</td>
                        <td class="p-2">{{ $topTechnician }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="7" class="text-center p-2">No hay información disponible</td>
                    </tr>
                @endif
            </tbody>
    </table>

    <footer>
        {{-- <img src="/images/logo.png" alt="Logo"> --}}
        <p>Agencia Federal de Aviación Civil - Sistema de Mesa de Ayuda</p>
    </footer>
</body>
</html>
