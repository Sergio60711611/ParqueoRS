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
            timeZone: 'America/La_Paz',
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
                events: "/show/"+{{$idDeSitio}},

            });
            calendar.render();
            

        });
        </script>
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
        <h5>Cliente: </h5>
        <p>Esta es la vista para el usuario de apellido : {{$apellido}}</p>
        </div>
    </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-xl">
                @include('cliente.msj')
                <div class="title">
                     <div class="row">
                        <div class="col-sm-8">
                            <h2><b>Calendario de Sitio N° {{ $idDeSitio }}</b></h2>
                        </div>   
                        <div class="col-sm-4" style="text-align: right;">
                        <!---->
                            <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#324855; border-color:#324855">
                                Reservar
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1">Plan Diario</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal2">Plan SEMANA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal3">Plan Mes Dia</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal4">Plan Mes Tarde</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal5">Plan Mes Noche</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal6">Plan Mes Nocturno</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal7">Plan Mes Completo</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal8">Plan Mes 24/5</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal9">Plan Mes Sabatico</a>
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
                                    <form action="/storeReservaDiariaCli" id="formulario1" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body">
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
                                                    <input type="number" class="form-control" name="horas1" id="horas1" min="1" max="24" step="1" onkeyup="copyValue()"></input>
                                                    @php
                                                        $hrs = 0;
                                                    @endphp
                                                    <script>
                                                        function copyValue() {
                                                            var input1Value = document.getElementById("horas1").value;
                                                            document.getElementById("hrs").value = input1Value;
                                                        }
                                                    </script>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" form="formulario1" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana1() {
                                                var input1Value = document.getElementById("horas1").value;
                                                var hrs = input1Value;
                                                
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Diario') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent(hrs) + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('6'), "_blank");
                                            }
                                        </script>
                                        <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana1()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                        </div>
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
                                    <form action="/storeSemanaCli" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora Ingreso los dias del plan:</label>
                                                <input type="time" class="form-control" name="hora_ingreso" id="hora_ingreso" value="{{ $now->format('H:i') }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                            <label for="">Horas reservadas:</label>
                                                <input type="number" class="form-control" name="horas2" id="horas2" min="1" max="24" step="1" onkeyup="copyValue()"></input>
                                                @php
                                                    $hrs2 = 0;
                                                @endphp
                                                <script>
                                                    function copyValue() {
                                                        var input2Value = document.getElementById("horas2").value;
                                                        document.getElementById("hrs2").value = input2Value;
                                                    }
                                                </script>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                            </div>
                                            <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                    <script>
                                        function abrirNuevaVentana2() {
                                            var input2Value = document.getElementById("horas2").value;
                                            var hrs2 = input2Value;
                                            
                                            window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('SEMANA LUN-SAB') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent(hrs2) + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('30'), "_blank");
                                        }
                                    </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana2()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal3Label">Plan Mes Dia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="/storeMesDiaCli" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora ingreso:</label>
                                                <input type="time" class="form-control"value="06:00" disabled></input>
                                                <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="06:00"></input>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora salida:</label>
                                                <input type="time" class="form-control"value="11:00" disabled></input>
                                                <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="11:00" ></input>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                            <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                    <script>
                                        function abrirNuevaVentana3() {
                                            window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Dia (06:00AM - 11:00AM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('570'), "_blank");
                                        }
                                    </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana3()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal4Label">Plan Mes Tarde</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="/storeMesTardeCli" method="POST" role="form">
                                    {{csrf_field()}}
                                        <div class="card-body" >
                                            <div class="form-group" style="text-align: left;">
                                                <label for="meeting-time">Fecha Inicio de Plan:</label>
                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora ingreso:</label>
                                                <input type="time" class="form-control"value="11:00" disabled></input>
                                                <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="11:00"></input>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group" style="text-align: left;">
                                                <label for="">Hora salida:</label>
                                                <input type="time" class="form-control"value="17:00" disabled></input>
                                                <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="17:00" ></input>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                            </div>
                                            <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                            <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                        <div class="form-group2">
                                            <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                        </div>
                                        </div>
                                    </form>
                                    <script>
                                        function abrirNuevaVentana4() {
                                            window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Tarde (11:00AM - 05:00PM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('680'), "_blank");
                                        }
                                    </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana4()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!--PLAN MES Noche-->
                            <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="modal5Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal5Label">Plan Mes Noche</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeMesNocheCli" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora ingreso:</label>
                                                    <input type="time" class="form-control"value="17:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="17:00"></input>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora salida:</label>
                                                    <input type="time" class="form-control"value="22:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="22:00" ></input>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana5() {
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Noche (17:00PM - 22:00PM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('570'), "_blank");
                                            }
                                        </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana5()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!---->

                        <!--PLAN MES Nocturno-->
                        <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="modal6Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal6Label">Plan Mes Nocturno</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeMesNocCli" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora ingreso:</label>
                                                    <input type="time" class="form-control"value="22:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="22:00"></input>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora salida:</label>
                                                    <input type="time" class="form-control"value="06:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="06:00" ></input>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana6() {
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Nocturno (22:00PM - 06:00AM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('900'), "_blank");
                                            }
                                        </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana6()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!---->

                        <!--PLAN MES Completo-->
                        <div class="modal fade" id="modal7" tabindex="-1" role="dialog" aria-labelledby="modal7Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal7Label">Plan Mes Completo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeMesCompletoCli" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora ingreso:</label>
                                                    <input type="time" class="form-control"value="06:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="06:00"></input>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora salida:</label>
                                                    <input type="time" class="form-control"value="22:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="22:00" ></input>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana7() {
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Completo (06:00PM - 10:00PM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('1700'), "_blank");
                                            }
                                        </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana7()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!---->

                        <!--PLAN MES 24/5-->
                        <div class="modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="modal8Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal8Label">Plan Mes 24/5</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeMesNumCli" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora ingreso:</label>
                                                    <input type="time" class="form-control"value="06:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="06:00"></input>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora salida:</label>
                                                    <input type="time" class="form-control"value="06:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="06:00" ></input>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana8() {
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes 24/5 (Todo el dia)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('2570'), "_blank");
                                            }
                                        </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana8()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!---->

                        <!--PLAN MES Sabatico-->
                        <div class="modal fade" id="modal9" tabindex="-1" role="dialog" aria-labelledby="modal9Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal9Label">Plan Mes Sabatico</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/storeMesSabaticoCli" method="POST" role="form">
                                        {{csrf_field()}}
                                            <div class="card-body" >
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="meeting-time">Fecha Ingreso:</label>
                                                    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" min="{{ $now->format('Y-m-d') }}" value="{{ $now->format('Y-m-d') }}"></input>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora ingreso Sabados:</label>
                                                    <input type="time" class="form-control"value="06:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_ingreso" id="hora_ingreso" value="06:00"></input>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group" style="text-align: left;">
                                                    <label for="">Hora salida Sabados:</label>
                                                    <input type="time" class="form-control"value="16:00" disabled></input>
                                                    <input type="hidden" class="form-control" name="hora_salida" id="hora_salida" value="16:00" ></input>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="ciCliente" id="ciCliente"value="{{ $ci }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="id_sitio" id="id_sitio" value="{{ $idDeSitio }}"></input>
                                                </div>
                                                <div class="form-group" style="text-align: left;">
                                                    <input type="hidden" class="form-control" name="idCli" id="idCli" value="{{ $id}}"></input>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;">
                                                    <p2>Revise los detalles de su reserva. Y recuerde pagar antes de continuar.</p2>
                                                </div>
                                                <hr>
                                            <div class="form-group2">
                                                <button type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#31747D; border-color:#31747D;">Confirmar</button>
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="background-color: #567C93; border-color: #567C93" >Cancelar</button>
                                            </div>
                                            </div>
                                        </form>
                                        <script>
                                            function abrirNuevaVentana9() {
                                                window.open("{{ route('pagosqr.pagos') }}?plan=" + encodeURIComponent('Mes Sabatico(06:00AM - 04:00PM)') + "&espacio=" + encodeURIComponent({{ $idDeSitio }}) + "&horas=" + encodeURIComponent('1') + "&reserva=" + encodeURIComponent({{$idreserva}})+ "&costo=" + encodeURIComponent('220'), "_blank");
                                            }
                                        </script>
                                    <div style="text-align: left;">
                                            <button class="btn btn-primary" onclick="abrirNuevaVentana9()" style="background-color:#324855; border-color:#324855">Ir a Pagar</button>
                                    </div>
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
p2{
    font-family: 'Poppins', sans-serif;
    font-size :13px;
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