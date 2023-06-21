<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Radiador Springs</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <style>
        .container-xl {
            width: auto;
            background: #ffff;
            padding: 40px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            border-radius: 10px;
            margin-top: 1%;
        }

        h2 {
            font-family: 'Poppins', sans-serif;
            color: #324855;
        }

        .card {
            margin-top: 5px;
            border: 5px solid #53A790;
            border-radius: 15px;
            margin-bottom: 0%;
        }

        .card-header {
            background-color: #53A790;
            color: #ffffff;
        }

        img {
            width: 35%;
            height: auto;
            margin-top: -4%;
            margin-left: 35%;
            margin-bottom: -1%;
        }

        input {
            margin-top: -1%;
        }
    </style>
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
        <h5>Cliente:</h5>
        <p>Esta es la vista para el usuario de apellido: {{$apellido}}</p>
    </div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
    <div class="container-xl">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2><b>Buzon de Sugerencias/Reclamos</b></h2></div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sugerencia/Reclamos</h4>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            
                        @endif
                        @if (session('message'))
                      <div class="alert alert-success">
                           {{ session('message') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      @endif

                        <form action="/cliente/info/reclamos" method="POST">

                        @csrf
                        <div class="card-body">
                            <div class="form-row"></div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje:</label>
                                <textarea name="mensaje" id="mensaje" placeholder="Escriba su mensaje de reclamos/sugerencias" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group2">
                                <button type="submit" class="btn btn-primary" id="btn_enviar" style="background-color:#53A790; border-color:#53A790;">Enviar</button>
                            </div>
                        </div>
                        <img src="{{ secure_asset('img/sugerencias.png') }}">
                    </form>
                </div>
                <!-- /.content-wrapper -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</div>
</div>
</body>
</html>
