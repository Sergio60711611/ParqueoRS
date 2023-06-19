<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Radiador Springs</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script> 
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"> </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        @include('administrador.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                
            <!--INICIO CRUD -->
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Ingresos y Salidas de vehiculos no Registrados</b></h2></div>
                                </div>
                            </div>
                            <!--<form action="/administrador/reporte" method="GET">
    <div class="form-group">
        <label for="fecha_hora_ingreso">Fecha de inicio:</label>
        <input type="datetime-local" name="fecha_hora_ingreso" class="form-control" value="{{ request('fecha_hora_ingreso') }}">
    </div>
    <div class="form-group">
        <label for="fecha_hora_salida">Fecha de fin:</label>
        <input type="datetime-local" name="fecha_hora_salida" class="form-control" value="{{ request('fecha_hora_salida') }}">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>-->
<form action="{{ route('buscar2') }}" method="POST">
    @csrf
    <input class="cajab" type="text" name="placa" placeholder="Ingrese la placa">
    <input class="cajab" type="date" name="fecha_inicio">
    <input class="cajab" type="date" name="fecha_fin">
    <button class="button" type="submit">Buscar</button>
    <a class="button" href="{{url ('/administrador/reporte')}}">Clientes registrados</a>
</form>
                            @php 
                                $counter = 1;
                            @endphp
                            <table class="table table-bordered" id="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Fecha y Hora de Ingreso</th>
                                        <th class = text-center >Hora Salida</th>
                                        <th class = text-center >Placa</th>
                                        <th class = text-center >Tiempo Estacionado</th>
                                        <th class = text-center >Monto Cobrado</th>
                                    </tr>
                                </thead>
                                @foreach($result as $ingreso)
                                    <tr>
                                    <td class = text-center>{{$counter}}</td>
                                        @php 
                                            $counter=$counter +1;
                                        @endphp
                                        <td class = text-center>{{$ingreso->fecha_hora_ingreso}}</td>
                                        <td class = text-center>{{$ingreso->fecha_hora_salida}}</td>
                                        <td class = text-center>{{$ingreso->placa}}</td>
                                        <td style="text-align:center;" class="diferencia-horas"></td>
                                        <td style="text-align:center;" class="monto"></td>
                                    </tr>
                                    @endforeach
                                
                            </table>
                            <img src="{{ asset('/img/parqueo1.png') }}">
                            <a class="button" href="{{url ('/administrador/reportegeneral')}}">Atras</a>
                        </div>
                    </div>  
                </div>
                <!-- FIN CRUD-->
            </div>
        </div>
        <!-- /.content-wrapper -->
        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script>
    document.addEventListener("DOMContentLoaded", function() {
        var filas = document.querySelectorAll("tbody tr");
        filas.forEach(function(fila) {
            var fecha_hora_ingreso = new Date(fila.cells[1].textContent);
            var fecha_hora_salida = new Date(fila.cells[2].textContent);
            var diferenciaHoras = Math.abs(fecha_hora_salida - fecha_hora_ingreso) /60000;
            var diferenciaHoras2 =Math.abs(fecha_hora_salida - fecha_hora_ingreso)/3600000;
            var monto=Math.abs(diferenciaHoras2*6);
            fila.querySelector(".diferencia-horas").textContent = diferenciaHoras.toFixed(0) +" Min";
            fila.querySelector(".monto").textContent = monto.toFixed(2) +" Bs";
        });
    });
</script>
    </body>

<style>
body {
    color: #566787;
    background-color:#D9D9D9;
    font-family: 'Poppins', sans-serif;
}
h2{
    font-family: 'Poppins', sans-serif;
    color: #324855;
}
.content-wrapper{
    background-color:#D9D9D9;
    padding: 20px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #ffff;
    padding: 40px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    border-radius: 10px;
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}   
img {
    width: 20%;
    height:auto;
    margin-top: 2%;
    margin-left: 81%;
    margin-bottom: -1%;
}
td img{
    width: 50%;
    height:50%;
    margin-top: 1%;
    margin-left: 10%;
    margin-bottom:-2%;
}
.imag{
    width: 100px;
    height: 50px;
}
.form-group {
  display: inline-block;
  width: 35vw; 
  height: auto;
  text-align: center;
}
.button {
  display: inline-block;
  padding:10px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color:#2A4858;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-bottom:10px;
  margin-left: 5%;
}
.cajab{
    position: relative;
    width: 20%;
    left: 2%;
    margin-top: 2%;
    text-align: center;
}
</style>
</html>