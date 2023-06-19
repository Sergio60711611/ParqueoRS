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
    @php
        $id = $guardia['id'];
        $nombre = $guardia['nombre'];    
        $apellido = $guardia['apellido'];
        $correo = $guardia['correo_electronico'];
        $celular = $guardia['celular'];
        $turno=$guardia['turno'];
        $password = $guardia['password'];
        $ci = $guardia['ci'];
    @endphp

    @include('guardia.navbar', ['id' => $id])
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
        <h5>Guardia: </h5>
        <p>Esta es la vista para el guardia de apellido : {{$apellido}}</p>
        </div>
    </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
            @include('guardia.msj') 
            <!--INICIO CRUD -->
                <div class="container-xl">
                <div class="table-responsive">
                    <div class="table">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Lista de Reservas</b></h2></div>
                                </div>
                            </div>
                            <form action="{{ route('buscar5', ['id' => $guardia->id]) }}" method="POST">
                            @csrf
                                <input class="cajab" type="text" name="reserva" placeholder="Ingrese nombre o apellido o ci">
                                <input class="cajab" type="date" style="width: 20%;" name="fecha_inicio">
                                <input class="cajab" type="date" style="width: 20%;" name="fecha_fin">
                                <button class="button" type="submit">Buscar</button>
                            </form>
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >Codigo de reserva</th>
                                        <th class = text-center >Fecha Ingreso:</th>
                                        <th class = text-center >Fecha Salida:</th>
                                        <th class = text-center >Horas:</th>
                                        <th class = text-center >Nombre:</th>
                                        <th class = text-center >Apellido:</th>
                                        <th class = text-center >Ci:</th>
                                        <th class = text-center >Sitio:</th>
                                    </tr>
                                </thead>
                                @foreach($result as $reserva)
                                    <tr>
                                        <td class = text-center>{{$reserva->id}}</td>
                                        <td class = text>{{$reserva->fecha_ingreso}}</td>
                                        <td class = text>{{$reserva->fecha_salida}}</td>
                                        <td class = text-center>{{ substr($reserva->hora_ingreso, 0, 5) }} - {{ substr($reserva->hora_salida, 0, 5) }}</td>
                                        <td class = text>{{$reserva->nombre}}</td>
                                        <td class = text>{{$reserva->apellido}}</td>
                                        <td class = text>{{$reserva->ci}}</td>
                                        <td class = text>{{$reserva->id_sitio}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <img src="{{ asset('/img/parqueo1.png') }}">
                        </div>
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
    width: 30%;
    left: 2%;
    margin-top: 2%;
    text-align: center;
}
</style>
</html>