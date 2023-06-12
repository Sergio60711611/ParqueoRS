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
    @include('administrador.navbar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                    <h2>Reporte de Clientes Registrados</h2>
                    <form action="/administrador/reportes" method="GET">
    <div class="form-group">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
    </div>
    <div class="form-group">
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
<div class="tabla">
<table>
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>CI</th>
            <th>Correo electrónico</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->celular }}</td>
            <td>{{ $cliente->ci}}</td>
            <td>{{ $cliente->correo_electronico }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
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
.tabla{
    text-align: center;
    width: 100%;
    height:auto;
    padding-left:5%;
    padding-top:2%;
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
  border-collapse: collapse;
}

thead {
  background-color: blue;
  color: white;
  text-align: center;
}

thead th {
  padding: 8px;
}

td, th {
  border: 1px solid black;
  padding: 8px;
}


.form-group {
  display: inline-block;
  width: 35vw; 
  height: auto;
  text-align: center;
}
</style>
</html>