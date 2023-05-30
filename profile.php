<?php   include('modify.php') ?>
<?php



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

  <!-- Profile -->

  <?php
      $db = mysqli_connect("localhost","root","","sitoweb");
      $u = $_SESSION['username'];
      $query = "SELECT nome_utente,password,email FROM utenti WHERE nome_utente='$u'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      $u= $pippo['nome_utente'];
      $p= $pippo['password'];
      $e = $pippo['email'];
     ?>

  <div class="margin-top-cart"></div>
  <div class="Profile">
    <h4 class="title_text_profile text_b mt-1">Profilo Personale</h4>
    <div class="profile">
      <div class="grid">
        <div class="col ">
          <table>
            <tr>
             <td class="normal-text"><u>Nome Utente</u></td>
             <td><?= $u; ?></td>
            </tr>
            <tr>
             <td class="normal-text"><u>Email</u></td>
             <td><?= $e; ?></td>
            </tr>
            <tr>
             <td class="normal-text"><u>Password</u></td>
             <td><?= $p; ?></td>
            </tr>
          </table>
        </div>
        <div class="col mt-sma-3 ">
          <form method="post" id="CambioPw">

            <input type="text" placeholder="Password Vecchia" name="pw_vecchia">
            <p class="error password-error"><?php echo $password_error ?></p>
            <input type="password" placeholder="Password Nuova" name="password_1">
            <p class="error password-error"><?php echo $password1_error ?></p>
            <input type="password" placeholder="Conferma Nuova Password" name="password_2">
            <p class="error password-error"><?php echo $password2_error ?></p>
            <button type="submit" class="btn small-text text_w" name="cambio_password">Modifica</button>
            <p class="success"><?php echo $success ?></p>


          </form>

        </div>
      </div>




    </div>

    <?php


    ?>

    <hr class="line-s1">
  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <?php

      $query1 = "SELECT * FROM pacchetti_acquistati WHERE email_acquirente='$e'";
      $resultsa = mysqli_query($db, $query1);


     ?>

    <h4 class="title_text_profile text_b mt-1 ">Pacchetti lavaggio acquistati</h4>


    <div class="acquisti">

      <table>
        <tr>
          <th>Id</th>
          <th>Prodotti</th>
          <th>Prezzo</th>
        </tr>
        <tbody>
           <?php


               if(mysqli_num_rows($resultsa) > 0)
               {
                   foreach($resultsa as $row)
                   {
                       ?>
                       <tr>
                           <td><?= $row['id']; ?></td>
                           <td><?= $row['servizio_acquistato']; ?></td>
                           <td><?= $row['prezzo']; ?>€</td>

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
