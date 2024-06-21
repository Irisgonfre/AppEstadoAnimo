<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estiloVer.css') }}">
    <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>
</head>

<body>
    <img src='{{asset("imagenes/rueda.gif")}}' class="img-fluid" alt="logo">
    <h1 id="encabezado" class="text-center">VER</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="color-form mb-4">
                    <h2 class="text-center">Filtrar por Estado</h2>
                    <form action="{{ url('filtrarEstado') }}" method="GET">
                        <select class="form-select mb-3" name="filtroActividad">
                            @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->tipo }}{{$emojis[$estado->id-1]}}</option>
                            @endforeach
                        </select>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="color-form mb-4">
                    <h2 class="text-center">Filtrar por Fecha</h2>
                    <form action="{{ url('filtrarFecha') }}" method="GET">
                        <input class="form-control mb-3 fecha" type="date" name="fecha_creacion" id="fecha"
                            placeholder="Fecha">
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="color-form mb-4">
                    <h2 class="text-center">Tabla de Actividades</h2>
                    <div class="table-responsive">
                        <table class="table table-striped estiloVerTabla">
                            <thead>
                                <tr>
                                    <th scope="col">Hora Inicial</th>
                                    <th scope="col">Hora Final</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actividades as $actividad)
                                <tr>
                                    <td>{{$actividad->hora_inicio}}</td>
                                    <td>{{$actividad->hora_final}}</td>
                                    <td>{{$estados[$actividad->id_estado-1]->tipo}}{{$emojis[$actividad->id_estado-1]}}</td>
                                    <td>{{$actividad->descripcion}}</td>
                                    <td>
                                        <form action='{{url("actividades/$actividad->id")}}' method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center">
            <a href="{{url('actividades/create')}}" class="btn btn-primary btn-lg gradient-custom-2 mb-3">Añadir</a>
            <div class="pb-4">
                <a href="{{route('home')}}" class="btn btn-outline-danger">Inicio</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle (minified) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
