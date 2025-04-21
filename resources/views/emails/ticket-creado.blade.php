<x-mail::message>
    <img src="https://citas-medicina.afac-avciv.com/images/logoafac.png" class="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;margin:auto;"><br>
# NOTIFICACIÓN DE RECEPCIÓN DE TICKET

Estimado(a) {{ $ticket->usuario->name }},<br>

Se confirma la recepción de su solicitud con el número de folio:<br>
{{ $ticket->folio }} presentada el dia {{ $ticket->created_at->format('d/m/Y H:i') }}<br>

Hemos recibido su solicitud, en breve recibiras la actualización del estado de su ticket.<br>

Saludos, Soporte Técnico y Redes<br>

¿Tienes dudas o necesitas ayuda?<br>
Comunícate con Soporte al **(800) 002 2744**
</x-mail::message>