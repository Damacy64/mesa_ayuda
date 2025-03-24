<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ayuda - Registro</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    <div class="h-screen flex flex-col bg-white">
        <x-header>REGISTRO USUARIO</x-header>

        <div class="flex-1 lg:flex flex-col lg:items-center justify-center px-4">
            <div class="bg-white p-8 w-full max-w-md">
                <form class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-4 grid-rows-4">
                    <div>
                        <x-label>Nombre(s)*</x-label>
                        <x-input placeholder="Ingrese su nombre"></x-input>
                    </div>

                    <div >
                        <x-label>Apellido Paterno*</x-label>
                        <x-input placeholder="Ingrese su apellido paterno"></x-input>
                    </div>

                    <div>
                        <x-label>Apellido Materno</x-label>
                        <x-input placeholder="Ingrese su apellido materno"></x-input>
                    </div>

                    <div>
                        <x-label>Sexo*</x-label>
                        <x-select>
                            masculino
                        </x-select>
                    </div>

                    <div>
                        <x-label>Ubicacion*</x-label>
                        <x-select>
                            Piso 1
                        </x-select>
                    </div>

                    <div>
                        <x-label>Area*</x-label>
                        <x-select>
                            Desarrollo
                        </x-select>
                    </div>

                    <div>
                        <x-label>N° empleado*</x-label>
                        <x-input></x-input>
                    </div>

                    <div class="md:col-span-1">
                        <x-label>Correo electrónico*</x-label>
                        <x-input type="email" placeholder="usuario@afac.gob.mx"></x-input>
                    </div>

                    <div class="md:col-span-1">
                        <x-label>Confirmar Correo*</x-label>
                        <x-input type="email" placeholder="usuario@afac.gob.mx"></x-input>
                    </div>

                    <div class="md:col-span-1">
                        <x-label>Contraseña*</x-label>
                        <x-input type="password" placeholder="**********"></x-input>
                    </div>

                    <div class="md:col-span-1">
                        <x-label>Confirmar Contraseña*</x-label>
                        <x-input type="password" placeholder="**********"></x-input>
                    </div>      
                </form>
                <x-button>Registrar</x-button>
                <div class="mt-4 text-sm text-center">
                    <a href="#" class="text-blue-600 hover:underline">¿Eres usuario nuevo? Regístrate</a>
                </div>
                <div class="mt-2 text-sm text-center">
                    <a href="#" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña? Recuperar</a>
                </div>
            </div>
        </div>
    </div>

</body>
