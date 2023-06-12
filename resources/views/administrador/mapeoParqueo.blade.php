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

@include('administrador.navbar')
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
                                                            <div class="container">
                                                            </div>
                                                            <!--Botones de calendario-->
                                                            <div class = "container Botones">
                                                                        <a href= "{{url ('/administrador/reserva/calendario', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                        </a>
                                                                        <a href= "{{url ('/administrador/reservaSitio', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!--Fin Botones de calendario-->
                                                                    <hr>
                                                                <form action="/storeIngreso" method="POST" role="form">
                                                                {{csrf_field()}}
                                                                    <div class="card-body" >
                                                                        <div class="form-group"style="text-align: left;">
                                                                            <label for="selectOpcion">Selecciona una opción:</label>
                                                                            <select class="form-control" id="selectOpcion" name="selectOpcion">
                                                                            <option value="1">Ingreso Cliente Registrado</option>
                                                                            <option value="2">Ingreso Cliente No Registrado</option>
                                                                            <option value="3">Reservado</option>
                                                                            </select>
                                                                        </div>
                                                                        <hr>
                                                                        <div style="text-align: right;">
                                                                        <label class="" style="text-right" id ="inputletra" >En caso de haber seleccionado : "Cliente Registrado"</label>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <input type="hidden" class="form-control" name="id_sitio" id = "id_sitio" value="{{$sitiosMapeo->id}}"></input>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="meeting-time" id ="inputfechaText">Fecha/Hora Ingreso</label>
                                                                            <input type="datetime-local" class="form-control" name="fecha_hora_ingreso" id="fecha_hora_ingreso" value="{{$now}}" >
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputplacaVehiculo">Placa*</label>
                                                                            <input type="text" class="form-control" name="placaVehiculo" id="placaVehiculo" placeholder="Ingrese la placa del vehiculo que ingresara"></input>
                                                                        </div>
                                                                        <div style="text-align: right;">
                                                                        <label class="" style="text-right" id ="inputletra" >En caso de haber seleccionado : "Cliente No Registrado"</label>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputnombreCli">Nombre del Cliente:</label>
                                                                            <input type="text" class="form-control" name="nombreCli" id="nombreCli" placeholder="Ingrese el nombre del cliente no registrado" value="{{ old('nombreCli') }}"></input>
                                                                            @error('nombreCli')
                                                                                <p1 class="error-message">{{ $message }}</p1>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputapellidoCli" >Apellido del Cliente:</label>
                                                                            <input type="text" class="form-control" name="apellidoCli" id="apellidoCli" placeholder="Ingrese el apellido del cliente no registrado" value="{{ old('apellidoCli') }}"></input>
                                                                            @error('apellidoCli')
                                                                                <p1 class="error-message">{{ $message }}</p1>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputciCli" >Ci del Cliente:</label>
                                                                            <input type="text" class="form-control" name="ciCli" id="ciCli" placeholder="Ingrese el ci del cliente no registrado" value="{{ old('ciCli') }}"></input>
                                                                            @error('ciCli')
                                                                                <p1 class="error-message">{{ $message }}</p1>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputplacaCli">Placa del Cliente:</label>
                                                                            <input type="text" class="form-control" name="placaCli" id="placaCli" placeholder="Ingrese la placa del vehiculo del cliente no registrado" value="{{ old('placaCli') }}"></input>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="" id ="inputhoras">Horas en parqueo:</label>
                                                                            <input type="number" class="form-control" name="horas" id="horas" placeholder="Ingrese el numero de horas por los que se quedara" value="{{ old('horas') }}"></input>
                                                                            @error('horas')
                                                                                <p1 class="error-message">{{ $message }}</p1>
                                                                            @enderror
                                                                        </div>
                                                                        <div style="text-align: right;">
                                                                        <label class="" style="text-right" id ="inputletra" >En caso de haber seleccionado : "Reservado"</label>
                                                                        </div>
                                                                        <hr id="hr">
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
                                                                <!--Botones de calendario-->
                                                            <div class = "container Botones">
                                                                        <a href= "{{url ('/administrador/reserva/calendario', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                        </a>
                                                                        <a href= "{{url ('/administrador/reservaSitio', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!--Fin Botones de calendario-->
                                                                    <hr>
                                                                <form action="/storeSalida" method="POST" role="form">
                                                                {{csrf_field()}}
                                                                    <div class="card-body" >
                                                                        <div style="text-align: right;">
                                                                            <label class="" style="text-right" id ="inputletra" >Registre la salida de este sitio</label>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <input type="hidden" class="form-control" name="id_sitio" id = "id_sitio" value="{{$sitiosMapeo->id}}"></input>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="meeting-time" id ="inputfechaText">Fecha/Hora Salida</label>
                                                                            <input type="datetime-local" class="form-control" name="fecha_hora_salida1" id="fecha_hora_salida1" value="{{$now}}" disabled>
                                                                            <input type="hidden" type="datetime-local" class="form-control" name="fecha_hora_salida" id="fecha_hora_salida" value="{{$now}}" >
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
                                                                        <a href= "{{url ('/administrador/reserva/calendario', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Ver Calendario  <i class="nav-icon fas fa-calendar-alt"></i>
                                                                        </a>
                                                                        <a href= "{{url ('/administrador/reservaSitio', $sitiosMapeo->id)}}" class="btn btn-primary" style="background-color:#31747D; border-color:#31747D;">
                                                                            Lista de reservas  <i class="nav-icon fas fa-list-alt"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!--Fin Botones de calendario-->
                                                                    <hr>
                                                                <form action="/storeSalida" method="POST" role="form">
                                                                {{csrf_field()}}
                                                                    <div class="card-body" >
                                                                        <div style="text-align: right;">
                                                                            <label class="" style="text-right" id ="inputletra" >Cambie el estado del cuviculo a "Libre"</label>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <input type="hidden" class="form-control" name="id_sitio" id = "id_sitio" value="{{$sitiosMapeo->id}}"></input>
                                                                            <input type="hidden" class="form-control" name="estado" id = "estado" value="Reservado"></input>
                                                                        </div>
                                                                        <div class="form-group" style="text-align: left;">
                                                                            <label for="meeting-time" id ="inputfechaText">Fecha/Hora Salida</label>
                                                                            <input type="datetime-local" class="form-control" name="fecha_hora_salida1" id="fecha_hora_salida1" value="{{$now}}" disabled>
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
    <!--<script>
        $(document).ready(function() {
        $('#selectOpcion').change(function() {
            var opcionSeleccionada = $(this).val();

            // Habilitar o deshabilitar elementos según la opción seleccionada
            if (opcionSeleccionada == '1') {
                $('#placaVehiculo').show();
                $('#inputplacaVehiculo').show();
                $('#nombreCli').hide();
                $('#inputnombreCli').hide();
                $('#apellidoCli').hide();
                $('#inputapellidoCli').hide();
                $('#ciCli').hide();
                $('#inputciCli').hide();
                $('#placaCli').hide();
                $('#inputplacaCli').hide();
                $('#horas').hide();
                $('#inputhoras').hide();
                $('#hr').show();
            } else if (opcionSeleccionada == '2') {
                $('#placaVehiculo').hide();
                $('#inputplacaVehiculo').hide();
                $('#nombreCli').show();
                $('#inputnombreCli').show();
                $('#apellidoCli').show();
                $('#inputapellidoCli').show();
                $('#ciCli').show();
                $('#inputciCli').show();
                $('#placaCli').show();
                $('#inputplacaCli').show();
                $('#horas').show();
                $('#inputhoras').show();
                $('#hr').show();
            }else{
                $('#inputletra').hide();
                $('#inputfechaText').hide();
                $('#fecha_hora_ingreso').hide();
                $('#placaVehiculo').hide();
                $('#inputplacaVehiculo').hide();
                $('#nombreCli').hide();
                $('#inputnombreCli').hide();
                $('#apellidoCli').hide();
                $('#inputapellidoCli').hide();
                $('#ciCli').hide();
                $('#inputciCli').hide();
                $('#placaCli').hide();
                $('#inputplacaCli').hide();
                $('#horas').hide();
                $('#inputhoras').hide();
                $('#hr').hide();
            }
        });
        });
    </script>-->
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