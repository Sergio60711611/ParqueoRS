<!DOCTYPE html>
<html lang="es">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
            @include('guardia.msj')
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                            <h2>Bienvenido a </h2>
                            <h2>Radiador Springs</h2>
                            <div class="box">
                            <table 
                               class="table"  
                               style="border-collapse: collapse;
                                       max-width: 50%;"
                                >
                            
                                @foreach($lista as $horario)
                                    <tr>
                                        <td style="border: none;" class = text-center>{{$horario->dia_horario}}</td>
                                        <td style="border: none;" class = text-center>{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>
                            <div class="box">
                            <img class="fondo" src="{{ asset('/img/parqueo10.png') }}">
                            </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        
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
    font-family: 'Poppins', sans-serif;
    background-color: #D9D9D9; 
    height:auto;
}
h2{
    color: #324855;
    font-family: "Poppins";
    font-weight: bold;
    font-size: 4vw;
    margin-left: 3vw;
    margin-top: 2vw;
}
img {
    width: 100%;
    height:auto;
    margin-top: -19vw;
    
}
.box {
  display: inline-block;
  width: 35vw; 
  height: auto;
  text-align: center;
}
.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}

.container{
    background-color: #FFFFFF;
    padding:0px;
}
.container-blanco {
    width: 95%;
    height: 95%;
    background-color: #ffffff;
    border: 1px solid #ffffff;
    padding: 20px;
}
table {
  width: auto;
  max-width: 90%;
  margin: 0 auto;
  margin-bottom:5px;
  margin-top:3vw;
  border-collapse: collapse;
}

table td, table th {
  padding: 3px;
  text-align: center;
  font-size: 17px;
  color: black;
}

table th {
  background-color: #f1f1f1;
  font-weight: bold;
}

table td {
  border: 1px solid #ccc;
}
</style>
</html>