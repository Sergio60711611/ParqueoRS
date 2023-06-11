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
           @include('cliente.msj')
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Anuncios</b></h2></div>
                                </div>
                            </div>
                            <a class="button" href="/administrador/agregarAnuncio">+ Agregar un Anuncio</a>

                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Titulo</th>
                                        <th class = text-center >Descripcion</th>
                                        <th class = text-center >Emitido</th>
                                        <th class = text-center >Vencimiento</th>
                                        <th class = text-center ></th>
                                    </tr>
                                </thead>
                                @php 
                                    $counter2 = 1;
                                @endphp                                
                                @foreach($lista as $anuncio)
                                    <tr>
                                        <td class = text-center>{{$counter2}}</td>
                                        @php 
                                            $counter2=$counter2 +1; 
                                            
                                        @endphp
                                        <td class = text-center>{{$anuncio->titulo}}</td>
                                        <td class = text-center>{{$anuncio->comunicado}}</td>
                                        <td class = text-center>{{$anuncio->emitido}}</td>
                                        <td class = text-center>{{$anuncio->vencimiento}}</td>
                                    <td class = text-center>
                                            <a href= "{{url ('/administrador/editarAnuncio', $anuncio)}}" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="material-icons"style="color:#2A4858">edit</i>
                                            </a>
                                            <a href="{{url ('/administrador/borrarAnuncio', $anuncio)}}" class="delete" title="Delete" data-toggle="tooltip">
                                                <i class="material-icons"style="color:#2A4858">delete</i>
                                            </a>
                                    </td>
                                    </tr>
                                @endforeach
                            </table>
                            <img src="{{ asset('/img/parqueo1.png') }}">
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
}

.button:hover {
  background-color:  #429BA7 ;
}

.button:active {
  background-color:   #47A8B5
;
}

</style>
</html>