<!--MENU-INICIO-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <div class="wrapper">                
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
                @php
                        $id2 = $id; 
                @endphp
                <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#324855">
                    <!-- Brand Logo -->
                    <a href="{{url ('/cliente/'. $id2 .'/home')}}" class="brand-link"  style="margin-top: 5px; margin-bottom: 5px;" >
                    <img src="{{ asset('/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Radiador Springs</span>
                    </a>
                    <!-- inicio-sidebar -->
                    <div class="sidebar">                    
                    <!-- inicio-sidebar-menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="{{url ('/guardia/'. $id2 .'/home')}}"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="fas fa-home mr-2"></i>
                            <p>Home</p>
                            </a>
                        </li>

                        <!--<li class="nav-item">
                            <a href="#"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="fas fa-user-circle mr-2"></i>
                            <p>Mi Perfil</p>
                            </a>
                        </li>-->

                        <li class="nav-item">
                            <a href="#" class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>Parqueo <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url ('/guardia/'. $id2 .'/mapeoParqueo')}}" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Mapeo del parqueo</p>
                                </a>
                            </li>
                            </ul>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url ('/guardia/'. $id2 .'/reservas')}}" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Lista de Reservas</p>
                                </a>
                            </li>
                            </ul>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url ('/guardia/'. $id2 .'/vehiculos')}}" class="nav-link active" style="background-color: #395261; color:#FFFFFF">
                                <i class="nav-icon fas fa-car"></i>
                                <p>Lista de Vehiculos</p>
                                </a>
                            </li>
                            </ul>
                        </li>

                        <!--<li class="nav-item">
                            <a href="#"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>Pagos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas  fa-calendar-check"></i>
                            <p>Reservas</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{url ('/guardia/'. $id2 .'/preguntas')}}"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-question"></i>
                            <p>Preguntas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#"  class="nav-link active" style="background-color: #F9FA85; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>Anuncios</p>
                            </a>
                        </li>-->


                        <li class="nav-item">
                            <a href="/" class="nav-link active" style="background-color: #FD968E; color:#324855; margin-top: 3px;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Cerrar Sesion</p>
                            </a>
                            
                        </li>


                        </ul>
                    </nav>
                    <!-- fin-sidebar-menu -->
                    </div>
                    <!-- fin-sidebar -->
                </aside>
                <!-- fin-main-sidebar-container -->
                <!-- inicio-control-sidebar -->