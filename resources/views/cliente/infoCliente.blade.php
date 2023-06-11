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
        $id = $cliente['id'];
        $nombre = $cliente['nombre'];    
        $apellido = $cliente['apellido'];
        $correo = $cliente['correo_electronico'];
        $celular = $cliente['celular'];
        $password = $cliente['password'];
        $ci = $cliente['ci'];
    @endphp

    @include('cliente.navbar', ['id' => $id])
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
        <h5>Cliente: </h5>
        <p>Esta es la vista para el usuario de apellido : {{$apellido}}</p>
        </div>
    </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
            @include('cliente.msj') 
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                        <h2>¿Cómo podemos ayudarte?</h2>
                        <div class="box">
                        <ul>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/info/reservas')}}">
                        <i class="nav-icon far fa-calendar-plus"></i>
                        <span class="text">Mis Reservas</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/info/horarios')}}">
                        <i class="nav-icon far fa-clock"></i>
                        <span class="text">Horario de Atención/Tarifas</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/info/anuncios')}}">
                        <i class="nav-icon fa fa-bullhorn"></i>
                        <span class="text">Anuncios</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/perfil')}}">
                        <i class="nav-icon fas fa-user"></i>
                        <span class="text">Mi perfil</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/info/preguntas')}}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <span class="text">Preguntas Frecuentes</span>
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{url ('/cliente/'. $id2 .'/info/reclamos')}}">
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

</style>
</html>