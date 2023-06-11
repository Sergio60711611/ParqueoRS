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
        <div class="content-wrapper">
            <div class="container">
            @include('cliente.msj') 
            <!--INICIO CRUD -->
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                            @php 
                                    $counter = 1;
                            @endphp
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Lista de Mis Vehiculos Registrados</b></h2></div>
                                </div>
                                <a href="{{url ('/cliente/'.$id.'/agregarVehiculo')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color:#53A790; border-color:#53A790;">Agregar Automovil</a>
                            </div>
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Marca</th>
                                        <th class = text-center >Modelo</th>
                                        <th class = text-center >Placa</th>
                                        <th class = text-center >Color</th>
                                        <th class = text-center >Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($listavCliente as $vehiculo)
                                    <tr>
                                        <td class = text-center>{{$counter}}</td>
                                        @php 
                                            $counter=$counter +1; 
                                            
                                        @endphp
                                        <td class = text-center>{{$vehiculo->marca}}</td>
                                        <td class = text-center>{{$vehiculo->modelo}}</td>
                                        <td class = text-center>{{$vehiculo->placa}}</td>
                                        <td class = text-center>{{$vehiculo->color}}</td>
                                        <td class = text-center>
                                            <a href= "{{url ('/cliente/'.$id.'/borrarVehiculo/'.$vehiculo->id.'')}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"style="color:#2A4858">delete</i></a>
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