<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Website Landing Page With Full Screen Draggable Image Slider - Html, Css & Javascript</title>
  <link rel="stylesheet" href="./css/swiper-bundle.min.css">
  <link rel="stylesheet" href="./css/menustyle.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

  <header>
    <div class="nav-bar">
      <a href="" class="logo">Radiador Sprints</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="#"><i class="uil uil-home"></i> Inicio</a>
          {{-- <a href="#"><i class="uil uil-compass"></i> Explore</a> --}}
          <a href="#seccion" class="btn">Acerca de</a>
          {{-- <a href="#"><i class="uil uil-info-circle"></i> About</a>--}}
          <a href="/inicio/loginUser"><i class="uil uil-document-layout-left"></i> Iniciar Sesion</a>
          <a href="/administrador/home"><i class="uil uil-envelope"></i> Registrarse</a>
      
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
  </header>

  <section class="home">
    <div class="media-icons">
      <a href="#"><i class="uil uil-facebook-f"></i></a>
      <a href="#"><i class="uil uil-instagram"></i></a>
      <a href="#"><i class="uil uil-twitter"></i></a>
    </div>

    <div class="swiper bg-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src=".\img\inicio3.jpg" alt="">
          <div class="text-content">
            <h2 class="title">!Bienvenido <span>Season</span></h2>
            <p>Tu destino confiable para el estacionamiento perfecto! 
                Nos enorgullece brindarte un servicio excepcional y la tranquilidad de saber que tu 
                vehículo está en buenas manos.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src=".\img\inicio2.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Elije tu lugar <span>Season</span></h2>
            <p>Con nuestra ubicación estratégica y espacios bien diseñados, te ofrecemos la comodidad 
                que necesitas para tus actividades diarias. Ya sea que vengas a hacer compras, a trabajar 
                o a explorar la ciudad, nuestro parqueo está aquí para hacer tu experiencia más fácil y segura.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src=".\img\inicio4.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Seguridad <span>Season</span></h2>
            <p>Contamos con un equipo amable y profesional que está listo para asistirte en todo momento. Nuestras
                 instalaciones están equipadas con medidas de seguridad avanzadas, incluyendo sistemas de vigilancia 
                 y personal dedicado, para que puedas tener total tranquilidad mientras disfrutas de tus actividades.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide">
          <img src=".\img\inicio5.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Muy Pronto <span>Season</span></h2>
            <p>"¡Atrévete a pedalear! Próximamente, ofreceremos espacios para bicicletas en nuestro parqueo.
                 Promovemos un estilo de vida activo y sustentable, brindándote opciones seguras y convenientes
                  para estacionar tu bicicleta. ¡Pronto podrás disfrutar de la libertad de moverte en dos ruedas 
                  mientras cuidas el medio ambiente! ¡Mantente atento a nuestras actualizaciones y únete al movimiento
                   ciclista en nuestro parqueo!"</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-slider-thumbs">
      <div class="swiper-wrapper thumbs-container">
        <img src=".\img\inicio3.jpg" class="swiper-slide" alt="">
        <img src=".\img\inicio2.jpg" class="swiper-slide" alt="">
        <img src=".\img\inicio4.jpg" class="swiper-slide" alt="">
        <img src=".\img\inicio5.jpg" class="swiper-slide" alt="">
      </div>
    </div>
  </section>

  <a name="seccion"></a>
  <section class="about section">
    <h2>Quienes Somos</h2>
    <p>"¡La mejor opción para estacionar tu auto! En nuestro parqueo, nos enorgullece ofrecerte un servicio excepcional 
        y una experiencia de estacionamiento inigualable. Con ubicación privilegiada, espacios amplios y medidas de seguridad a
        vanzadas, nos esforzamos por superar tus expectativas en cada visita. Nuestro equipo profesional está listo para recibirte
         con una sonrisa y brindarte la tranquilidad que mereces. No busques más, ¡has encontrado el parqueo perfecto para tu vehículo!
          ¡Ven y descubre por qué somos la elección preferida de tantos conductores satisfechos!"</p>
    <p>En Radiadores Sprint, nos dedicamos a proporcionar soluciones de estacionamiento confiables
         y convenientes para satisfacer las necesidades de nuestros clientes. Con una trayectoria sólida
          y un compromiso inquebrantable con la excelencia, nos hemos convertido en líderes en la industria del estacionamiento.</p>
    <p>Nuestro enfoque principal es brindar un servicio excepcional basado en la calidad, la comodidad y la seguridad. Nos esforzamos por ofrecer instalaciones modernas y bien mantenidas, con una amplia gama de opciones de estacionamiento para adaptarnos a diferentes necesidades y presupuestos..</p>
    <p>Nos enorgullece contar con un equipo altamente capacitado y amable, dispuesto a asistirte en cada paso del camino. Nuestro personal está comprometido a garantizar tu satisfacción y a proporcionarte una experiencia de estacionamiento sin complicaciones.<p>
    <p>Además, nos tomamos muy en serio la seguridad de tu vehículo. Implementamos rigurosas medidas de seguridad, como sistemas de vigilancia de última generación, iluminación adecuada y personal de seguridad capacitado, para garantizar la protección de tu automóvil mientras está estacionado con nosotros.<p>
    <P>En Radiadores Sprint, valoramos tu tiempo y comodidad. Por eso, hemos desarrollado sistemas eficientes de entrada y salida, así como opciones de pago flexibles y convenientes.<P>
    <P>Ya sea que necesites estacionar tu vehículo durante unas pocas horas o por períodos prolongados, puedes confiar en nosotros para brindarte un servicio excepcional y una experiencia de estacionamiento sin preocupaciones.<P>
    <P>¡Ven y descubre por qué somos la elección preferida de tantos conductores exigentes! En Radiadores Sprint, nos apasiona proporcionarte la mejor solución de estacionamiento mientras te brindamos tranquilidad y comodidad en cada visita.<P>
</section>

<script src=".\js\swiper-bundle.min.js"></script>
<script src=".\js\main.js"></script>

</body>
</html>
