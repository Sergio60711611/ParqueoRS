<!DOCTYPE html>
<html lang="en">
<head>
    <link href="./css/menustyle.css" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet"  />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema-Parqueo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="big-wrapper">
            <header>
                <div class="container">
                    <div class="logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo">
                    <h3>Radiadores SSprintS55</h3>
                    </div>
                <div class="links">
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Precios</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#" class="btn">Registrarse</a></li>
                    
                            <!-- Split dropup button -->
                            <div class="btn-group dropup">
                            <button type="button" class="btn btn-secondary">
                                Sign up
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="inicio/login">Cliente</a>
                                <a class="dropdown-item" href="inicio/login">Guardia</a>
                                <a class="dropdown-item" href="inicio/login">Administrador</a>
                            </div>
                            </div>
                        </ul>
                </div>
                <div>
            </header>

            <div class="showcase-area">
                <div class="container">
                <div class="left">
                    <div class="big-title">
                        <h1>El Futuro esta aqui,</h1>
                        <h1>Busca tu parqueo.</h1>
                    </div>
                    <p class="text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, voluptatum magnam delectus eaque, blanditiis vel possimus quibusdam dolorum rerum maiores eum quo reiciendis quae nostrum, cupiditate tenetur! Itaque, modi ab.
                    </p>
                    <div class="cta">
                        <a href="#" class="btn">Empezar</a>
                    </div>
                </div>
                <div class="rigth">
                    <img src="{{ asset('/img/auto.png') }}" alt="car img"class="car" style=" z-index: -1;">
                </div>
                </div>
            </div>
            <div class="bottom-area"></div>
            <div class="container">
                <button class="toggle-btn">

                </button>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
