<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Ayuda - Registro</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    <x-header>
        REGISTRO USUARIO
    </x-header>


    <div class="max-w-5xl mx-auto bg-white p-8 mt-6">
        <form method="POST" action="/registro">
            @csrf
            <div class="grid grid-cols-3 gap-6">

                <div>
                    <x-label>Nombre(s)*</x-label>
                    <x-input type="text" name="names" :value="old('names')"></x-input>
                </div>
                <div>
                    <x-label>Apellido Paterno*</x-label>
                    <x-input type="text" name="last_name_p" :value="old('last_name_p')"></x-input>
                </div>
                <div>
                    <x-label>Apellido Materno</x-label>
                    <x-input type="text" name="last_name_m" :value="old('last_name_m')"></x-input>
                </div>


                <div>
                    <x-label>Ubicación*</x-label>
                    <x-select name="location">
                        @foreach ($locations as $location)
                            <option value="{{ $location->piso }}">{{ $location->piso}}</option>    
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label>Área*</x-label>
                    <x-select name="area">
                        @foreach ($areas as $area)
                            <option value="{{ $area->departamento }}">{{ $area->departamento}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-label>N° empleado*</x-label>
                    <x-input type="text" name="employer_number" :value="old('employer_number')"></x-input>
                </div>


                <div>
                    <x-label>Correo Institucional*</x-label>
                    <x-input type="email" name="email" :value="old('email')"></x-input>
                </div>
                <div>
                    <x-label>Confirmar Correo*</x-label>
                    <x-input type="email" name="email_confirmation" :value="old('email_confirmation')"></x-input>
                </div>
                <div>
                    <x-label>Sexo*</x-label>
                    <x-select name="sex">
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->sexo }}">{{ $genero->sexo}}</option>
                        @endforeach
                    </x-select>
                </div>

                <div>
                    <x-label>Contraseña*</x-label>
                    <x-input type="password" name="password"></x-input>
                </div>
                <div>
                    <x-label>Confirmar Contraseña*</x-label>
                    <x-input type="password" name="password_confirmation"></x-input>
                </div>
            </div>


            <div class=" mt-5 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">RECUERDA</p>
                <p class="text-sm">INTRODUCE UNA CONTRASEÑA PARA ESTE SISTEMA. RECUERDA QUE DEBE TENER AL MENOS 8 CARACTERES,INCLUYENDO AL MENOS UNA MAYÚSCULA, UNA MINÚSCULA, UN NÚMERO Y UN CARÁCTER ESPECIAL (#, *, !, @, $, %)</p>
            </div>
            <x-validation-errors></x-validation-errors>


            <div class="flex justify-center mt-6">
                <x-button>REGISTRAR</x-button>
            </div>
        </form>
    </div>
</body>
</html>
