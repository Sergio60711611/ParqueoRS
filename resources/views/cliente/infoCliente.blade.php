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
                        <li class="nav-item">
                            <a href="/administrador/info"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-phone-alt"></i>
                            <p>Ayuda</p>
                            </a>
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
                        <h2>¿Cómo podemos ayudarte?</h2>
                        <div class="box">
                        <ul>
                        <li><a class="dropdown-item" href="#">
                        <i class="nav-icon far fa-calendar-plus"></i>
                        <span class="text">Mis Reservas</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/administrador/info/horarios">
                        <i class="nav-icon far fa-clock"></i>
                        <span class="text">Horario de Atención/Tarifas</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/administrador/info/anuncios">
                        <i class="nav-icon fa fa-bullhorn"></i>
                        <span class="text">Anuncios</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/perfil')}}">
                        <i class="nav-icon fas fa-user"></i>
                        <span class="text">Mi perfil</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/administrador/info/preguntas">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <span class="text">Preguntas Frecuentes</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/administrador/reclamos">
                        <i class="nav-icon far fa-envelope"></i>
                        <span class="text">Buzon de Sugerencias/Reclamos</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="https://t.me/RADIADORSPRINGS_bot">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <span class="text">Otras consultas</span>
                        </a></li>
                        </ul>
                        </div>
                        <div class="box">
                        <img src="{{ asset('/img/apoyo.png') }}" >
                        <h1>Esperamos que esto sea de ayuda</h1>
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
  display: inline-block;
  width: 35vw; 
  height: auto;
  text-align: center;
}
.box img {
  display: block;
  margin: 0 auto;
  width: 50%;
  height: 50%;
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
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 700;
    font-size: 1.5vw;
    line-height: 3.6vw;
}
.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}
.container{
    background-color: #FFFFFF;
    padding:0px;
}

</style>
</html>