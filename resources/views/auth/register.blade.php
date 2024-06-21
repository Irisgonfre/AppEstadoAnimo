<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleFormulario.css') }}">
    <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
    <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>
    <script src="{{ asset('js/javaFormulario.js') }}"></script>
</head>

<body>

    <img  class="img "src='{{asset("imagenes/imagen-letras.png")}}' class="img-fluid" alt="logo">
            
    <div class="container">
  
        <div class="row">
          
            <div class="col">
                <form action="{{route('register')}}" method="post" onsubmit="return Validarformulario();" class="color-form">
                    @csrf
                    <h1 id="encabezado">FORMULARIO</h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio texto" type="text" name="name" id="nombre"
                                placeholder="Nombre">
                            <label class="form-label" for="nombre">Nombre</label>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio texto" type="text" id="apellido" placeholder="Apellido">
                            <label class="form-label" for="apellido">Apellido</label>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio correo" type="email" name="email" id="correo1"
                                placeholder="Email">
                            <label class="form-label" for="email">Correo Electrónico</label>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio correo" name="confirmacion" type="email" id="correo2"
                                placeholder="Confirmación del Correo Electrónico">
                            <label class="form-label" for="confirmarEmail">Confirmación</label>
                        </div>

                        <div class=" ol-md-6 col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio contrasena" type="password" name="password" id="contrasena"
                                placeholder="Contraseña">
                            <label class="form-label" for="contrasena">Contraseña</label>
                        </div>

                        <div class="col-sm-12 form-floating mb-3">
                            <input class="form-control obligatorio contrasena" type="password" name="password_confirmation"
                                id="confirmarContrasena" placeholder="Confirmación Contraseña">
                            <label class="form-label" for="confirmarContrasena">Confirmación Contraseña</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"  onclick="Validarformulario()"  type="submit">registrarse</button>
                        </div>

                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <p class="mb-0 me-2">¿ir a login?</p>
                            <a href="{{route('login')}}" class="btn btn-outline-danger">ir a login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
