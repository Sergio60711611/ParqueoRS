<!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="DeScwEWMqNNcFQoVzueIxDfZlUQLL3b1sNASG5u0">
        <title>Radiador Springs</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script> 
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"> </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <!--Full Calendar-->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script type='importmap'>
        {"imports": {
            "@fullcalendar/core": "https://cdn.skypack.dev/@fullcalendar/core@6.1.8",
            "@fullcalendar/interaction": "https://cdn.skypack.dev/@fullcalendar/interaction@6.1.8",
            "@fullcalendar/daygrid": "https://cdn.skypack.dev/@fullcalendar/daygrid@6.1.8",
            "@fullcalendar/timegrid": "https://cdn.skypack.dev/@fullcalendar/timegrid@6.1.8",
            "@fullcalendar/list": "https://cdn.skypack.dev/@fullcalendar/list@6.1.8",
            "@fullcalendar/rrule": "https://cdn.skypack.dev/@fullcalendar/rrule@6.1.8"
        }}
        </script>
        <script type='module'>
            @php
                $idDeSitio = $id;
            @endphp
        import { Calendar } from '@fullcalendar/core';
        import dayGridPlugin from '@fullcalendar/daygrid';
        import timeGridPlugin from '@fullcalendar/timegrid';
        import listPlugin from '@fullcalendar/list';
        import interactionPlugin from '@fullcalendar/interaction';
        import rrulePlugin from '@fullcalendar/rrule';

        document.addEventListener('DOMContentLoaded', function() {
            //const idDeSitio = "{{$id}}";

            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin, rrulePlugin],
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,list'
            },
            locale: 'es',
            businessHours: [
                {
                daysOfWeek: [1, 2, 3, 4, 5], // Días de la semana (Lunes a Viernes)
                startTime: '06:00', // Hora de inicio hábil
                endTime: '22:00' // Hora de fin hábil
                },{
                daysOfWeek: [6,7], // Días de la semana (Lunes a Viernes)
                startTime: '06:00', // Hora de inicio hábil
                endTime: '13:00' // Hora de fin hábil
                }
            ],
                events: "/show/"+{{$idDeSitio}}

            });
            calendar.render();

        });
        </script>
</script>
    </head>
    <body class="hold-transition sidebar-mini">
    @include('administrador.navbar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-xl">
                @include('administrador.msj')
                <div class="title">
                     <div class="row">
                        <div class="col-sm-8">
                            <h2><b>Calendario</b></h2>
                        </div>   
                        <div class="col-sm-4" style="text-align: right;">
                        <!---->
                            <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccionar opción
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Plan Diario</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Plan SEMANA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Plan Mes LUN-VIE</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal4">Plan Mes SABADO</a>
                                <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal5">Plan Mes 24 hrs</a>-->
                            </div>
                            </div>

                            <!-- Modales -->
                            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal1Label">Plan Diario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/storeReservaDiaria" id="formulario1" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora Ingreso:</label>
                                                    <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" value="{{ $now->format('H:i') }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Horas reservadas:</label>
                                                    <input type="number" class="form-control" name="horas" id="horas" min="1" max="24" step="1" onkeyup="copyValue()"></input>
                                                    @php
    $hrs = 0;
@endphp

<script>
    function copyValue() {
        var input1Value = document.getElementById("horas").value;
        document.getElementById("hrs").value = input1Value;
    }
</script>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">CI Cliente:</label>
                                                    <input type="text" class="form-control" name="ciCliente" id="ciCliente"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" form="formulario1" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        @php
                                                $idReservaS = $idreserva;
                                            @endphp
                                        <script>
                                            function abrirNuevaVentana() {
                                                //window.open("{{ route('pagosqr.pagos') }}", "_blank");
                                                var input1Value = document.getElementById("horas").value;
                                                var hrs = input1Value;
                                                
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Diario') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent(hrs) + "&reserva=" + encodeURIComponent('3'), "_blank");
                                            }
                                        </script>
                                        <script>
    function abrirNuevaVentana() {
        var input1Value = document.getElementById("horas").value;
        var hrs = input1Value;

        var url = "{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Diario') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent(hrs) + "&reserva=" + encodeURIComponent('1');

        window.open(url, "_blank");
    }
</script>

                                        <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana()">Ir a Pagar</button>
                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal2Label">Plan SEMANA LUN-SAB</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/storeSemana" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora Ingreso los dias del plan:</label>
                                                <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" min="{{ $now->format('H:i') }}" value="{{ $now->format('H:i') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Horas reservadas:</label>
                                                <input type="number" class="form-control" name="horas" id="horas" min="1" max="24" step="1" ></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">CI Cliente:</label>
                                                <input type="text" class="form-control" name="ciCliente" id="ciCliente"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal3Label">Plan Mes LUN-VIE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="/storeMesLV" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora Ingreso los dias del plan:</label>
                                                <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" min="{{ $now->format('H:i') }}" value="{{ $now->format('H:i') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Horas reservadas:</label>
                                                <input type="number" class="form-control" name="horas" id="horas" min="1" max="24" step="1" ></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">CI Cliente:</label>
                                                <input type="text" class="form-control" name="ciCliente" id="ciCliente"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal4Label">Plan Mes SABADO</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="/storeMesS" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora Ingreso los dias del plan:</label>
                                                <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" min="{{ $now->format('H:i') }}" value="{{ $now->format('H:i') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Horas reservadas:</label>
                                                <input type="number" class="form-control" name="horas" id="horas" min="1" max="24" step="1" ></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">CI Cliente:</label>
                                                <input type="text" class="form-control" name="ciCliente" id="ciCliente"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!--PLAN MES 24 HRS-->
                            <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="modal5Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal5Label">Plan Mes 24 hrs</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeReservaDiaria" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora Ingreso:</label>
                                                    <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" min="{{ $now->format('H:i') }}" value="{{ $now->format('H:i') }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Horas reservadas:</label>
                                                    <input type="number" class="form-control" name="horas" id="horas" min="1" max="24" step="1" ></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">CI Cliente:</label>
                                                    <input type="text" class="form-control" name="ciCliente" id="ciCliente"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <!--<div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="plan" id = "plan" value="Diario"></input>
                                                </div>-->
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!---->
                        </div>
                     </div>
                </div>
                <div class="">
                    <h2></h2>
                </div> 
                <div id='calendar'></div>
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
}.container-xl{
        width: auto;
        background: #ffff;
        padding: 40px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        border-radius: 10px;
        margin-top: 1%;
}
</>
</html>