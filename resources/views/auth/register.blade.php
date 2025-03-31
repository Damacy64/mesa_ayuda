<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ayuda - Registro</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">

    <x-header>
        REGISTRO USUARIO
    </x-header>


    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-8 mt-6">
        <form>
            <div class="grid grid-cols-3 gap-6">

                <div>
                    <x-label>Nombre(s)*</x-label>
                    <x-input type="text"></x-input>
                </div>
                <div>
                    <x-label>Apellido Paterno*</x-label>
                    <x-input type="text"></x-input>
                </div>
                <div>
                    <x-label>Apellido Materno*</x-label>
                    <x-input type="text"></x-input>
                </div>


                <div>
                    <x-label>Ubicación*</x-label>
                    <x-select>
                        <option>Piso 3</option>
                    </x-select>
                </div>
                <div>
                    <x-label>Área*</x-label>
                    <x-select>
                        <option>Desarrollo Estratégico</option>
                    </x-select>
                </div>
                <div>
                    <x-label>N° empleado*</x-label>
                    <x-input type="text"></x-input>
                </div>


                <div>
                    <x-label>Correo Institucional*</x-label>
                    <x-input type="email"></x-input>
                </div>
                <div>
                    <x-label>Confirmar Correo*</x-label>
                    <x-input type="email"></x-input>
                </div>
                <div>
                    <x-label>Sexo*</x-label>
                    <x-select>
                        <option>Masculino</option>
                    </x-select>
                </div>


                <div>
                    <x-label>Contraseña*</x-label>
                    <x-input type="password"></x-input>
                </div>
                <div>
                    <x-label>Confirmar Contraseña*</x-label>
                    <x-input type="password"></x-input>
                </div>
            </div>


            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">RECUERDA</p>
                <p class="text-sm">INTRODUCE UNA CONTRASEÑA PARA ESTE SISTEMA. RECUERDA QUE DEBE TENER AL MENOS 8 CARACTERES,INCLUYENDO AL MENOS UNA MAYÚSCULA, UNA MINÚSCULA, UN NÚMERO Y UN CARÁCTER ESPECIAL (#, *, !, @, $, %)</p>
              </div>


            <div class="flex justify-center mt-6">
                <x-button>REGISTRAR</x-button>
            </div>
        </form>
    </div>
</body>
</html>
