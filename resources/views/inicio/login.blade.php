<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="sie-edge" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
    <link rel="stylesheet" type="text/css" href="\css\loginstyle.css">
    <title>Registro Inicio</title>
    
</head> 
<body>
<div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="/storeClienteVehiculo"method="POST" role="form">>
                <ul id="progressbar">
                <li class="active">Paso N</li>
                <li>Paso N</li>
                
            </ul>
                <fieldset>
                    <h1>Datos Cliente</h1>
                            {{csrf_field()}}
                            <input type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}"></input>
                            @error('nombre')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="Apellido" name="apellido" value="{{ old('apellido') }}"></input>
                            @error('apellido')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="Celular" name="celular" value="{{ old('celular') }}"></input>
                            @error('celular')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="CI"name="ci" value="{{ old('ci') }}"></input>
                            @error('ci')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="email" placeholder="Correo"name="correo_electronico" value="{{ old('correo_electronico') }}"></input>
                            @error('correo')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Repita su contraseña">

                    <input type="button" name="next" class="next action-button" value="Suigiente" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;" />

                </fieldset>
                <fieldset>
                   <h1>Datos Vehiculo</h1>
                            <input type="text" placeholder="Marca" name="marca" value="{{ old('marca') }}"></input>
                            @error('marca')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="Modelo"name="modelo" value="{{ old('modelo') }}"></input>
                            @error('modelo')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="Placa" name="placa" value="{{ old('placa') }}" ></input>
                            @error('placa')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                            <input type="text" placeholder="Color" name="color" value="{{ old('color') }}"></input>
                            @error('color')
                                <p1 class="error-message">{{ $message }}</p1>
                            @enderror
                    <button type="submit" class="submit-button" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;">Enviar</button>
                    <input type="button" name="previous" class="previous action-button" value="Anterior" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;" />
                </fieldset>
            </form>
            
        </div>
        <div class="form-container sign-in-container">
        <form action="/inicioSesion" method="POST" role="form">
                <h1>Iniciar Sesion Cliente</h1>
                <div class="social-container">
                    <a href="/inicio/loginUser" class="social" title="Usuario">
						<ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="/inicio/loginGuardia" class="social" title="Guardia">
						<ion-icon name="walk-outline"></ion-icon>
                    </a>
                    <a href="/inicio/loginAdmin" class="social" title="Administrador">
						<ion-icon name="person"></ion-icon>
                    </a>
                </div>
                <span>Seleccion tu tipo de usuario</span>
                    {{csrf_field()}}
                    <input type="hidden" id="rol" name="rol" value="Cliente"></input>
                    <input type="text" placeholder="CI" id="ciSesion" name="ciSesion"></input>
                        @error('ciSesion')
                            <p1 class="error-message">{{ $message }}</p1>
                        @enderror
                    <input type="password" class="form-control" id="passwordSesion" name="passwordSesion" placeholder="Contraseña">
                    @error('passwordSesion')
                            <p1 class="error-message">{{ $message }}</p1>
                    @enderror
                    <button type="submit" class="submit-button" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;">Iniciar</button>
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
            @if(session('alert'))
                <div class="alert alert-info">
                    {{ session('alert') }}
                </div>
            @endif
            @if(session('alert2'))
                <div class="alert2 alert-info">
                    {{ session('alert2') }}
                </div>
            @endif
        </div>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="\js\login.js"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    
	<button class="btn-corner" onclick="window.location.href = '..'">Atras</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        
    </body>
</body>
<style>
    p1 {
        color: red;
    }
    .alert {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        background-color: red;
        color: white;
        padding: 10px;
    }
    .alert2 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        background-color: blue;
        color: white;
        padding: 10px;
    }
</style>
</html>
