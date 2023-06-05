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
    <body class="hold-transition sidebar-mini" style="background-color:#D9D9D9 ">
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
            <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
                <div class="container-xl">
                @include('cliente.msj') 
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-11"><h2><b> Mi Perfil</b></h2></div>
                            <div class="col-sm-1">
                            <a href="{{url ('/cliente/'. $id .'/editarPerfil')}}" class="btn btn-info btn-circle m-1" title="Editar Mi Perfil" style="background-color:#2A4858; border-color:#2A4858; border-radius: 50%;"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Datos Personales</h4>
                                    </div>
                                        <div class="card-body" >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Nombre:</label>
                                                <input type="text" class="form-control" value="{{$nombre}}" disabled></input>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Apellido:</label>
                                                <input type="text" class="form-control" value="{{$apellido}}" disabled></input>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="">Correo Electronico*</label>
                                                <input type="text" class="form-control" value="{{$correo}}" disabled></input>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" value="{{$celular}}" disabled></input>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-7">
                                                <label for="">Ci</label>
                                                <input type="text" class="form-control" value="{{$ci}}" disabled></input>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-7">
                                                <label for="">Contraseña</label>
                                                <input type="text" class="form-control" value="{{$password}}" disabled></input>
                                            </div>
                                        </div>
                                        <img src="{{ asset('/img/parqueo11.png') }}">
                                        </div>
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
    .container-xl{
        width: auto;
        background: #ffff;
        padding: 40px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        border-radius: 10px;
        margin-top: 1%;
    }
    h2{
        font-family: 'Poppins', sans-serif;
        color: #324855;
    }
    .card{
        margin-top: 5px;
        border: 5px solid #53A790;
        border-radius : 15px;
        margin-bottom: 0%;
    }
    .card-header{
        background-color:#53A790;
        color: #ffffff;
    }
    img {
        width: 30%;
        height:auto;
        margin-top: -30%;
        margin-left: 65%;
        margin-bottom: -1%;
    }
    input{
        margin-top: -1%;
    }
</style>
</html>