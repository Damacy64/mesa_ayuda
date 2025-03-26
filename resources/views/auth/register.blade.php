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


        <form class="w-full max-w-screen-lg m-auto">
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-6">
                    <x-label>Nombre(s)*</x-label>
                    <x-input placeholder="Ingrese su nombre"></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Apellido Paterno*</x-label>
                    <x-input placeholder="Ingrese su apellido paterno"></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Apellido Materno</x-label>
                    <x-input placeholder="Ingrese su apellido materno"></x-input>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-label>Sexo*</x-label>
                    <x-select>
                        masculino
                    </x-select>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-label>Ubicacion*</x-label>
                    <x-select>
                        Piso 1
                    </x-select>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <x-label>Area*</x-label>
                    <x-select>
                        Desarrollo
                    </x-select>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>N° empleado*</x-label>
                    <x-input></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Correo electrónico*</x-label>
                    <x-input type="email" placeholder="usuario@afac.gob.mx"></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Confirmar Correo*</x-label>
                    <x-input type="email" placeholder="usuario@afac.gob.mx"></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Contraseña*</x-label>
                    <x-input type="password" placeholder="**********"></x-input>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label>Confirmar Contraseña*</x-label>
                    <x-input type="password" placeholder="**********"></x-input>
                </div>
                <x-button>Registrar</x-button>
            </div>
        </form>
        <div class="mt-4 text-sm text-center">
            <a href="" class="text-blue-600 hover:underline">¿Eres usuario nuevo? Regístrate</a>
        </div>
        <div class="mt-2 text-sm text-center">
            <a href="#" class="text-blue-[#13A6DC]">¿Olvidaste tu contraseña? Recuperar</a>
        </div>
    </div>

</body>
