<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página principal</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Font -->
    <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
    <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estiloUsers.css') }}">
</head>
<body>
<a class="btn btn-outline-danger btn-cerrar-sesion float-end me-3 mt-3" href="{{ url('cerrarSesion') }}">Cerrar sesión</a>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <img src="{{ asset('imagenes/rueda.gif') }}" alt="Logo" id="img_logoLetras" class="mb-3">
                <h3 class="mb-4">Listado de usuarios</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                @foreach($users as $user)
                <form action='{{url("users/$user->id")}}' method="get">
                <div class="caja mb-4">
                    <p><strong>Nombre:</strong> {{ $user->name }}</p>
                    <p><strong>Correo:</strong> {{ $user->email }}</p>
                    <button class="btn btn-success btn-mostrar">Mostrar</button>
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    

</body>
</html>
