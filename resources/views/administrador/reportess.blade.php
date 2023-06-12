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
    @include('administrador.navbar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
                <div class="container container-blanco">
<!--INICIO CRUD -->
<div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Ingresos</b></h2></div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Ingresos</th>
                                    </tr>
                                </thead>
                                @foreach($pago as $pago)
                                    <tr>
                                        <td class = text-center>{{$pago->id}}</td>
                                        <td class = text-center>{{$pago->monto_pagado}}</td>
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
</style>
</html>