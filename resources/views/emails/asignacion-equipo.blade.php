<x-mail::message>
    <img src="https://citas-medicina.afac-avciv.com/images/logoafac.png" class="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;margin:auto;"><br>
# NOTIFICACIÓN DE DISPOSITIVO ASIGNADO

Hola, **{{ $usuario->name }}**,<br>

Te informamos que se te ha asignado u nuevo equipo. A continuación, los detalles:<br>
## Información del Equipo:
- **Número de Serie:** {{ $equipo->numero_serie }}
- **Número de Inventario:** {{ $equipo->numero_inventario }}
- **Modelo:** {{ $equipo->modelo }}
- **Dirección IP:** {{ $equipo->direccion_ip }}
- **Internet:** {{ $equipo->internet }}
- **Estado:** {{ $equipo->estado }}

## Atributos del Equipo:
@foreach ($equipo->atributos as $atributo)
- **{{ $atributo->pivot->atributo_tipo }}:** {{ $atributo->valor }}
@endforeach

Para cualquier duda o aclaración favor de contactar a soporte al cliente al **(800) 002 2744**.<br>

Saludos, Soporte Técnico y Redes<br>

¿Tienes dudas o necesitas ayuda?<br>
Comunícate con Soporte al **(800) 002 2744**
</x-mail::message>