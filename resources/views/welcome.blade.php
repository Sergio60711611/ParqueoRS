<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('/css/menustyle.css') }}" media="all" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema-Parqueo</title>
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
                        <li><a href="inicio/login" class="btn">Sign up</a></li>
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
                    <img src="{{ asset('/img/auto.png') }}" alt="car img"class="car">
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
    
    
</body>
</html>
