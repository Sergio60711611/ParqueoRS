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
<h2>Preguntas Frecuentes</h2>
                    <div class="search-container">
  <input type="text" id="search-input" placeholder="Buscar preguntas...">
  <button onclick="searchFAQs()">  <i class="fas fa-search"></i></button>
</div>
    <div class="faq-container" id="faq-container"></div>
    <div class="pagination-container" id="pagination-container"></div>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        </div>
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

        <script>
         var faqData; // Declarar la variable faqData fuera de la función de éxito de la solicitud AJAX
var currentPage = 1;
var itemsPerPage = 6;
var originalFAQs = []; // Almacena los datos originales

function toggleAnswer(index) {
    var answer = document.getElementById("answer-" + index);
    if (answer.style.display === "none") {
        answer.style.display = "block";
    } else {
        answer.style.display = "none";
    }
}

function renderPagination() {
    var totalPages = Math.ceil(faqData.length / itemsPerPage);
    var paginationContainer = document.getElementById("pagination-container");
    paginationContainer.innerHTML = "";

    for (var i = 1; i <= totalPages; i++) {
        var button = document.createElement("button");
        button.className = "pagination-button";
        button.innerHTML = i;
        button.setAttribute("onclick", "changePage(" + i + ")");
        paginationContainer.appendChild(button);
    }
}

function changePage(page) {
    currentPage = page;
    renderFAQs(currentPage);
}

function searchFAQs() {
    var input = document.getElementById("search-input").value.toLowerCase();
    var filteredFAQs = originalFAQs.filter(function (faq) {
        return faq.pregunta.toLowerCase().includes(input);
    });

    faqData = filteredFAQs;
    currentPage = 1;
    renderFAQs(currentPage);
}

function renderFAQs(page) {
    var container = document.getElementById("faq-container");
    container.innerHTML = "";

    var startIndex = (page - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;
    var faqsToRender = faqData.slice(startIndex, endIndex);

    faqsToRender.forEach(function(faq, index) {
        var question = document.createElement("div");
        question.className = "faq-question";
        question.innerHTML = faq.pregunta;
        question.setAttribute("onclick", "toggleAnswer(" + (startIndex + index) + ")");
        container.appendChild(question);

        var answer = document.createElement("div");
        answer.className = "faq-answer";
        answer.id = "answer-" + (startIndex + index);
        answer.innerHTML = faq.respuesta;
        container.appendChild(answer);
    });

    renderPagination();
}

$(document).ready(function() {
    $.ajax({
        url: "/preguntas",
        method: "GET",
        success: function(response) {
            faqData = response;
            console.log(faqData);
            originalFAQs = faqData.slice(); // Almacena los datos originales
            renderFAQs(currentPage); // Llamar a la función renderFAQs después de obtener los datos
        },
        error: function(xhr, status, error) {
            console.log("Error:", error);
        }
    });

    window.onload = function () {
        renderFAQs(currentPage);
    };
});

    </script>
    </body>

<style>
body {
    color: #566787;
    font-family: 'Poppins', sans-serif;
    background-color: #D9D9D9; 
    height:auto;
}
h2{
  color: #324855;
    font-family: "Poppins";
    font-weight: 700;
    font-size: 2.5vw;
    margin-left: 25vw;
    margin-top: 2vw;
    font-style: normal;
    line-height: 3.75vw;
    height: 3.75vw;
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
.faq-container {
            width: 100%;
            max-width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .faq-question {
  background-color:   #ADD6CB;
  padding: 10px;
  margin-bottom: 5px;
  cursor: pointer;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.faq-question:hover {
  background-color: #e0e0e0;
}

.faq-answer {
  padding: 10px;
  display: none;
  background-color: #ffffff;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-bottom: 10px;
}

        .pagination-container {
            margin-top: 10px;
        }

        .pagination-button {
  margin-right: 5px;
  padding: 8px 12px;
  background-color: #31747D;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.pagination-button:hover {
  background-color: #31747D;
}

.pagination-button:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.4);
}
.search-container {
  display: flex;
  align-items: center;
}

#search-input {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
}

#search-input:focus {
  outline: none;
  border-color: #31747D;
  box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.4);
}

#search-input::placeholder {
  color: #999;
}

button {
  padding: 8px 12px;
  background-color:  #31747D;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #2980b9;
}

</style>
</html>