<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estiloAniadir.css') }}">
  <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
  <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>
<body>
    <img class="img" src='{{asset("imagenes/rueda.gif")}}' class="img-fluid" alt="logo">
    <h1 id="encabezado">AÑADIR</h1>
    <div class="container">
        <form class="color-form" action='{{url("actividades")}}' method="post">
        @csrf
            <div class="row">
                <div class="col-lg-6  col-md-6  col-sm-12 form-floating mb-3">
                    <select class="form-select" aria-label="hora" name="desde">
                        <option selected disabled>Desde</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>


                <div class="col-lg-6  col-md-6  col-sm-12 form-floating mb-3">
                    <select class="form-select" aria-label="hora" name="hasta">
                        <option selected disabled>Hasta</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>




                <div class="col-lg-12  col-md-12  col-sm-12 form-floating mb-3">
                    <select class="form-select" aria-label="estado_animo" name="EstadoAnimo">
                    <option selected disabled>Estado de Ánimo</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->tipo}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="col-lg-12  col-md-12  col-sm-12 form-floating mb-3">
                    <select class="form-select" id="descripcion"aria-label="descripcion" name="Descripcion">
                        <option selected disabled>Descripción</option>
                        <option value="Trabajando">Trabajando</option>
                        <option value="Comiendo">Comiendo</option>
                        <option value="Leyendo">Leyendo</option>
                        <option value="Paseando">Paseando</option>
                        <option value="Pintando">Pintando</option>
                        <option value="Estudiando">Estudiando</option>
                    </select>
                </div>

                <div class="text-center">
                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                        type="submit">Guardar</button>
                        <div class="d-flex align-items-center justify-content-center pb-4">
                            <a href="{{route('home')}}" class="btn btn-outline-danger">Inicio</a>
                        </div>
                </div>

            </div>
        </form>

    </div>

</body>
</html>
