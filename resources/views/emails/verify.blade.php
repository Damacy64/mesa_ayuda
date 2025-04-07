<x-mail::message>
<img src="https://testing-ventanillas.afac-avciv.com/images/logo.png" class="mx-4 w-24 h-24 mb-2">
## ¡Bienvenido(a) al Sistema de Mesa de Ayuda AFAC!

ESTIMADO(A) {{ $name }}!

Para acceder al sistema, recuerda que deberas ingresar tu correo institucional,<br>
{{ $email }}

<x-mail::button :url="$url">
Verificar correo electrónico
</x-mail::button>

Si no creaste una cuenta, puedes ignorar este correo.

AGENCIA FEDERAL DE AVIACION CIVIL,<br>
Si esta teniendo problemas al hacer clic en el boton "Verificar correo electrónico",copie y pegue la URL de abajo en su navegador web:<br>
{{ $url}}
</x-mail::message>
