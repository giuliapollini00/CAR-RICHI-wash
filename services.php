
<?php
session_start();
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
$db = mysqli_connect('localhost', 'root', '', 'sitoweb');


//LAVAGGIO SILVER
  if (isset($_POST['silver_c']))
  {

    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '15'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
      	mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }


  }

  if (isset($_POST['silver_s'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '18'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
        mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  // LAVAGGIO GOLD

  if (isset($_POST['gold_c'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '22'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
        mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  if (isset($_POST['gold_s'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '25'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
      	mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  // LAVAGGIO PLATINUM

  if (isset($_POST['platinum_c'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '35'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
        mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  if (isset($_POST['platinum_s'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '38'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
        mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  // LAVAGGIO DIAMOND

  if (isset($_POST['diamond_c'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '45'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
      	mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

  }

  if (isset($_POST['diamond_s'])) {
    if(isset($_SESSION['username']))
    {
      $u = $_SESSION['username'];
      $query1 = "SELECT * FROM utenti WHERE nome_utente='$u'";
      $results1 = mysqli_query($db, $query1);
      $pippo1 = mysqli_fetch_assoc($results1);
      $query = "SELECT lavaggio,prezzo FROM servizi WHERE prezzo = '50'";
      $results = mysqli_query($db, $query);
      $pippo = mysqli_fetch_assoc($results);

      if (!$pippo)
      {
      echo 'Could not run query: ' . mysql_error();
      exit;
      }
      else
      {
        $l= $pippo['lavaggio'];
        $p= $pippo['prezzo'];
        $e = $pippo1['email'];
        $query2 = "INSERT INTO carrello (servizio_shop, prezzo_shop, acquirente) VALUES ('$l', '$p', '$e')";
        mysqli_query($db, $query2);
      }
    }
    else
    {
      header("location: login.php");
    }

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


  <div class="services">
    <div class="wrapper">
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
    </div>
    <div class="carousel-title big-text reveal mt-sma-0">SERVIZI LAVAGGIO</div>

    <div class="grid1 mt-2 ">
      <div class="lav zoom">
        <h4 class="big-text text_b ">LAVAGGIO SILVER</h4>
        <div class="lav__img">
          <img src="lavaggio1.jpeg" alt="" >
        </div>

        <div class="grid">
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO ESTERNO</h4>
            <p class="text_b">Rimozione adesivi <br>Lavaggio <br>Asciugatura <br>Battute portiere</p>
          </div>
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO INTERNO</h4>
            <p class="text_b">Aspirazione <br>Vetri <br>Spolveratura plastiche</p>
          </div>
        </div>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">CITY/BERLINA</h4>
        <p class="text_b">15€</p>
        <form method="post">
          <button  class="button_add_cart_img" name= "silver_c"><img src="add_to_cart.png" alt="" ></button>
        </form>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">SUV/FUORI-STRADA</h4>
        <p class="text_b">18€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "silver_s"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
    </div>
    <div class="wrapper">
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
    </div>
    <hr class="line-s1">

    <div class="grid1 ">
      <div class="lav zoom">
        <h4 class="big-text text_b ">LAVAGGIO GOLD</h4>
        <div class="lav__img">
          <img src="lavaggio2.jpeg" alt="" >
        </div>

        <div class="grid">
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO ESTERNO</h4>
            <p class="text_b">LAVAGGIO SILVER più <br>Cerchi e pneumatici <br>Arcate ruote <br>Rimozione moscerini</p>
          </div>
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO INTERNO</h4>
            <p class="text_b">LAVAGGIO SILVER più <br>Pulizia pelle volante <br>Soffiaggio <br>Pulizia tappetini</p>
          </div>
        </div>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">CITY/BERLINA</h4>
        <p class="text_b">22€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "gold_c"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">SUV/FUORI-STRADA</h4>
        <p class="text_b">25€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "gold_s"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
    </div>
    <div class="wrapper">
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
    </div>
    <hr class="line-s1">

    <div class="grid1">
      <div class="lav zoom">
        <h4 class="big-text text_b ">LAVAGGIO PLATINUM</h4>
        <div class="lav__img">
          <img src="lavaggio3.jpeg" alt="" >
        </div>

        <div class="grid">
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO ESTERNO</h4>
            <p class="text_b">LAVAGGIO GOLD più <br>Pre lavaggio ph acido per rimozione calcare <br>Shampo idro-repellente con guanto <br>Cera protettiva <br>Pulizia scarichi</p>
          </div>
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO INTERNO</h4>
            <p class="text_b">LAVAGGIO GOLD più <br>Aggiunta di protettivo sulle plastiche <br>Smacchiatura tessuti <br>Sanificazione bocchette areazione con vapore</p>
          </div>
        </div>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">CITY/BERLINA</h4>
        <p class="text_b">35€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "platinum_c"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">SUV/FUORI-STRADA</h4>
        <p class="text_b">38€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "platinum_s"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
    </div>
    <div class="wrapper">
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
      <div><span class="dot"></span></div>
    </div>
    <hr class="line-s1">

    <div class="grid1">
      <div class="lav zoom">
        <h4 class="big-text text_b ">LAVAGGIO DIAMOND</h4>
        <div class="lav__img">
          <img src="lavaggio4.jpg" alt="" >
        </div>

        <div class="grid">
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO ESTERNO</h4>
            <p class="text_b">prelavaggio e lavaggio con guanto
             con shampoo idrorepellente <br>arcate ruote <br>cerchi e
            pneumatici <br>decontaminazione ferrosa chimica <br>  asciugatura battute portiere<br> cera protettiva tre
            mesi<br>prodotto per protezione plastiche esterne <br> nero gomme
            durata minima 4 giorni<br>  pulizia scarichi cromati<br>
            pulizia motore e protettivo plastiche</p>
          </div>
          <div class="col">
            <h4 class="text_b mt-1">LAVAGGIO INTERNO</h4>
            <p class="text_b">aspirazione approfondita<br>  vetri e
            specchi<br>  plastiche e protettivo<br>  sanificazione
            bocchette aria<br>  pulizia pelle volante e dettagli<br>
            soffiaggio e pulizia tappetini<br>  smacchiatura tessuti<br>
            pulizia approfondita bagagliaio</p>
          </div>
        </div>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">CITY/BERLINA</h4>
        <p class="text_b">45€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "diamond_c"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
      <div class="lav1 zoom">
        <h4 class="normal-text text_b mt-1 ">SUV/FUORI-STRADA</h4>
        <p class="text_b">50€</p>
        <form method="post" >
          <button type="submit" class="button_add_cart_img" name= "diamond_s"><img src="add_to_cart.png" alt=""></button>
        </form>
      </div>
    </div>

  </div>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


  <footer class="footer">
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

  //ScrollReveal().reveal('.reveal', {distance:'100px', duration:1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 600});
  //ScrollReveal().reveal('.zoom', {duration:1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200,scale: 0.65});


</script>



</body>
</html>
