<x-mail::message>
<img src="https://citas-medicina.afac-avciv.com/images/logoafac.png"
    class="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;margin:auto;"><br>
# NOTIFICACIÓN DE ESTATUS DE TICKET

Solicitud de soporte a cliente

Hola, {{ $ticket->usuario->name }},<br>

Hemos resuelto tu folio {{ $ticket->folio }} por el incidente reportado en la categoría
{{ $ticket->titulo }}.<br>

Consulta aqui los detalles:<br>

Categoría del incidente: {{ $ticket->titulo }} {{-- {{ $ticket->op}} --}}<br>

Comentario de resolución: {{ $ticket->solucion }}<br>

El ticket se encuentra {{ $ticket->estatus_id }}, para cualquier duda o aclaración favor de contactar a soporte al
cliente al **(800) 002 2744**<br>

<x-mail::button :url="route('login')">
    Ver estatus
</x-mail::button>

Saludos, Soporte Técnico y Redes.<br>

¿Tienes dudas o necesitas ayuda?<br>
Comunícate con Soporte al **(800) 002 2744**
</x-mail::message>
