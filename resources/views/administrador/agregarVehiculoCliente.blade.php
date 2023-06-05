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
    @include('administrador.navbar')
        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9; padding: 20px;">
                <div class="container-xl">
                <div class="table-title">
                @php
                    $collection = collect($cicliente);
                    $numColl = $collection->first();
                @endphp
                     <div class="row">
                            <div class="col-sm-8"><h2><b>Agregar Vehiculo del Cliente con ci :{{$numColl}}</b></h2></div>
                     </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nuevo Vehiculo</h4>
                                    </div>
                                    <form action="/storeVehiculo" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">CI Dueño*</label>
                                                <input type="text" class="form-control" name="ci" value="{{$numColl}}"></input>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Marca*</label>
                                                <input type="text" class="form-control" name="marca" placeholder="Ingrese la placa del vehiculo" value="{{ old('marca') }}"></input>
                                                @error('marca')
                                                <p1 class="error-message">{{ $message }}</p1>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Modelo*</label>
                                                <input type="text" class="form-control" name="modelo" placeholder="Ingrese el modelo del vehiculo" value="{{ old('modelo') }}"></input>
                                                @error('modelo')
                                                <p1 class="error-message">{{ $message }}</p1>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Placa*</label>
                                                <input type="text" class="form-control" name="placa" placeholder="Ingrese la marca del vehiculo" value="{{ old('placa') }}" ></input>
                                                @error('placa')
                                                <p1 class="error-message">{{ $message }}</p1>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Color*</label>
                                                <input type="text" class="form-control" name="color" placeholder="Ingrese el color del vehiculo" value="{{ old('color') }}"></input>
                                                @error('color')
                                                <p1 class="error-message">{{ $message }}</p1>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group2">
                                            <button  type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#53A790; border-color:#53A790;">Guardar</button>
                                            <a href="/administrador/vehiculos" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;">Cancelar</a>
                                        </div>
                                        <img src="{{ asset('/img/parqueo8.png') }}">
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
        width: 35%;
        height:auto;
        margin-top: -4%;
        margin-left: 67%;
        margin-bottom: -1%;
    }
    input{
        margin-top: -1%;
    }
</style>
</html>