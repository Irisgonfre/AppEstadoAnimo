<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
<body>
    <h1>Informacion de las Actividades</h1>
    <table class="table table-striped estiloVerTabla">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Hora Inicio</th>
                <th scope="col">Hora Final</th>
                <th scope="col">Actividad</th>
                <th scope="col">Fecha Creacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->id }}</td>
                    <td>{{ $actividad->hora_inicio }}</td>
                    <td>{{ $actividad->hora_final }}</td>
                    <td>{{ $actividad->descripcion }}</td>
                    <td>{{ $actividad->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>