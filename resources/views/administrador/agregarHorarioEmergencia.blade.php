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
    <body class="hold-transition sidebar-mini" style="background-color:#D9D9D9 ">
    @include('administrador.navbar')

                <!-- Content Wrapper. Contains page content -->
                <section class="borde-formulario">
                <div class="tituloc">
                    <h1><strong> Registrar Horario de Emergencia</strong></h1>
                </div>
                <div class=" titulob">
      
                <h2> Ingrese el horario de emergencia </h2>
      
            </div>
      <!-- Form -->
      <div class="formulario">
            <form action="/horario_emergenciacreado" method="POST" role="form">    
            {{csrf_field()}}
            <div class="fechai">
                <label class = "fechai" for="">Fecha de inicio</label>
                <input type="date" class="cfechai" name="fecha_actual" placeholder="Ingrese la fecha de inicio"></input>
                @error('fecha_actual')
                <p1 class="error-message">{{ $message }}</p1>
                @enderror
            </div>
            <div class="horaa">
                <label for="">Horario de Apertura</label>
                <input type="time" class="choraa" name="hora_apertura" placeholder="Ingrese la hora de apertura de apertura"></input>
                @error('hora_apertura')
                <p1 class="error-message">{{ $message }}</p1>
                @enderror
            </div>
            <div class="horac">
                <label for="">Horario de Cierre</label>
                <input type="time" class="chorac" name="hora_cierre" placeholder="Ingrese la hora de cierre"></input>
                @error('hora_cierre')
                <p1 class="error-message">{{ $message }}</p1>
                @enderror
            </div>
            <div class="mensaje">
                <label for="">Motivo</label>
                <textarea type="text" class="mensajem" name="mensaje" placeholder="Ingrese el motivo de cierre"></textarea>
                @error('mensaje')
                <p1 class="error-message">{{$message}}</p1>
                @enderror
            </div>
            <input type="hidden" class ="cidpar" name="id_parqueo" value="1"></input>
            <button type="submit"  class="botong">Guardar</button>
            <a href="/administrador/home" class="botonc">Cancelar</a>
            </form>
        </div>
        
        <img class= "emergencia" src="{{ asset('/img/emergencia.png') }}" >
        <div class="auton">
        <img class = "auton" src="{{ asset('/img/auton.png') }}" alt="">
        </div>
  </section>

  <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
<style>
    
    
    *{
    margin: 0%;
    padding: 0%;
}
body{
    background-color: #d9d9d9;
    font-family:"Poppins", sans-serif ;
}
.auton{
    position: absolute;
    width: 70%;
    height: 65%;
    margin: auto;
    top: 62%;
    left: 40%;
}
.emergencia{
    position: absolute;
    width: 25%;
    margin: auto;
    top: 20%;
    left: 60%;
    
}
.borde-formulario{
    margin: auto;
    margin-top: 5%;
    margin-left: 30%;
    position:fixed;
    width: 60%;
    height: 60%;
    background-color: #324855;
    border-radius: 10px;
}
.formulario{
    margin: auto;
    margin-top: 4%;
    width: 98%;
    height: 90%;
    left: 41%;
    background: #fafafa;
    border-radius: 10px;
    
    }

.tituloc{
position: fixed;
width: 40%;
height: 10%;
left: 25%;
top: 10%;
font-family: 'Poppins';
font-style: normal;
font-size: 15px;
line-height: 45px;
color: #324855;
}

.botong{
cursor: pointer;
box-sizing: border-box;
position: absolute;
width: 12%;
height: 6%;
left: 2%;
top: 87%;
background: #324855;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}
.botonc{
text-align: center;
cursor: pointer;
box-sizing: border-box;
position: absolute;
width: 12%;
height: 6%;
left: 15%;
top: 87%;
background: #324855;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}
.fechai{
    margin: auto;
    margin-left: 1%;
    margin-top: 3%;

}
.fechac{
    margin: auto;
    margin-left: 2%;
    margin-top: 2%;
}
.horaa{
    margin: auto;
    margin-left: 2%;
    margin-top: 2%;
}
.horac{
    margin: auto;
    margin-left: 2%;
    margin-top: 2%;
}
.mensaje{
    margin: auto;
    margin-left: 2%;
    margin-top: 2%;
}
.cfechai{
    margin: auto;
    margin-left: 10%;
    text-align: center;
}
.cfechac{
    margin: auto;
    margin-left: 9.8%;
    text-align: center;
}
.choraa{
    margin: auto;
    margin-left: 5%;
    text-align: center;
}
.chorac{
    margin: auto;
    margin-left: 8%;
}
.mensajem{
    position: absolute;
    margin-left: 15%;
    box-sizing: border-box;
    font: 1em 'Poppins';
    width: 30%;
    height: 20%;
    vertical-align: top;
    text-align: center;
}

.titulob{
    position: absolute;
    width: 50%;
    height: 5%;
    left: 2%;
    bottom: 94%;
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 300;
    font-size: 10px;
    line-height: 30px;
    color: #FFFFFF;
}
.icono{
    float: right;
    font-size: 16px;
    
}
@media  (min-width: 720px) and (max-width: 1080px){
    
}
</style>
</html>