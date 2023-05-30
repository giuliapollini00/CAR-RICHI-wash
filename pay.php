<?php include('modify.php')?>
<?php


  $con = mysqli_connect("localhost","root","","sitoweb");
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
    <div class="cta1">
      <?php  if (isset($_SESSION['username'])) : ?>
        <p class="med-text" ><a href="index.php?logout='1'" style="color: red; ">LOGOUT</a> </p>
      <?php endif ?>
    </div>
  </ul>

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

  <!-- Admin -->

  <?php
    $db = mysqli_connect("localhost","root","","sitoweb");
    $query1 = "SELECT * FROM pacchetti_acquistati ";
    $resultsa = mysqli_query($db, $query1);


   ?>
  <div class="margin-top-cart"></div>



  <div class="pagamento">
  <div class="grid">
    <div class="col">
      <h4 class="text_darkb"><u>Hai giá una carta registrata? Paga qui</u></h4>
      <form method="post" id="PagForm">
        <input type="email" placeholder="Email" name="email" value="">



        <input type="text" placeholder="Numero Carta Credito" name="carta_credito">

        <input type="text" placeholder="Scadenza Carta" name="scadenza_carta">

        <input type="text" placeholder="CVC" name="cvc">
        <p class="error general-error"><?php echo $general1_error ?></p>

        <div class="bot_reg_log mt-1">
          <button type="submit" class="btn btn small-text text_w " name="paga">Paga</button>
        </div>
        <p class="success"><?php echo $success1 ?></p>
      </form>
    </div>

    <div class="col">
      <h4 class="text_darkb"><u>Non hai ancora una carta registrata? Registrala ora e poi paga!</u></h4>
      <form method="post" id="SalvaForm">
        <input type="email" placeholder="Email" name="email" value="">

        <input type="text" placeholder="Nome" name="name" value="">

        <input type="text" placeholder="Cognome" name="surname">

        <input type="text" placeholder="Numero Carta Credito" name="carta_credito">

        <input type="text" placeholder="Scadenza Carta" name="scadenza_carta">
        <input type="text" placeholder="CVC" name="cvc">
        <p class="error general-error"><?php echo $general_error ?></p>
        <div class="bot_reg_log mt-1">
          <button type="submit" class="btn btn small-text text_w " name="reg_carta">Salva</button>
        </div>
        <p class="success"><?php echo $success ?></p>

      </form>

    </div>

  </div>

  <a class="a small-text"  href="shop.php">Non sei convinto? Ritorna al carrello</a>

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
