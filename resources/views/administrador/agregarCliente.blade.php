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
    @include('navbar')

        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
                <div class="container-xl">
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-8"><h2><b>Agregar Cliente</b></h2></div>
                     </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nuevo Cliente</h4>
                                    </div>
                                    <form action="/store" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                        <div class="form-group">
                                            <label for="">Nombres*</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese su(s) nombre(s)" value="{{ old('nombre') }}"></input>
                                            @error('nombres')
                                                <p1 class="error-message">{{ $message }}</p1>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Apellidos*</label>
                                            <input type="text" class="form-control" name="apellido" placeholder="Ingrese su(s) apellido(s)" value="{{ old('apellido') }}"></input>
                                            @error('apellidos')
                                                <p1 class="error-message">{{ $message }}</p1>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">CI*</label>
                                            <input type="text" class="form-control" name="ci" placeholder="Ingrese su ci"value="{{ old('ci') }}"></input>
                                            @error('ci')
                                                <p1 class="error-message">{{ $message }}</p1>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Correo*</label>
                                            <input type="text" class="form-control" name="correo_electronico" placeholder="Ingrese su correo electronico" value="{{ old('correo_electronico') }}"></input>
                                            @error('correo')
                                                <p1 class="error-message">{{ $message }}</p1>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Celular*</label>
                                            <input type="text" class="form-control" name="celular" placeholder="Ingrese su celular" value="{{ old('celular') }}"></input>
                                            @error('celular')
                                                <p1 class="error-message">{{ $message }}</p1>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña" value="{{ old('password') }}">        
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Confirmar contraseña</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Repita su contraseña">
                                        </div>
                                        <div class="form-group2">
                                            <button  type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#53A790; border-color:#53A790;">Guardar</button>
                                            <a href="/administrador/clientes" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;">Cancelar</a>
                                        </div>
                                        <img src="{{ asset('/img/parqueo3.jpg') }}">
                                        </div>
                                    </form>
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
        width: 20%;
        height:auto;
        margin-top: -4%;
        margin-left: 81%;
        margin-bottom: -1%;
    }
    p1 {
        color: red;
    }
    input{
        margin-top: -1%;
    }
</style>
</html>