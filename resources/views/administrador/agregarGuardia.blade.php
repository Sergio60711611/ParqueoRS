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
                
                    <h2 class="tituloa"><strong>Agregar Guardia</strong></h2>
               
                <!-- borde 2-->
                <div class ="borde2-formulario">    
                        <h4 class="titulob">Datos del Guardia</h4>
                    <!--Formulario-->
                        <form class="formulario" action="\guardiacreado" method="Post" role="form">
                            {{csrf_field()}}
                                <label class = "nombres" for="">Nombres<font color="red">*</font></label>
                                
                                <input type="text" class="cnombre" name="nombre" placeholder="Ingrese su(s) nombre(s)"></input>
                                @error('Nombres')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                
                                <label class = "apellidos" for="">Apellidos<font color="red">*</font></label>
                                
                                <input type="text" class="capellido" name="apellido" placeholder="Ingrese su(s) apellido(s)"></input>
                                @error('Apellidos')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                
                                <label class = "cis" for="">CI<font color="red">*</font></label>
                                
                                <input type="text" class="cci" name="ci" placeholder="Ingrese su carnet de identidad"></input>
                                @error('CI')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                          
                                <label class = "correos" for="">Correo<font color="red">*</font></label>
                                
                                <input type="email" class="ccorreo" name="correo_electronico" placeholder="Ingrese su correo electrónico"></input>
                                @error('Correo')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror

                                <label class = "contraseña" for="">Contraseña<font color="red">*</font></label>
                                
                                <input type="password" class="ccontraseña" id = "ccontraseña" name="password" placeholder="Ingrese la contraseña"></input>
                                <button class="botonm" type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span> </button>
                                @error('Contraseña')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror

                                <div class="celular">
                                <label class = "celulars" for="">Celular<font color="red">*</font></label>
                                
                                <input type="number" class="ccelular" name="celular" placeholder="Ingrese su número de celular"></input>
                                @error('Celular')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                                <div class = turno>
                                <label class = "turnos" for="">Turno<font color="red">*</font></label>
                                <select name ="cturnos" id="cturnos" class="cturno" required>
                                    <option value="">Elija un Turno</option>
                                    <option value="1">Mañana(Lunes-Viernes)  (08:00 AM - 02:00 PM)</option>
                                    <option value="2"><strong>Noche(Lunes-Viernes)</strong>  (02:00 PM - 10:00 PM)</option>
                                    <option value="3"><strong>Madrugada(Lunes-Viernes)</strong>  (10:00 AM - 06:00 AM)</option>
                                    <option value="4"><strong>Sabado</strong>  (08:00 AM - 04:00 PM)</option>
                                </select>
                                <input type="hidden" for= "turno" class="turno" name="turno" id="turno"></input>
                                </div>
                                <!--
                                
                                
                                <label class = "fechais" for="">Fecha de inicio</label>
                                <input type="date" class="cfechai" name="fecha_inicio" placeholder="Ingrese la fecha de inicio"></input>
                                @error('fecha_inicio')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                            
                           
                                <label class="fechafs" for="">Fecha de fin</label>
                                <input type="date" class="cfechaf" name="fecha_fin" placeholder="Ingrese la fecha de conclusión"></input>
                                @error('fecha_fin')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                -->
                                <input type="hidden" class ="cidpar" name="id_parqueo" value="1"></input>
                            <button type="submit"  class="botong">Guardar</button>
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
<script> 
    const turnos = document.querySelector('#cturnos'); 
    console.log(turnos)
        turnos.addEventListener('change', () =>{
            let valorOption = turnos.value;
            console.log(valorOption);
            var optionSelect = turnos.options[turnos.selectedIndex];
            console.log("Opcion:", optionSelect.text);
            console.log("Valor:", optionSelect.value);

            let inputturno = document.querySelector('#turno').value=(optionSelect.text);
        })
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
    height: 85%;
    margin-left: 22%;
    margin-top: 2%;
    border-radius: 1%;
}
.borde2-formulario{
    position: absolute;
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
    width: 40%;
}
.turnos{
    margin-top: 2%;
    margin-left: 1%
}
.cturno{
    margin-top: -1%;
    margin-left: 1%; 
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