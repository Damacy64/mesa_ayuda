<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>


    <div class="container-fluid">
        <div class="row bg-blue-afac">
            <div class="col-2">
                <img src="https://testing-ventanillas.afac-avciv.com/images/isologo_AFAC_white.png"
                    class="img-fluid w-75 h-60" alt="logo AFAC">
            </div>
            <div class="col-8 d-flex align-items-center justify-content-center">
                <p class="text-center text-brown-afac fs-1">MESA DE AYUDA</p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-4">
                <form action="">
                    <p class="">INGRESAR</p>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="nombre@ejemplo.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn bg-blue-afac text-white mb-3">INGRESAR</button>
                    </div>
                </form>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
</body>

</html>
