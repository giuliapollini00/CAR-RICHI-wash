<?php
  session_start();


  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }



?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&display=swap" rel="stylesheet">


</head>
<body>

  <div class="header">
  <div class="logo">
    <img src="Logo.png" alt="" height="62.2" width="96.9">
  </div>
  <ul class="menu">
    <li><a href="index.php" >HOME</a></li>
    <li><a href="about_us.php" >CHI SIAMO</a></li>
    <li><a href="services.php" >SERVIZI</a></li>
    <li><a href="contact.php" >CONTATTACI</a></li>
    <div class="cta1">
    <?php
        if (isset($_SESSION['username']))
        {
          ?>
      <a href="shop.php" class="button1">
        <div class="button_img1">
          <img src="icon_bag1.png" alt="">
        </div>
      </a>
      <?php
    }

    elseif(empty($_SESSION['username']))
    {
      ?>
      <a href="login.php" class="button1">
        <div class="button_img1">
          <img src="icon_bag1.png" alt="">
        </div>
      </a>
      <?php
    }

   ?>
     </div>
    <div class="cta1">
      <?php
        if (isset($_SESSION['username']))
        {
          ?>
          <a href="profile.php" class="button1">
            <div class="button_img1">
              <img src="icon_profile1.png" alt="">
            </div>
          </a>
          <?php
        }
        elseif(empty($_SESSION['username']))
        {
          ?>
          <a href="login.php" class="button1">
            <div class="button_img1">
              <img src="icon_profile1.png" alt="">
            </div>
          </a>
          <?php
        }

       ?>
    </div>
    <div class="cta1">
      <?php  if (isset($_SESSION['username'])) : ?>
        <p class="mt-1 med-text" ><a href="index.php?logout='1'" style="color: red; ">LOGOUT</a> </p>
      <?php endif ?>
    </div>
  </ul>
  <div class="cta">
    <?php
        if (isset($_SESSION['username']))
        {
          ?>
      <a href="shop.php" class="button">
        <div class="button_img">
          <img src="icon_bag.png" alt="">
        </div>
      </a>
      <?php
    }

    elseif(empty($_SESSION['username']))
    {
      ?>
      <a href="login.php" class="button">
        <div class="button_img">
          <img src="icon_bag.png" alt="">
        </div>
      </a>
      <?php
    }

   ?>
  </div>


  <div class="cta">
    <?php
      if (isset($_SESSION['username']))
      {
        ?>
        <a href="profile.php" class="button">
          <div class="button_img">
            <img src="icon_profile.png" alt="">
          </div>
        </a>
        <?php
      }
      elseif(empty($_SESSION['username']))
      {
        ?>
        <a href="login.php" class="button">
          <div class="button_img">
            <img src="icon_profile.png" alt="">
          </div>
        </a>
        <?php
      }

     ?>
  </div>
  <div class="cta">
    <?php  if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong><br> </p>
    <?php endif ?>
  </div>
  <div class="cta">
    <?php  if (isset($_SESSION['username'])) : ?>
      <p ><a href="index.php?logout='1'" style="color: red; ">LOGOUT</a> </p>
    <?php endif ?>
  </div>


    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <div class="hero">
    <!-- '__' convenzione per un elemento dentro il blocco -->
    <div class="hero__content reveal">
      <p class="med-text text_w">Lavaggio & Detailing</p>
      <h1 class="big-text" >CAR-RICHI WASH</h1>
    </div>
  <video autoplay muted loop id="video_intro">
    <source src="video_intro.mp4" type="video/mp4">
  </video>
  </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <div class="poster mt-3 mt-sma-1">
    <div class="poster__img reveal">
      <img src="richi1.jpg" alt="">
    </div>
    <div class="poster__content reveal">
      <h3 class="big-text text_b">Perchè fidarsi di me</h3>
      <h4 class="normal-text text_b ">Prodotti di alta qualità</h4>
      <p class="text_b ">Dai prodotti chimici per la pulizia, agli shampoo per tappezzeria, alla cera, non lesino sulla qualità. Voglio che tu ti senta sicuro dei prodotti che utilizzo sul tuo veicolo. </p>

      <h4 class="normal-text text_b ">Risultato professionale</h4>
      <p class="text_b ">Mi impegno a fornire un'esperienza senza stress sia ai clienti nuovi che a quelli abituali. Garantisco che la tua auto sembrerà fresca quando la ritirerai.</p>

      <h4 class="normal-text text_b ">Non solo lavoro ma vera passione</h4>
      <p class="text_b ">Da sempre amante della cura e della pulizia ma sopratutto delle auto. Il risultato è importante tanto per voi quanto per me!</p>
    </div>
  </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <div class="carousel phone">
    <div class="carousel-title big-text mt-2 reveal mt-sma-0">Galleria Fotografica</div>
    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="fiat1.jpg">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="bmw_y.png">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="ford_st.png">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="jeep.png">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="jeep_interior.png">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="bmw_interior.png">
        </div>
      </div>
      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="audi1.png">
        </div>
      </div>

      <div class="carousel-cell">
        <div class="carousel-cell__content zoom">
          <img src="audi_w.png">
        </div>
      </div>
    </div>
  </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <div class="carousel computer">
    <div class="carousel-title big-text mt-2 reveal mt-sma-0">Galleria Fotografica</div>
    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
      <div class="carousel-section">
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="fiat1.jpg">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="bmw_y.png">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="ford_st.png">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="jeep.png">
          </div>
        </div>
      </div>
      <div class="carousel-section">
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="jeep_interior.png">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="bmw_interior.png">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="audi1.png">
          </div>
        </div>
        <div class="carousel-cell">
          <div class="carousel-cell__content zoom">
            <img src="audi_w.png">
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <footer class="footer mt-1">
    <div class="grid">
      <div class="col">
          <img src="Logo.png" alt="" height="95" width="135">
      </div>
      <div class="col">
        <h4 class="med-text text_w ">CAR-RICHI <br> wash</h4>
      </div>
      <div class="col">
        <p class="text_w">Lavaggista a domicilio <br>Pulizia vano motore <br>Lucidatura <br>Protezione e pulizia pelle <br>Lavaggio tappezzeria a vapore</p>
      </div>
      <div class="col">
        <p class="text_w">P.IVA 04005300043<br>E-mail zuccarino.riccardo@gmail.com <br>Telefono (+39)3420517900 </p>
      </div>
    </div>
    <hr class="line-s">
    <div class="grid">
      <p class="text_w"> © Copyright 2023 CAR RICHI wash. All rights reserved.</p>
    </div>
  </footer>





<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  /*esegue richiesta al termine del caricamento della pagina;*/
  $( document ).ready(function() {
    /* Open Panel */
    $( ".hamburger" ).on('click', function() {
      /* '--' convenzione per un modifier: classe menu--open va a modificare qualcosa della classe css menu*/
      $(".menu").toggleClass("menu--open");
    });


  });

  ScrollReveal().reveal('.reveal', {distance:'100px', duration:1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 600});
  ScrollReveal().reveal('.zoom', {duration:1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200,scale: 0.65});

</script>



</body>
</html>
