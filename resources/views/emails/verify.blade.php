<x-mail::message>
    <img src="https://citas-medicina.afac-avciv.com/images/logoafac.png" class="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;margin:auto;"><br>
# ¡Bienvenido(a) al Sistema de Mesa de Ayuda AFAC!

Estimado(a)! {{ $names }}!

Para acceder al sistema, recuerda que deberas ingresar tu correo institucional,<br>
{{ $email }}

<x-mail::button :url="$url">
Verificar correo electrónico
</x-mail::button>

Si no creaste una cuenta, puedes ignorar este correo.

Atentamente el area de Soporte técnico y Redes.<br>
<br>
Si esta teniendo problemas al hacer clic en el botón "Verificar correo electrónico",copie y pegue la URL de abajo en su navegador web:<br>
<a href="{{ $url }}">{{ $url }}</a>
</x-mail::message>
