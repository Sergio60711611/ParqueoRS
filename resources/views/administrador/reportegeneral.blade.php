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
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
             
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                        <h2>Reportes</h2>
                        <div class="box">
                        <ul>
                        <li><a class="dropdown-item" href="{{url ('/administrador/reportess')}}">
                        <i class="nav-icon fa fa-usd"></i>
                        <span class="text">Reporte de ingresos monetarios</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/administrador/reporte')}}">
                        <i class="nav-icon fa fa-car"></i>
                        <span class="text">Reporte de ingresos y salidas de vehiculos</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/administrador/reportes')}}">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <span class="text">Registro de clientes</span>
                        </a></li>
                        </ul>
                        <img src="{{ asset('/img/reporte.png') }}" >
                        </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        </div>
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}

.container{
    background-color: #FFFFFF;
    padding:0px;
}
.container-blanco {
    justify-content:space-between;
    width: 95%;
    height: 95%;
    background-color: #ffffff;
    border: 1px solid #ffffff;
    padding: 20px;
}

li{
    list-style:none
}
h2{
    color: #324855;
    font-family: "Poppins";
    font-weight: 700;
    font-size: 2.5vw;
    margin-left: 20vw;
    margin-top: 2vw;
    font-style: normal;
    line-height: 3.75vw;
    height: 3.75vw;
    
}
.dropdown-item {
  text-decoration: none;
  display: flex;
  align-items: center;
}
.nav-icon {
  margin-right: 5px; 
}

.text {
  font-size: 16px; 
  width: 34.83vw; 
    height: 2.17vw; 
    left: 36.42vw; 
    top: 19.5vw; 
   font-family: 'Poppins';
   font-style: normal;
   font-weight: 300;
   line-height: 2.5vw; 
   color: #000000;
}
.box {
  justify-content:space-between;
  display: flex;
  width: 35vw; 
  height: auto;
  text-align: center;
}
.box img {
  display: flex;
  margin: 10%;
  width: 40%;
  height: 40%;
  left: 10%;
  top: 10%;
  margin-top:1%;
}

.box h1 {
  text-align: center;
  color: #324855;
  width: 100%;
    height: 1vw;
    left: 22vw;
    top: 10vw;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 1.5vw;
    line-height: 3.6vw;
}

</style>
</html>