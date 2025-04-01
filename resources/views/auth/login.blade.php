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

        <x-header>
            MESA DE AYUDA
        </x-header>

        <div class="p-8 mt-20 grid grid-cols-3 gap-4">

            <div class="flex flex-col justify-center items-center">
                <h2 class="text-xl font-semibold text-afac-golden font-si">BIENVENIDO</h2>
            </div>


            <div class="flex flex-col items-center">
                <form class="w-full max-w-sm">
                    <div class="mb-4">
                        <x-label>Correo Electrónico</x-label>
                        <x-input type="email"></x-input>
                    </div>
                    <div class="mb-4">
                        <x-label>Contraseña</x-label>
                        <x-input type="password"></x-input>
                    </div>

                    <div class="flex justify-center">
                        <x-button>INGRESAR</x-button>
                    </div>
                </form>
            </div>


            <div class="flex flex-col justify-center items-end">
                <div class="text-center">
                    <span class="block">¿Eres usuario nuevo?</span>
                <a href="/registro"
                        class="text-afac-link hover:underline mb-2">Regístrate</a>
                </div>
                <div class="text-center">
                    <span class="block">¿Olvidaste tu contraseña?</span>
                    <a href="/forgot-password"
                        class="text-afac-link hover:underline">Recuperar</a>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
