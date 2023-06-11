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
        $id = $cliente['id'];
        $nombre = $cliente['nombre'];    
        $apellido = $cliente['apellido'];
        $correo = $cliente['correo_electronico'];
        $celular = $cliente['celular'];
        $password = $cliente['password'];
        $ci = $cliente['ci'];
    @endphp
    <div id="cliente-info" data-id="{{ $id }}"></div>
    @include('cliente.navbar', ['id' => $id])
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
        <h5>Cliente: </h5>
        <p>Esta es la vista para el usuario de apellido : {{$apellido}}</p>
        </div>
    </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
            @include('cliente.msj') 
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                    <h2>Mis Reservas</h2>
                   
                    <div class="tabs">
        <button  class="tab" onclick="showCurrent()">Reservas Actuales</button>
        <button class="tab" onclick="showPast()">Reservas Anteriores</button>
    </div>
   <div></div>
   <div id="currentReservas"></div>
<div id="pastReservas"></div>
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
   <script>
 var reservas;

$(document).ready(function() {
    var clienteId = parseInt(document.getElementById("cliente-info").dataset.id);
    console.log(clienteId);
    showReservas(clienteId);
});

function showReservas(id) {
    $.ajax({
        url: "/reservaInfo",
        method: "GET",
        data: { id_cliente: id },
        success: function(response) {
            reservas = response.filter(function(reserva) {
                return parseInt(reserva.id_cliente) === id;
            });
            console.log(reservas);
            showCurrent();
        },
        error: function(xhr, status, error) {
            console.log("Error:", error);
        }
    });
}

function showCurrent() {
    if (reservas) {
        var currentReservas = document.getElementById("currentReservas");
    var pastReservas = document.getElementById("pastReservas");

    currentReservas.innerHTML = "";
    pastReservas.innerHTML = "";

    var currentDate = new Date();

    for (var i = 0; i < reservas.length; i++) {
        var reserva = reservas[i];
        var salidaDate = new Date(reserva.fecha_salida + " " + reserva.hora_salida);

        if (salidaDate >= currentDate) {
            var card = createCard(reserva);
            currentReservas.appendChild(card);
        } else {
            var card = createCard(reserva);
            pastReservas.appendChild(card);
        }
    }

    currentReservas.style.display = "block";
    pastReservas.style.display = "none";
    } else {
        console.log("No se han cargado las reservas.");
    }
}

function showPast() {
    var currentReservas = document.getElementById("currentReservas");
    var pastReservas = document.getElementById("pastReservas");

    currentReservas.innerHTML = "";
    pastReservas.innerHTML = "";

    var currentDate = new Date();

    for (var i = 0; i < reservas.length; i++) {
        var reserva = reservas[i];
        var salidaDate = new Date(reserva.fecha_salida + " " + reserva.hora_salida);

        if (salidaDate < currentDate) {
            var card = createCard(reserva);
            pastReservas.appendChild(card);
        }
    }

    currentReservas.style.display = "none";
    pastReservas.style.display = "block";
}

function createCard(reserva) {
    var card = document.createElement("div");
    card.className = "card";

    var title = document.createElement("h3");
    title.textContent = "Reserva";
    title.classList.add("card-meta", "card-meta-emitted");

    var espacio = document.createElement("p");
    espacio.innerHTML = "<strong>Espacio Nro:</strong> " + reserva.id_sitio;

    var horario = document.createElement("p");
    horario.innerHTML = "<strong>Horario:</strong> " + reserva.hora_ingreso + "-" + reserva.hora_salida;

    var fechaIngreso = document.createElement("p");
    fechaIngreso.innerHTML = "<strong>Fecha ingreso:</strong> " + reserva.fecha_ingreso;

    var fechaSalida = document.createElement("p");
    fechaSalida.innerHTML = "<strong>Fecha salida:</strong> " + reserva.fecha_salida;

    var duracion = document.createElement("p");
    duracion.innerHTML = "<strong>Duración:</strong> " + reserva.cantidad_de_horas + " hora(s)";

    card.appendChild(title);
    card.appendChild(espacio);
    card.appendChild(horario);
    card.appendChild(fechaIngreso);
    card.appendChild(fechaSalida);
    card.appendChild(duracion);

    return card;
}


    </script>

</body>
<style>
   .card {
       width: 90%;
       margin-top: 20px;
       padding: 20px;
       background-color:#CAE7C0;
       box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
       margin-left: 5%;
   }
.card-meta-emitted {
  font-weight: bold;
}

body {
color: #566787;
font-family: 'Poppins', sans-serif;
background-color: #D9D9D9; 
height:auto;
}
.tabs {
display: flex;
}

.tab {
padding: 10px;
background-color:  #ADD6CB;
cursor: pointer;
border: 1px solid #999;
border-bottom: none;
border-radius: 5px 5px 0 0;
}

.tab:hover {
background-color: #53A790  ;
}

.tab-content {
border: 1px solid #999;
padding: 10px;
border-top: none;
border-radius: 0 5px 5px 5px;
}

.tab-pane {
display: none;
}

.tab-pane.active {
display: block;
}

h2{
color: #324855;
font-family: "Poppins";
font-weight: 700;
font-size: 2.5vw;
margin-top: 2vw;
font-style: normal;
line-height: 3.75vw;
height: 3.75vw;
text-align: center;
}

img {
width: 100%;
height:auto;
margin-top: -19vw;
}
.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}

.container{
    background-color: #FFFFFF;
    padding:0px;
}
.container-blanco {
    width: 95%;
    height: 95%;
    background-color: #ffffff;
    border: 1px solid #ffffff;
    padding: 20px;
}

.tab {
padding: 10px;
background-color:  #ADD6CB;
cursor: pointer;
border: 1px solid #999;
border-bottom: none;
border-radius: 5px 5px 0 0;
}

.tab:hover {
background-color: #53A790  ;
}

.tab-content {
border: 1px solid #999;
padding: 10px;
border-top: none;
border-radius: 0 5px 5px 5px;
}

.tab-pane {
display: none;
}

.tab-pane.active {
display: block;
}
</style>
</html>