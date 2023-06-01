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
        <!-- Icono car -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
    @include('navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
            @include('administrador.msj')
            <!--INICIO CRUD -->
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Lista de Clientes</b></h2></div>
                                </div>
                                <a href="/administrador/agregarCliente" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color:#53A790; border-color:#53A790;">Agregar Cliente</a>
                            </div>
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Nombres</th>
                                        <th class = text-center >Apellidos</th>
                                        <th class = text-center >CI</th>
                                        <th class = text-center >Correo</th>
                                        <th class = text-center >Celular</th>
                                        <th class = text-center >Contraseña</th>
                                        <th class = text-center >Acciones</th>
                                        <th class = text-center ></th>
                                    </tr>
                                </thead>
                                @php 
                                    $counter2 = 1;
                                @endphp                                
                                @foreach($lista as $cliente)
                                    <tr>
                                        <td class = text-center>{{$counter2}}</td>
                                        @php 
                                            $counter2=$counter2 +1; 
                                            
                                        @endphp
                                        <td class = text-center>{{$cliente->nombre}}</td>
                                        <td class = text-center>{{$cliente->apellido}}</td>
                                        <td class = text-center>{{$cliente->ci}}</td>
                                        <td class = text-center>{{$cliente->correo_electronico}}</td>
                                        <td class = text-center>{{$cliente->celular}}</td>
                                        <td class = text-center>{{$cliente->password}}</td>
                                    <td class = text-center>
                                            <a href= "{{url ('/administrador/editarCliente', $cliente)}}" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="material-icons"style="color:#2A4858">edit</i>
                                            </a>
                                            <a href="{{url ('/administrador/borrarCliente', $cliente)}}" class="delete" title="Delete" data-toggle="tooltip">
                                                <i class="material-icons"style="color:#2A4858">delete</i>
                                            </a>
                                    </td>
                                    <td>
                                        <a href="{{url ('/administrador/vehiculosCliente', $cliente)}}" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-car" style="color:#2A4858"></i>
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
</style>
</html>