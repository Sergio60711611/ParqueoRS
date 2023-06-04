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
@php
        $id = $cliente['id'];
        $nombre = $cliente['nombre'];    
        $apellido = $cliente['apellido'];
        $correo = $cliente['correo_electronico'];
        $celular = $cliente['celular'];
        $password = $cliente['password'];
        $ci = $cliente['ci'];
    @endphp

    @include('cliente.navbar', ['id' => $id])
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
            @include('administrador.msj')
            <div class="container-xl">
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-10"><h2><b>Mapeo del parqueo Cliente</b></h2></div>
                     </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
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
                                                            <!--Botones de calendario-->
                                                            <div class = "container Botones">
                                                                        <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                        </a>
                                                                        <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                        </a>
                                                                    </div>
                                                            <!--Fin Botones de calendario-->
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
                                                            <!--Botones de calendario-->
                                                            <div class = "container Botones">
                                                                <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                    Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                </a>
                                                                <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                    Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                </a>
                                                            </div>
                                                            <!--Fin Botones de calendario-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    @endif
                                    @if($sitiosMapeo->estado == "Reservado")
                                        <div class="col-2">
                                            <center>
                                            <h2>{{$sitiosMapeo->nro_sitio}}</h2>
                                                <!--Modal Ingresar Espacio-->
                                                    <a href= "#"data-toggle="modal" data-target="#ingresarReserva{{$sitiosMapeo->id}}"style="width: 64px; height: 114px; background-color:#FFFFFF; border-color:#FFFFFF;">
                                                        <img src="{{ asset('/img/parqueo6.png') }}" style="width: 64px; height:114px; margin-left:-10px" alt="">
                                                    </a>
                                                    <div class="modal fade" id="ingresarReserva{{$sitiosMapeo->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:#31747D;">
                                                                <h5 class="modal-title" id="exampleModalLongTitle" >Cuviculo N°{{$sitiosMapeo->id}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!--Botones de calendario-->
                                                                <div class = "container Botones">
                                                                    <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                        Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                    </a>
                                                                    <a href= "#" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                        Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                    </a>
                                                                </div>
                                                                <!--Fin Botones de calendario-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--FIN Modal Ingresar Espacio-->
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