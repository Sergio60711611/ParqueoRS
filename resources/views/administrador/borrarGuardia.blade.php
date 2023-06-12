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
                <div class="borde-formulario">
                
                    <h2 class="tituloa"><strong>Eliminar Guardia</strong></h2>
               
                <!-- borde 2-->
                <div class ="borde2-formulario">    
                        <h4 class="titulob">Datos del Guardia</h4>
                    <!--Formulario-->
                        <form class="formulario" action="{{url ('/borrarguardia', $guardia->id)}}" method="POST" role="form">
                                @csrf
                                @method('delete')
                                <label class = "nombres" for="">Nombres<font color="red">*</font></label>
                                
                                <input type="text" class="cnombre" name="nombre" placeholder="Ingrese su(s) nombre(s)" value="{{$guardia->nombre}}" disabled></input>
                                
                                <label class = "apellidos" for="">Apellidos<font color="red">*</font></label>
                                
                                <input type="text" class="capellido" name="apellido" placeholder="Ingrese su(s) apellido(s)" value="{{$guardia->apellido}}" disabled></input>
                                
                                
                                <label class = "cis" for="">CI<font color="red">*</font></label>
                                
                                <input type="text" class="cci" name="ci" placeholder="Ingrese su carnet de identidad" value="{{$guardia->ci}}" disabled></input>
                                
                          
                                <label class = "correos" for="">Correo<font color="red">*</font></label>
                                
                                <input type="email" class="ccorreo" name="correo_electronico" placeholder="Ingrese su correo electrónico" value="{{$guardia->correo_electronico}}" disabled></input>
                               

                                <label class = "contraseña" for="">Contraseña<font color="red">*</font></label>
                                
                                <input type="password" class="ccontraseña" id = "ccontraseña" name="password" placeholder="Ingrese la contraseña" value="{{$guardia->password}}" disabled></input>
                                <button class="botonm" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span> </button>
                                
                                <div class="celular">
                                <label class = "celulars" for="">Celular<font color="red">*</font></label>
                                
                                <input type="number" class="ccelular" name="celular" placeholder="Ingrese su número de celular" value="{{$guardia->celular}}" disabled></input>
                                
                                </div>
                                <div class = turno>
                                <label class = "turnos" for="">Turno<font color="red">*</font></label>
                                <input type="text" class="cturno" name="turno" value="{{$guardia->turno}}" disabled></turno>
                                
                                <form action="'/guardia.destroy',$guardia->id" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="botong">Borrar</button>
                                </form>
                            <a href="/administrador/guardias" class="botonc">Cancelar</a>
                            </form>
                            <img class = "auto" src="{{ asset('/img/parqueo3.jpg') }}" alt="">                    
                            </div>
</div>

  <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script type="text/javascript">
        function mostrarPassword(){
            var tipo = document.getElementById("ccontraseña");

            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
		
</script>
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
.borde-formulario{
    position: fixed;
    margin: auto;
    background-color: white;
    width: 75%;
    height: 70%;
    margin-left: 22%;
    margin-top: 1%;
    border-radius: 1%;
}
.borde2-formulario{
    position: relative;
    background-color: #53A790;
    margin: auto;
    width: 75%;
    height: 80%;
    margin-left: 10%;
    margin-top: 2%;
    border-radius: 2%;
}
.formulario{
    width: 98%;
    height: 91%;
    background-color: white;
    position: absolute;
    margin: auto;
    left: 1%;
    border-radius: 2%;
}
.titulob{
    font-size: 'Poppins', sans-serif;
    margin: auto;
    margin-left: 2%;
    margin-top: 1%;
    margin-bottom: 0%;
    color: white;
}
.tituloa{
    font-size: 'Poppings', sans-serif;
    margin: auto;
    margin-left: 1%;
    color: #324855;
}
.nombres{
    margin-top: 1%;
    margin-left: 1%;
}

.cnombre{
    margin-top: -5%;
    margin-left: 1%;
    width: 98%;
}
.apellidos{
    margin-top: 1%;
    margin-left: 1%; 
}

.capellido{
    margin-top: -1%;
    margin-left: 1%;
    width: 98%;
}
.cis{
    margin-top: 1%;
    margin-left: 1%;
}

.cci{
    margin-top: -1%;
    margin-left: 1%;
    width: 98%;
}
.correos{
    margin-top: 2%;
    margin-left: 1%
}
.ccorreo{
    margin-top: -1%;
    margin-left: 1%;
    width: 40%;
}
.celulars{
    margin-top: 1%;
    margin-left: 1%
}
.ccelular{
    margin-top: -1%;
    margin-left: 1%; 
    width: 35%;
}
.turnos{
    margin-top: 2%;
    margin-left: 1%
}
.cturno{
    margin-top: -1%;
    margin-left: 1%;
    width: 35%;
}
.fechais{
    margin-left: 1%;
    margin-top: 3%;
}
.cfechai{
    margin-left: 1%;
}
.fechafs{
    margin-top: 2%;
    margin-left: 2%;
}
.cfechaf{
    margin-left: 1%;
}
.contraseña{
    margin-left: 1%;
}
.botong{
text-align: center;
cursor: pointer;
box-sizing: border-box;
position: absolute;
width: 12%;
height: 6%;
left: 2%;
top: 90%;
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
top: 90%;
background: #324855;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}
.auto{
    position: absolute;
    left: 80%;
    width: 15%;
    top: 75%;
}
@media  (min-width: 720px) and (max-width: 1080px){
    
}
</style>
</html>