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
    @include('administrador.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
            <div class="container-xl">
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-8"><h2><b>Eliminar Cliente</b></h2></div>
                     </div>
                </div>
                
                <div class="container-fluic">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                                </div>
                            <form action="{{url ('/deletec', $cliente->id)}}" method="POST" role="form">
                                    @csrf
                                    @method('delete')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{$cliente->nombre}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$cliente->apellido}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ci</label>
                                        <input type="text" class="form-control" id="ci" name="ci" value="{{$cliente->ci}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" class="form-control" id="correo" name="correo" value="{{$cliente->correo_electronico}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{$cliente->password}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" id="btn_borrar" style="background-color:#53A790; border-color:#53A790;" >Borrar</button>
                                        <a href="/administrador/clientes" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;">Cancelar</a>
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