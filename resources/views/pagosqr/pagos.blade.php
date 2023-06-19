<!DOCTYPE html>
<html lang="es">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
        $pagar = $costo * $horas;
    @endphp

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">

            
                <div class="cuadro">
                    <div class="titulo">
                    LLegó la hora de Pagar
                    </div>
                    <div class="informacion">
                        <h4>Sitio N° '{{$espacio}}'</h4>
                        @if($plan == "Diario" || $plan == "SEMANA LUN-SAB")
                            <a>Horas : {{$horas}}</a><br>
                        @endif
                        <a>Plan : {{$plan}}</a><br>
                        <a>Costo del Plan: {{$costo}}</a>
                        <h4>Monto a Pagar : {{$pagar}}</h4>
                    </div>
                    <div class="escanea">
                    Escanea y Paga Desde tu Celular
                    </div>
                    <div class="imagen"></div>
                    <div class="form-group">
                        <form action="/storePagos" method="POST" role="form">
                        {{csrf_field()}}
                                <hr>
                                <div class="form-group" style="text-align: left;">
                                    <input type="hidden" class="form-control" name="id_sitio" id = "id_sitio" value="{{$espacio}}"></input>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <input type="hidden" class="form-control" name="id_reserva" id = "id_reserva" value="{{$reserva}}"></input>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <input type="hidden" class="form-control" name="fecha_ingreso" id = "fecha_ingreso" value="{{$fecha_ingreso}}"></input>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <input type="hidden" class="form-control" name="hora_ingreso" id = "hora_ingreso" value="{{$hora_ingreso}}"></input>
                                </div>
                                <div class="form-group" style="text-align: left;">
                                    <input type="hidden" class="form-control" name="monto_pagado" id = "monto_pagado" value="{{$pagar}}"></input>
                                </div>
                        <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;
                                                                                            position: absolute;
                                                                                            width: 150px;
                                                                                            height: 34px;
                                                                                            left: 260px;
                                                                                            top: 520px;">Pagar</button>
                        <a href="/administrador/mapeoParqueo" class="btn btn-default" style="background-color:#A75353;border-color:#53A790;color:#FFFFFF;
                                                                                            position: absolute;
                                                                                            width: 150px;
                                                                                            height: 34px;
                                                                                            left: 456px;
                                                                                            top: 520px;">Cancelar</a>
                        </form>
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
    font-family: 'Poppins', sans-serif;
    background-color: #D9D9D9; 
    height:auto;
        }
    
h2{
    font-family: 'Poppins', sans-serif;
    color: #324855;
}

h4{
    font-family: 'Poppins', sans-serif;
    color: #000000;
}

h5{
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
}
        
        .cuadro {
            background-color: #FFFFFF;
            width: 900px;
            height: 600px;
            border-radius: 10px;
            position: relative;
            left: 220px;
            top: 30px;
            
        }
        
        .titulo {
            position: absolute;
            top: 31px;
            right: 20px;
            color: #2977BE;

            font-style: normal;
            font-weight: 700;
            font-size: 32px;
            line-height: 48px;
        }

        .informacion {
            position: absolute;
            width: 475px;
            height: 121px;
            left: 37px;
            top: 30px;
        }

        .escanea {

            position: absolute;
            width: 170px;
            height: 55px;
            left: 364px;
            top: 150px;

            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 30px;

            color: rgba(41, 119, 190, 0.81);


        }

        .imagen{
            position: absolute;
            width: 260px;
            height: 260px;
            left: 310px;
            top: 234px;
            
            
            background: url(../img/pago1hora.jpeg);
            background-size: contain;
        }
</style>
</html>