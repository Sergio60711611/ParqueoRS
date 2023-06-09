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
        <div class="wrapper">
                <!--MENU-INICIO-->
                <!-- inicio-navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    </li>
                </ul>
                </nav>
                <!-- fin-navbar -->
                <!-- inicio-main-sidebar-container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#324855">
                    <!-- Brand Logo -->
                    <a href="/administrador/home" class="brand-link"  style="margin-top: 5px; margin-bottom: 5px;" >
                    <img src="{{ asset('/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Radiador Springs</span>
                    </a>
                    <!-- inicio-sidebar -->
                    <div class="sidebar">
                    <!-- inicio-sidebar-menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 5px;">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Clientes<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/clientes" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Lista de Clientes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/agregarCliente" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Agregar Cliente</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 5px;">
                            <i class="nav-icon fas fa-car"></i>
                            <p>Automoviles<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/vehiculos" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-car"></i>
                                <p>Lista de automoviles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/agregarVehiculo" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar Automovil</p>
                                </a>
                            </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>Parqueo <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/mapeoParqueo" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Mapeo del parqueo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/createAgregarIngreso" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-podcast"></i>
                                <p>Asignar espacio</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855;  margin-top: 3px;">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Horario <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar Horario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF; font-size:14px">
                                <i class="nav-icon far fa-clock"></i>
                                <p>Horario de emergencia</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Reservar <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar reserva</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        </ul>
                    </nav>
                    <!-- fin-sidebar-menu -->
                    </div>
                    <!-- fin-sidebar -->
                </aside>
                <!-- fin-main-sidebar-container -->
                <!-- inicio-control-sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <div class="p-3">
                    <h5>Administrador</h5>
                    <p>Esta es la vista para el usuario administrador</p>
                    </div>
                </aside>
                <!-- fin-control-sidebar -->
                <!--MENU-FIN-->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container p-3 my-3 border">
                    <div class= "container">
                    <h2>Horarios/Precios</h2>
                    <div class="boxDiv">
                    <div class="box">
                    <img src="{{ asset('/img/openClose.png') }}" >
                    <h1>Horarios de Atencion</h1>
                   <table class="table"  
                   style="border-collapse: collapse;
                   max-width: 50%;"
                   >
                            
                                @foreach($lista3 as $horario)
                                    <tr>
                                        <td style="border: none;" class = text-center>{{$horario->dia_horario}}</td>
                                        <td style="border: none;" class = text-center>{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                    <div class="box" >
                    <img src="{{ asset('/img/costo.png') }}" >
                    <h1>Tarifas Diarias</h1>
                   <table class="table table-bordered" style=" max-width: 50%;">
                            <thead>
                                    <tr>
                                        <th class = text-center >Horas </th>
                                        <th class = text-center >Costo</th>
                                    </tr>
                                </thead>
                           
                                @foreach($lista2 as $tarifa)
                                    <tr>
                                        <td class = text-center>{{$tarifa->horas}}</td>
                                        <td class = text-center>{{$tarifa->precio}}</td>
                                    </tr>
                                @endforeach
                            </table>
                    <h1>Tarifas Mensuales</h1>
                    <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >Plan Mensual </th>
                                        <th class = text-center >Horarios</th>
                                        <th class = text-center >Dias</th>
                                        <th class = text-center >Costo</th>
                                    </tr>
                                </thead>                              
                                @foreach($lista1 as $plan_mensual)
                                    <tr>
                                        <td class = text-center>{{$plan_mensual->nombre_plan}}</td>
                                        <td class="text-center">{{ substr($plan_mensual->hora_inicio, 0, 5) }} - {{ substr($plan_mensual->hora_fin, 0, 5) }}</td>
                                        <td class = text-center>{{$plan_mensual->dias_validez}}</td>
                                        <td class="text-center">{{ number_format($plan_mensual->precio_plan, 0, '', '') }}Bs</td>

        
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                    </div>
                    </div>
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
    font-family: 'Poppins', sans-serif;
    background-color: #D9D9D9; 
    height:auto;
}
h2{
    color: #324855;
    font-family: "Poppins";
    font-weight: 700;
    font-size: 2.5vw;
    margin-left: 28vw;
    margin-top: 2vw;
    font-style: normal;
    line-height: 3.75vw;
    height: 3.75vw;
    
}
.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}
.container{
    background-color: #FFFFFF;
    padding:0px;
    
    
}
.boxDiv{
    display: flex;
}
.box {
  display: inline-block;
  width: 45%; 
  height: auto;
  text-align: center;
  flex-basis: 0;
  flex-grow: 1;
  padding-bottom:30px;
  
}
.box img {
  display: block;
  margin: 0 auto;
  width: 25%;
  height:25%;
  left: 902px;
  top: 216px;
  margin-top:1%;
}

.box h1 {
  text-align: center;
  color: #324855;
  width: 100%;
    height: 1vw;
    left: 22vw;
    top: 10vw;
    margin-bottom:3vw;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 1.5vw;
    line-height: 3.6vw;
}
table {
  width: auto;
  max-width: 90%;
  margin: 0 auto;
  margin-bottom:5px;
  border-collapse: collapse;
}

table td, table th {
  padding: 3px;
  text-align: left;
  font-size: 13px;
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