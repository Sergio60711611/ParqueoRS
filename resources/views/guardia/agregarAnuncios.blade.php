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
        $id = $guardia['id'];
        $nombre = $guardia['nombre'];    
        $apellido = $guardia['apellido'];
        $correo = $guardia['correo_electronico'];
        $celular = $guardia['celular'];
        $turno=$guardia['turno'];
        $password = $guardia['password'];
        $ci = $guardia['ci'];
    @endphp

    @include('guardia.navbar', ['id' => $id])
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
        <h5>Guardia: </h5>
        <p>Esta es la vista para el guardia de apellido : {{$apellido}}</p>
        </div>
    </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
           @include('guardia.msj')
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                <div class="table-title">
                     <div class="row">
                            <div class="col-sm-8"><h2><b>Agregar un Anuncio</b></h2></div>
                     </div>
                </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nuevo Anuncio</h4>
                                    </div>
                                    <form action="/createAnuncio" method="POST" role="form">
                                    {{csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="titulo">Titulo*</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo del comunicado" value="{{ old('titulo') }}">
            @error('titulo')
                <p1 class="error-message">{{ $message }}</p1>
            @enderror
        </div>
        <div class="form-group">
            <label for="comunicado">Contenido*</label>
            <input type="text" class="form-control" name="comunicado" placeholder="Ingrese el comunicado" value="{{ old('comunicado') }}">
            @error('comunicado')
                <p1 class="error-message">{{ $message }}</p1>
            @enderror
        </div>
        <div class="form-group">
            <label for="emitido">Fecha/Hora de Emision*</label>
            <input type="datetime-local" class="form-control" name="emitido" value="{{ old('emitido') }}">
            @error('emitido')
                <p1 class="error-message">{{ $message }}</p1>
            @enderror
        </div>
        <div class="form-group">
            <label for="vencimiento">Fecha/Hora de Vencimiento*</label>
            <input type="datetime-local" class="form-control" name="vencimiento"  value="{{ old('vencimiento') }}">
            @error('vencimiento')
                <p1 class="error-message">{{ $message }}</p1>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_parqueo"   value="1">
            @error('id_parqueo')
                <p1 class="error-message">{{ $message }}</p1>
            @enderror
        </div>
        <div class="form-group2">
            <button  type="submit" class="btn btn-primary" id="btn_guardar" style="background-color:#53A790; border-color:#53A790;">Guardar</button>
            <a href="/administrador/anuncios" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;">Cancelar</a>
        </div>

                                        <img src="{{ asset('/img/parqueo3.jpg') }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
        
    </body>
<style>
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
    h2{
        font-family: 'Poppins', sans-serif;
        color: #324855;
    }
    .card{
        margin-top: 5px;
        border: 5px solid #53A790;
        border-radius : 15px;
        margin-bottom: 0%;
    }
    .card-header{
        background-color:#53A790;
        color: #ffffff;
    }
    img {
        width: 20%;
        height:auto;
        margin-top: -4%;
        margin-left: 81%;
        margin-bottom: -1%;
    }
    p1 {
        color: red;
    }
    input{
        margin-top: -1%;
    }
</style>
</html>