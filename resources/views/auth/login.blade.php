<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ayuda - Ingreso</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    <div class="h-screen flex flex-col bg-white">
        <x-header>MESA DE AYUDA</x-header>

        <div class="flex-1 lg:flex flex-col lg:items-center justify-center px-4">
            <div class="bg-white p-8 w-full max-w-md">
                <h2 class="text-lg font-semibold text-center">INGRESAR</h2>
                <form class="mt-4">
                    <div class="text-left">
                        <x-label>Correo electrónico</x-label>
                        <x-input type="email" placeholder="usuario@afac.gob.mx"></x-input>
                    </div>
                    <div class="text-left mt-4">
                        <x-label>Contraseña</x-label>
                        <x-input type="password" placeholder="**********"></x-input>
                    </div>
                    <x-button>INGRESAR</x-button>
                </form>

                <div class="mt-4 text-sm text-center">
                    <p>¿Eres usuario nuevo?<a href="/registro" class="text-afac-link hover:underline">Regístrate</a></p>
                </div>
                <div class="mt-2 text-sm text-center">
                    <p>¿Olvidaste tu contraseña?<a href="" class="text-afac-link hover:underline">Recuperar</a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
