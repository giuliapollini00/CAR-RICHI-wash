<?php
  session_start();

  $con = mysqli_connect("localhost","root","","sitoweb");
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

  if(isset($_GET['id'])){
    $id= $_GET['id'];
    $query = "DELETE FROM pacchetti_acquistati WHERE id='$id'";
    mysqli_query($con, $query);

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
  <h4 class="title_text_profile text_b mt-1 ">Pacchetti lavaggio acquistati</h4>


  <div class="acquisti">

    <table>
      <tr>
        <th class="small-text_phone">Id</th>
        <th class="small-text_phone">Prodotti</th>
        <th class="small-text_phone">Acquirente</th>
        <th class="small-text_phone">Prezzo</th>
        <th class="small-text_phone">-</th>
      </tr>
      <tbody>
         <?php


             if(mysqli_num_rows($resultsa) > 0)
             {
                 foreach($resultsa as $row)
                 {
                     ?>
                     <tr>
                         <td class="small-text_phone"><?= $row['id']; ?></td>
                         <td class="small-text_phone"><?= $row['servizio_acquistato']; ?></td>
                         <td class="small-text_phone"><?= $row['email_acquirente']; ?></td>
                         <td class="small-text_phone"><?= $row['prezzo']; ?>€</td>
                         <td class="small-text"><a href="admin.php?id= <?= $row['id'];?>" class="btn_delate_a">Rimuovi</a></td>

                     </tr>
                     <?php
                 }
             }
             else
             {
                 ?>
                     <tr>
                         <td colspan="4">No Record Found</td>
                     </tr>
                 <?php
             }
         ?>

      </tbody>
    </table>
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
