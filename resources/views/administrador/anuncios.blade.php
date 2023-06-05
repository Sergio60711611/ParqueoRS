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
        <div class="wrapper">
                <!--MENU-INICIO-->
                <!-- inicio-navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    </li>
                </ul>
                </nav>
                <!-- fin-navbar -->
                <!-- inicio-main-sidebar-container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#324855">
                    <!-- Brand Logo -->
                    <a href="/administrador/home" class="brand-link"  style="margin-top: 5px; margin-bottom: 5px;" >
                    <img src="{{ asset('/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Radiador Springs</span>
                    </a>
                    <!-- inicio-sidebar -->
                    <div class="sidebar">
                    <!-- inicio-sidebar-menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 5px;">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Clientes<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/clientes" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Lista de Clientes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/agregarCliente" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Agregar Cliente</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 5px;">
                            <i class="nav-icon fas fa-car"></i>
                            <p>Automoviles<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/vehiculos" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-car"></i>
                                <p>Lista de automoviles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/agregarVehiculo" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar Automovil</p>
                                </a>
                            </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>Parqueo <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/administrador/mapeoParqueo" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Mapeo del parqueo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/administrador/createAgregarIngreso" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-podcast"></i>
                                <p>Asignar espacio</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855;  margin-top: 3px;">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Horario <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar Horario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF; font-size:14px">
                                <i class="nav-icon far fa-clock"></i>
                                <p>Horario de emergencia</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Reservar <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Agregar reserva</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        </ul>
                    </nav>
                    <!-- fin-sidebar-menu -->
                    </div>
                    <!-- fin-sidebar -->
                </aside>
                <!-- fin-main-sidebar-container -->
                <!-- inicio-control-sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <div class="p-3">
                    <h5>Administrador</h5>
                    <p>Esta es la vista para el usuario administrador</p>
                    </div>
                </aside>
                <!-- fin-control-sidebar -->
                <!--MENU-FIN-->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container p-3 my-3 border">
                    <div class= "container">
                    <h2>Anuncios</h2>
                   
                    <div class="tabs">
        <button  class="tab" onclick="showCurrent()">Anuncios Vigentes</button>
        <button class="tab" onclick="showPast()">Anuncios No Vigentes</button>
    </div>
   <div></div>
    <div id="currentAnuncios" style="display: none;"></div>
    <div id="pastAnuncios" style="display: none;"></div>
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
        var anuncios; // Declarar la variable anuncios fuera de la función de éxito de la solicitud AJAX
        
        $(document).ready(function() {
            $.ajax({
                url: "/anuncios",
                method: "GET",
                success: function(response) {
                    anuncios = response;
                    console.log(anuncios);
                    showCurrent(); // Mostrar los anuncios actuales por defecto
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        });
        
        function showCurrent() {
            var currentAnuncios = document.getElementById("currentAnuncios");
            var pastAnuncios = document.getElementById("pastAnuncios");
            
            currentAnuncios.innerHTML = "";
            pastAnuncios.innerHTML = "";
            
            var currentDate = new Date();
            
            anuncios.forEach(function(anuncio) {
                var vencimientoDate = new Date(anuncio.vencimiento);
                
                if (vencimientoDate >= currentDate) {
                    var card = createCard(anuncio);
                    currentAnuncios.appendChild(card);
                } else {
                    var card = createCard(anuncio);
                    pastAnuncios.appendChild(card);
                }
            });
            
            currentAnuncios.style.display = "block";
            pastAnuncios.style.display = "none";
        }
        
        function showPast() {
            var currentAnuncios = document.getElementById("currentAnuncios");
            var pastAnuncios = document.getElementById("pastAnuncios");
            
            currentAnuncios.innerHTML = "";
            pastAnuncios.innerHTML = "";
            
            var currentDate = new Date();
            
            anuncios.forEach(function(anuncio) {
                var vencimientoDate = new Date(anuncio.vencimiento);
                
                if (vencimientoDate < currentDate) {
                    var card = createCard(anuncio);
                    pastAnuncios.appendChild(card);
                }
            });
            
            currentAnuncios.style.display = "none";
            pastAnuncios.style.display = "block";
        }
        
        function createCard(anuncio) {
            var card = document.createElement("div");
            card.className = "card";
            
            var title = document.createElement("h3");
            title.textContent = anuncio.titulo;
            title.classList.add("card-meta", "card-meta-emitted");
            
            var comunicado = document.createElement("p");
           comunicado.innerHTML = "<strong>Descripción:</strong> " + anuncio.comunicado;
            
           var emitido = document.createElement("p");
           var fecha = new Date(anuncio.emitido);
           var options = { year: 'numeric', month: 'long', day: 'numeric' };
           emitido.innerHTML = "<strong>Emitido:</strong> " + fecha.toLocaleDateString(undefined, options);
            
            card.appendChild(title);
            card.appendChild(comunicado);
            card.appendChild(emitido);
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