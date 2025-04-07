<x-mail::message>

<img src="https://citas-medicina.afac-avciv.com/images/logoafac.png" class="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;margin:auto;"><br>

# ¡Bienvenido(a) al Sistema de Mesa de Ayuda AFAC!

Estimado(a)

Estas recibiendo este correo porque hiciste una solicitud de recuperacion de contraseña para el SISTEMA DE MESA DE AYUDA DE LA AFAC
Dar clic sobre el boton "Recuperar contraseña" para restablecer tu acceso
    <x-mail::button :url="$url">
        Recuperar contraseña
    </x-mail::button>

Este enlace de restablecimiento de contraseña caducara en 60 minutos.

Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.

Saludos, Agencia Federal de Aviación Civil<br>

Si esta teniendo problemas al hacer clic en el botón "Recuperar contraseña", copie y pegue la URL de abajo en su navegador web:
<a href="{{ $url }}">{{ $url}}</a>
</x-mail::message>
