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
    <body class="hold-transition sidebar-mini" style="background-color:#D9D9D9">
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
        @include('cliente.msj')
            <div class="container-xl">
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-8"><h2><b>Eliminar Vehiculo</b></h2></div>
                     </div>
                </div>
                
                <div class="container-fluic">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                                </div>
                            <form action="{{url ('/deleteVCli/'.$vehiculo->id.'/'.$id.'')}}" method="POST" role="form">
                                    @csrf
                                    @method('delete')
                                <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">CI Dueño*</label>
                                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{$cicliente->first()}}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Marca*</label>
                                        <input type="text" class="form-control" id="marca" name="marca" value="{{$vehiculo->marca}}" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="fform-group col-md-4">
                                        <label for="">Modelo*</label>
                                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{$vehiculo->modelo}}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Placa*</label>
                                        <input type="email" class="form-control" id="placa" name="placa" value="{{$vehiculo->placa}}" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Color*</label>
                                        <input type="text" class="form-control" id="color" name="color" value="{{$vehiculo->color}}" disabled>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" id="btn_borrar" style="background-color:#53A790; border-color:#53A790;" >Borrar</button>
                                        <a href="{{url ('/cliente/'. $id .'/vehiculos')}}" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;">Cancelar</a>
                                    </div>
                                    <img src="{{ asset('/img/parqueo3.jpg') }}">
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.content-wrapper -->
    </div>
    
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
        width: 20%;
        height:auto;
        margin-top: -4%;
        margin-left: 81%;
        margin-bottom: -1%;
    }
    input{
        margin-top: -1%;
    }
</style>
</html>