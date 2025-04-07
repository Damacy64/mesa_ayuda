<x-mail::message>
    <img src="https://testing-ventanillas.afac-avciv.com/images/logo.png" class="mx-4 w-24 h-24 mb-2">
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
{{ $url}}
</x-mail::message>
