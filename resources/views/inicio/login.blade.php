<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="sie-edge" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
    <link rel="stylesheet" type="text/css" href="\css\loginstyle.css">
    <title>RegistroInicio</title>
</head>

<body>

<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
            <ul id="progressbar">
    <li class="active">Paso N</li>
    <li>Paso N</li>
    
  </ul>
                <fieldset>
                    <h1>Datos Cliente</h1>
                    
                    <input type="text" placeholder="Nombre">
                    <input type="text" placeholder="Apellido">
                    <input type="text" placeholder="Celular">
                    <input type="text" placeholder="CI">
                    <input type="email" placeholder="Correo">
                    <input type="password" placeholder="Contraseña">
                    <input type="button" name="next" class="next action-button" value="Suigiente" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;" />

                </fieldset>
                <fieldset>
                
                    <h1>Datos Vehiculo</h1>
                    
                    <input type="text" placeholder="Marca">
                    <input type="text" placeholder="Modelo">
                    <input type="text" placeholder="Placa">
                    <input type="text" placeholder="Color">
                    <button type="submit" class="submit-button" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;">Enviar</button>
                    <input type="button" name="previous" class="previous action-button" value="Anterior" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;" />
                </fieldset>
                
            </form>
            
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Iniciar Sesion</h1>
                <div class="social-container">
                    <a href="usuario" class="social" title="Usuario">
						<ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="#" class="social" title="Guardia">
						<ion-icon name="walk-outline"></ion-icon>
                    </a>
                    <a href="#" class="social" title="Administrador">
						<ion-icon name="person"></ion-icon>
                    </a>
                </div>
                <span>Seleccion tu tipo de usuario</span>
                <input type="email" placeholder="Correo">
                <input type="password" placeholder="Contraseña">
                <button>Iniciar</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido</h1>
                    <p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
                    <button class="ghost" id="signIn">Iniciar Sesion</button>
					
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Eres Nuevo?</h1>
                    <p>Ingresa tus datos personales y comienza tu viaje con nosotros</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="\js\login.js"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    
	<button class="btn-corner" onclick="window.location.href = '..'">Atras</button>


</body>

</html>
