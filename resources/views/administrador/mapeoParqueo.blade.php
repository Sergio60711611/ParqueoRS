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
        <!-- Botton circle style -->
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
        <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
            @include('administrador.msj')
            <div class="container-xl">
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-10"><h2><b>Mapeo del parqueo</b></h2></div>
                            <div class="row"><h1><h2></h2></h1></div>
                            <a class="btn btn-info btn-circle m-1" data-toggle="modal" data-target="#ingresarIn" style="background-color:#2A4858; border-color:#2A4858;"><i class="fa fa-plus"></i></a>
                        <!--Modal Añadir espacio-->
                            <div class="modal fade" id="ingresarIn"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#2A4858; border-color:#2A4858;">
                                            <h5 class="modal-title" id="exampleModalLongTitle" >Añadir espacio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/aumentarSitio" method="POST" role="form">
                                            {{csrf_field()}}
                                                <div class="card-body" >
                                                <div class="form-group">
                                                    <label class="">¿Desea agregar un espacio a su parqueo?</label>
                                                </div>
                                                <div class="form-group2">
                                                    <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Fin Modal Añadir espacio-->
                        <a class="btn btn-info btn-circle m-1" data-toggle="modal" data-target="#ingresarEl" style="background-color:#2A4858; border-color:#2A4858;"><i class="fa fa-trash"></i></a>
                        <!--Modal Añadir espacio-->
                            <div class="modal fade" id="ingresarEl"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#2A4858; border-color:#2A4858;">
                                            <h5 class="modal-title" id="exampleModalLongTitle" >Eliminar espacio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/quitarSitio" method="POST" role="form">
                                            {{csrf_field()}}
                                                <div class="card-body" >
                                                <div class="form-group">
                                                    <label class="">¿Desea eliminar un espacio de su parqueo?</label>
                                                </div>
                                                <div class="form-group2">
                                                    <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Fin Modal Añadir espacio-->
                        
                <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                       </div>
                </div>
                     </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!--ModalIngresarEspacio
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="background-color:#324855; border-color:#324855">Agregar Espacio</button>
                                Modal 
                                    <div class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Espacio</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/aumentarSitio" method="POST" role="form">
                                                        {{csrf_field()}}
                                                            <div class="card-body" >
                                                            <div class="form-group">
                                                                <label for="">Estado</label>
                                                                <input type="text" class="form-control" name="estado" value="Libre" disabled></input>
                                                            </div>
                                                            <div class="form-group2">
                                                                <button  type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#53A790; border-color:#53A790;">Guardar</button>
                                                            </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                ModalIngresarEspacioFin-->
                                <div class="row">
                                @foreach($sitios as $sitiosMapeo)
                                    @if($sitiosMapeo->estado == "Libre")
                                        <div class="col-2">
                                            <center>
                                            <h2>{{$sitiosMapeo->nro_sitio}}</h2>
                                             <!--Modal Ingresar Espacio-->
                                             <a href= "#"data-toggle="modal" data-target="#ingresarRegistro{{$sitiosMapeo->id}}" class="btn btn-success" style="width: 64px; height: 114px; background-color:#53A790; border-color:#53A790;">
                                                <p>Libre</p>
                                            </a>
                                                    <div class="modal fade" id="ingresarRegistro{{$sitiosMapeo->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:#31747D;">
                                                                <h5 class="modal-title" id="exampleModalLongTitle" >Cuviculo N°{{$sitiosMapeo->id}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/storeIngreso" method="POST" role="form">
                                                                {{csrf_field()}}
                                                                    <div class="card-body" >
                                                                    <!--Botones de calendario-->
                                                                    <div class = "container Botones">
                                                                        <a href= "{{url ('/administrador/reserva/calendario', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                        </a>
                                                                        <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!--Fin Botones de calendario-->
                                                                    <hr>
                                                                        <div style="text-align: right;">
                                                                        <label class="" style="text-right">Registre el nuevo estado de este sitio</label>
                                                                        </div>
                                                                        <p></p>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="opcion">Selecciona el nuevo estado:</label>
                                                                            <select class="form-control" id="opcion" name="opcion">
                                                                                <option value="Ocupado">Ocupado</option>
                                                                                <option value="Reservado">Reservado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <input type="hidden" class="form-control" name="id_sitio" id = "id_sitio" value="{{$sitiosMapeo->id}}"></input>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="meeting-time">Fecha/Hora Ingreso</label>
                                                                            <input type="datetime-local" class="form-control" name="fecha_hora_ingreso" value="{{$now}}" min="2023-04-29T00:00" disabled>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="">Placa*</label>
                                                                            <input type="text" class="form-control" name="placaVehiculo" placeholder="Ingrese la placa del vehiculo que ingresara" value="{{ old('placa') }}" ></input>
                                                                        </div>
                                                                        <!--<div class="form-group" style="text-align: left;">
                                                                            Inicio Botones desplegable
                                                                            <label for="">Seleccione el nuevo estado</label>
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    Opciones <span class="caret"></span>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <button class="dropdown-item" type="submit" name="opcion" value="opcion1">Reserva</button>
                                                                                    <button class="dropdown-item" type="submit" name="opcion" value="opcion2">Ingreso</button>
                                                                                </div>
                                                                            </div>
                                                                            Fin Botones desplegables
                                                                        </div>-->
                                                                    <div class="form-group2">
                                                                        <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--FIN Modal Ingresar Espacio-->
                                            </center>
                                        </div>                                  
                                    @endif
                                    @if($sitiosMapeo->estado == "Ocupado")
                                        <div class="col-2">
                                            <center>
                                            <h2>{{$sitiosMapeo->nro_sitio}}</h2>
                                                    <!--Modal Ingresar Espacio-->
                                                    <a href= "#"data-toggle="modal" data-target="#ingresarRegistro{{$sitiosMapeo->id}}"style="width: 64px; height: 114px; background-color:#FFFFFF; border-color:#FFFFFF;">
                                                            <img src="{{ asset('/img/Parqueo4.png') }}" style="width: 64px; height:114px; margin-left:-10px" alt="">
                                                    </a>
                                                    <div class="modal fade" id="ingresarRegistro{{$sitiosMapeo->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:#31747D;">
                                                                <h5 class="modal-title" id="exampleModalLongTitle" >Cuviculo N°{{$sitiosMapeo->id}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/storeSalida" method="POST" role="form">
                                                                {{csrf_field()}}
                                                                    <div class="card-body" >
                                                                    <div class="form-group">
                                                                        <label class="">¿Desea registrar la salida de este vehiculo?</label>
                                                                        <input type="text" class="form-control" name="id_sitio" id = "id_sitio" value="{{$sitiosMapeo->id}}"></input>
                                                                    </div>
                                                                    <div class="form-group2">
                                                                        <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                                                    </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--FIN Modal Ingresar Espacio-->
                                            </center>
                                        </div>
                                    @endif
                                    @if($sitiosMapeo->estado == "Reservado")
                                        <div class="col-2">
                                            <center>
                                            <h2>{{$sitiosMapeo->nro_sitio}}</h2>
                                                    <button class="btn btn-info" data-toggle="modal" style="width: 64px; height: 114px; background-color:#FFFFFF; border-color:#FFFFFF;">
                                                            <img src="{{ asset('/img/parqueo6.png') }}" style="width: 64px; height:114px; margin-left:-10px" alt="">
                                                    </button>
                                            </center>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
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
    background-color:#D9D9D9;
    font-family: 'Poppins', sans-serif;
}
h2{
    font-family: 'Poppins', sans-serif;
    color: #324855;
}
h5{
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
}
img {
    width: 20%;
    height:auto;
    margin-top: 2%;
    margin-left: 81%;
    margin-bottom: -1%;
}
.btn-circle {
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  padding: 0;
  border-radius: 50%;
}
.btn-circle i {
  position: relative;
  top: -1px;
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
.container-xl{
        width: auto;
        background: #ffff;
        padding: 40px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        border-radius: 10px;
        margin-top: 1%;
}
</style>
</html>