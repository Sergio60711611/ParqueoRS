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
        <div class="content-wrapper">
            <div class="container">
            @include('administrador.msj') 
            <!--INICIO CRUD -->
                <div class="container-xl">
                <div class="table-responsive">
                    <div class="table">
                        <div class="table-wrapper">
                            <div class="table-title">
                            @php 
                                    $counter = 1;
                                    $collection = collect($collection);
                                    $numColl = $collection->shift();

                                    $collection2 = collect($id);
                                    $numColl2 = $collection2->shift();
                            @endphp
                                <div class="row">
                                    <div class="col-sm-8"><h2><b>Lista de Reservas del Sitio: {{$numColl2}}</b></h2></div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th class = text-center >#</th>
                                        <th class = text-center >Estado</th>
                                        <th class = text-center >Detalles</th>
                                    </tr>
                                </thead>
                                @foreach($listaReservaSitio as $reserva)
                                    <tr>
                                        <td class = text-center>{{$counter}}</td>
                                        @php 
                                            $counter=$counter +1;

                                            $fecha_timestamp = strtotime($reserva->fecha_salida);
                                            $fecha_timestamp2 = strtotime($reserva->fecha_ingreso);
                                            $ahora_timestamp = time();

                                            if ($fecha_timestamp < $ahora_timestamp) {
                                                @endphp
                                                <td class = text-center>Finalizado</td>
                                                @php
                                                //echo "La fecha ya ha pasado.";
                                            } else if($fecha_timestamp2 > $ahora_timestamp){
                                                @endphp
                                                <td class = text-center>Sin iniciar</td>
                                                @php
                                                //echo "La fecha Inicio aun no ha llegado.";
                                            }else{
                                                @endphp
                                                <td class = text-center>En Curso</td>
                                                @php
                                                //echo "La fecha Fin aún no ha llegado.";
                                            }                                               
                                        @endphp
                                        <td class = text>Fecha Ingreso:{{$reserva->fecha_ingreso}}
                                        <br class = text>Hora Ingreso:{{$reserva->hora_ingreso}}
                                        <br class = text>Fecha Salida:{{$reserva->fecha_salida}}
                                        <br class = text>Hora Salida:{{$reserva->hora_salida}}
                                        <br class = text>Cantidad de horas diarias:{{$reserva->cantidad_de_horas}}
                                        <br class = text>Cantidad de dias reservados:{{$reserva->dias}}
                                        <br class = text>Ci del cliente que reservo:{{$numColl}}</td>
                                        @php 
                                            $collection = collect($collection); 
                                            $numColl = $collection->shift();
                                        @endphp
                                    </tr>
                                @endforeach
                            </table>
                            <img src="{{ asset('/img/parqueo1.png') }}">
                        </div>
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