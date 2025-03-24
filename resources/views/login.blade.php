<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>


    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mesa de Ayuda - Ingreso</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">

        <div class="h-screen flex flex-col">
            <!-- Encabezado con logo -->
            <div class="bg-afac-blue text-white p-6 w-full flex flex-col items-center">
                <img src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png" alt="Logo" class="w-24 h-24 mb-2"> 
                <h1 class="text-3xl text-afac-golden font-bold">MESA DE AYUDA</h1>
            </div>
    
            <!-- Sección del formulario -->
            <div class="flex-1 flex flex-col items-center justify-center px-4">
                <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
                    <h2 class="text-lg font-semibold text-center">INGRESAR</h2>
                    <form class="mt-4">
                        <div class="text-left">
                            <label class="block text-gray-700 font-medium">Correo electrónico</label>
                            <input type="email" placeholder="usuario@dominio.com" class="bg-afac-gray w-full p-2 border rounded-lg mt-1">
                        </div>
                        <div class="text-left mt-4">
                            <label class="block text-gray-700 font-medium">Contraseña</label>
                            <input type="password" placeholder="********" class="bg-afac-gray w-full p-2 border rounded-lg mt-1">
                        </div>
                        <button class="bg-afac-blue text-white w-full py-2 rounded-lg mt-6 hover:bg-blue-800">INGRESAR</button>
                    </form>
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

    </html>

</body>

</html>
