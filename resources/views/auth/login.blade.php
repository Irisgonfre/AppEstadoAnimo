<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
                
        {{-- css y js --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/estilosLogIn.css') }}">
        <script src="{{ asset('js/validaciones.js') }}"></script>
        <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>

    </head>

    <body>
        
    <div>
        <img src='{{asset("imagenes/rueda.gif")}}' id="logoLetras"><br>
        <img class="letras" src='{{asset("imagenes/lestras-rosas.png")}}' id="logoLetras">
    </div>
    <div class="container">
    
            <form  class="color-form"action="{{route('login')}}" method="POST" >
            @csrf
                <div class="row ">
                    <div class="col-md-12">
                        <h1 id="encabezado">INICIAR SESIÓN</h1>
                        <div class="col-12">
                            <div>
                                <input type="email" id="input-email" name="email" class="form-control" placeholder="Email"/>
                                <div class="invalid-feedback">La direccion de correo electronico no es valida</div><br>
                            </div>
                            <div>
                                <input type="password" name="password" id="input-password" placeholder="Contraseña" class="form-control" />
                                <div class="invalid-feedback">Debe escribir una contraseña válida</div><br>
                            </div>
                        </div>
                        <div class="col-12">
                        <div class="text-center">
                                <button class="btn btn-primary btn-block fa-lg gradient-custom-2" id="btn-iniciar" type="submit" onclick="validar()">Iniciar sesion</button><br><br>
                            <!--</div>-->
                            <div class="d-flex align-items-center justify-content-center pb-4">
                                <p class="mb-0 me-2">¿Aún no tienes cuenta?</p>
                                <a href="{{route('register')}}" class="btn btn-outline-danger">Registrarse</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>
