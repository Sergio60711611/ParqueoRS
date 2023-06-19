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
        <div class="wrapper">
        @include('administrador.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
            <!--INICIO CRUD -->
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                            <div class="row">
                                    <div class="col-sm-8"><h2><b>Reporte de ingresos</b></h2></div>
                                </div>
                            </div>
                            <form action="{{ route('buscar3') }}" method="GET">
   
    <input class="cajab" type="text" name="sitio" placeholder="Ingrese el sitio">
    <input class="cajab" type="date" name="fecha_inicio">
    <input class="cajab" type="date" name="fecha_fin">
    <button class="button" type="submit">Buscar</button>
</form>
<div class="row">
                                    <div class="col-sm-8"><h2><b>Clientes registrados</b></h2></div>
                                </div>
                            @php 
                                $counter = 1;
                            @endphp
                            <table class="table table-bordered" id="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Sitio</th>
                                        <th class = text-center >Fecha de Pago</th>
                                        <th class = text-center >Monto</th>
                                    </tr>
                                </thead>
                                @php
                                $totalMonto = 0;
                                @endphp
                                @foreach($result as $pago)
                                    <tr>
                                    <td class = text-center>{{$counter}}</td>
                                        @php 
                                            $counter=$counter +1;
                                        @endphp
                                        <td class = text-center>{{$pago->nro_sitio}}</td>
                                        <td class = text-center>{{$pago->fecha_pago}}</td>
                                        <td class = text-center>{{$pago->monto_pagado}} Bs</td>
                                    </tr>
                                    <?php
                                        $totalMonto += $pago->monto_pagado;
                                        ?>
                                        </tr>
                                    @endforeach
                                    <tr>
                                    <td class="text-right" colspan="3">Total Monto:</td>
                                    <td class="text-center">{{ $totalMonto }} Bs</td>
                                    </tr>
                                    </table>
                                
                                <table class="table table-bordered" id="table table-bordered">
                                <div class="col-sm-8"><h2><b>Clientes no registrados</b></h2></div>
                                    <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Sitio</th>
                                        <th class = text-center >Fecha de Pago</th>
                                        <th class = text-center >Monto</th>
                                    </tr>
                                
                                </thead>
                                @php
                                $totalMonto2 = 0;
                                @endphp
                                @foreach($results as $pagos)
                                    
                                    <tr>
                                        <td class = text-center>{{$pagos->id}}</td>
                                        <td class = text-center>{{$pagos->nro_sitio}}</td>
                                        <td class = text-center>{{$pagos->fecha_ingreso}}</td>
                                        <td class = text-center>{{$pagos->monto}} Bs</td>
                                        <?php
                                        $totalMonto2 += $pagos->monto;
                                        ?>
                                        </tr>
                                    @endforeach
                                    <tr>
                                    <td class="text-right" colspan="3">Total Monto:</td>
                                    <td class="text-center">{{ $totalMonto2 }} Bs</td>
                                    </tr>
                                    @php
                                    $totalMontoTotal = 0;
                                    @endphp
                                    <!-- Calcular la suma total de montos de ambas tablas-->
                                    <?php
                                    $totalMontoTotal = $totalMonto + $totalMonto2;
                                    ?>
                                    <tr>
                                    <td class="text-right" colspan="3">Monto total parqueo:</td>
                                    <td class="text-center">{{ $totalMontoTotal }} Bs</td>
                                    </tr>


                            </table>
                            <img src="{{ asset('/img/parqueo1.png') }}">
                            <a class="button" href="{{url ('/administrador/reportegeneral')}}">Atras</a>
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
td img{
    width: 50%;
    height:50%;
    margin-top: 1%;
    margin-left: 10%;
    margin-bottom:-2%;
}
.imag{
    width: 100px;
    height: 50px;
}
.form-group {
  display: inline-block;
  width: 35vw; 
  height: auto;
  text-align: center;
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
  margin-left: 5%;
}
.cajab{
    position: relative;
    width: 20%;
    left: 2%;
    margin-top: 2%;
    text-align: center;
}
</style>
</html>