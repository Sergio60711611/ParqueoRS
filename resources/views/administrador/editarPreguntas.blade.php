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
    @include('administrador.navbar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Editar Preguntas</b></h2></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edición de la Preguntas</h3>
                            </div>
                            <form action="{{url ('/updatePregunta', $preguntasFrecuentes->id)}}" method="POST" role="form">
                                    @csrf
                                    @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Pregunta</label>
                                    <input type="text" class="form-control" id="pregunta" name="pregunta" value="{{$preguntasFrecuentes->pregunta}}">
                                    @error('pregunta')
                                                <p1 class="error-message">{{ $message }}</p1>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Respuesta</label>
                                    <input type="text" class="form-control" id="respuesta" name="respuesta" value="{{$preguntasFrecuentes->respuesta}}">
                                    @error('respuesta')
                                                <p1 class="error-message">{{ $message }}</p1>
                                    @enderror
                                </div>
                                <div class="form-group">
                                   <label for="">Fecha/Hora de Emision*</label>
                                   <input type="datetime-local" class="form-control" name="emitido" value="{{ $preguntasFrecuentes->emitido }}">
                                   @error('emitido')
                                               <p1 class="error-message">{{ $message }}</p1>
                                   @enderror
                                </div>
                                <div class="form-group">
                                <input type="hidden" class="form-control" name="id_parqueo"   value="1">
                                @error('id_parqueo')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn_editar" style="background-color:#53A790; border-color:#53A790;">Actualizar</button>
                                    <a href="/administrador/preguntas" class="btn btn-default" style="background-color:#53A790;border-color:#53A790;color:#FFFFFF;" >Cancelar</a>
                                   
                                </div>
                                <img src="{{ asset('/img/parqueo3.jpg') }}">
                                </form>
                            </div>
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
    input{
        margin-top: -1%;
    }
    p1 {
        color: red;
    }
</style>
</html>