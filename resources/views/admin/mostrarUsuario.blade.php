<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iconos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/estiloVer.css') }}">
  <link href="https://fonts.cdnfonts.com/css/konkhmer-sleokchher" rel="stylesheet">
  <link rel="icon" type="image/jpg" href='{{asset("imagenes/favicon.png")}}'/>
</head>
<body>
<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
<img class="img" src='{{asset("imagenes/rueda.gif")}}' class="img-fluid" alt="logo">

<h1 id="encabezado">Vista Super</h1>
<div class="container">
<div class="row justify-content-center">
    @foreach($estados as $estado)
        <div class=" col-lg-6 col-md-6 col-sm-12 "> 
            <div class="color-form mb-4">
                <h2 class="text-center">{{ $estado->tipo }}</h2>
                <button class="btn btn-primary" onclick="loadDoc({{ $estado->id }}, {{ $id }})">Estadisticas</button>
            </div>    
         </div>
    @endforeach
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="color-form mb-4">
        <div id="tabla" class="table-responsive">

      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="color-form mb-4 text-center">
          <div id="div"class="text-center">

      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
<script>
  function loadDoc(a, b) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("div").innerHTML = this.responseText;
        crearGrafico();
        loadDoctTabla(a, b);
      }
    };
    var url = '/estadistica/' + a + '/' + b;
    xhttp.open("GET", 'http://localhost/AplicacionEstadoDeAnimo/public'+ url, true);
    xhttp.send();
  }
  function crearGrafico() {
    const labels = ['Trabajando', 'Comiendo', 'Leyendo', 'Paseando','Pintando','Estudiando'];
    const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)','rgb(219 215 203)','rgb(16 72 32)'];

    const graph = document.createElement('canvas');
    graph.id = 'grafica'; 

    var muyContento = document.getElementById('muyContento').value;
    var contento = document.getElementById('contento').value;
    var muyTriste = document.getElementById('muyTriste').value;
    var triste = document.getElementById('triste').value; 
    var pintando = document.getElementById('pintando').value;
    var estudiando = document.getElementById('estudiando').value; 
    const data = {
      labels: labels,
      datasets: [{
        data: [muyContento, contento, muyTriste, triste, pintando, estudiando],
        backgroundColor: colors
      }]
    };

    const config = {
      type: 'pie',
      data: data,
    };

    new Chart(graph, config);
    document.getElementById('div').appendChild(graph);
  }
  
  function loadDoctTabla(a, b) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Inserta la respuesta del servidor directamente en el div
        document.getElementById("tabla").innerHTML = this.responseText;
      }
    };
    var url = '/tabla/' + a + '/' + b;
    xhttp.open("GET", 'http://localhost/AplicacionEstadoDeAnimo/public'+ url, true);
    xhttp.send();
  }
</script>