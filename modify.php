<?php
session_start();

// initializing variables
$password_error=null;
$password1_error=null;
$password2_error=null;
$general_error=null;
$general1_error=null;
$success = null;
$success1 = null;
$pw_vecchia = "";
$password_1 = "";
$password_2 = "";
$username=$_SESSION['username'];
$email = "";
$name = "";
$surname = "";
$ncarta = "";
$scadenza = "";
$cvc = "";


// Cambio Password
$db = mysqli_connect("localhost","root","","sitoweb");
$errors = array();
if (isset($_POST['cambio_password'])) {
  // receive all input values from the form
  $pw_vecchia = mysqli_real_escape_string($db, $_POST['pw_vecchia']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty(trim($pw_vecchia)))
  {
    array_push($errors, "Password mancante");
    $password_error = "Casella Password vuota";
  }
  if (empty(trim($password_1)))
  {
    array_push($errors, "Password mancante");
    $password1_error = "Casella Password vuota";
  }
  if(empty(trim($password_2)))
  {
    array_push($errors, "Password mancante");
    $password2_error = "Casella Password vuota";
  }
  else
  {
    $user_check_query = "SELECT password FROM utenti WHERE nome_utente='$username'";
    $result = mysqli_query($db, $user_check_query);
    $pw = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1)
    {
        if ($pw['password'] !== $pw_vecchia)
        {
          array_push($errors, "Password errata");
          $password_error = "La vecchia password non corrisponde";
        }
        else{
          if($password_1 !== $password_2)
          {
            array_push($errors, "Password errate");
            $password2_error = "Le password nuove non corrispondono";
          }
          else {
            if($pw['password'] === $password_1)
            {
              array_push($errors, "Password errata");
              $password2_error = "La password è uguale a quella precedente";
            }
          }
        }
      }

  }




if (count($errors) == 0) {
    $query = "UPDATE utenti SET password = '$password_1'
         WHERE nome_utente='$username'";
    mysqli_query($db, $query);

    $success = "Password modificata con successo";
  }



}

//Salva Carta Credito

if (isset($_POST['reg_carta'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $ncarta = mysqli_real_escape_string($db, $_POST['carta_credito']);
  $scadenza = mysqli_real_escape_string($db, $_POST['scadenza_carta']);
  $cvc = mysqli_real_escape_string($db, $_POST['cvc']);


  if (empty(trim($email)) || empty(trim($name)) || empty(trim($surname)) || empty(trim($ncarta)) || empty(trim($scadenza)) || empty(trim($cvc)))
  {
    array_push($errors, "1");
    $general_error = "Tutti i campi devono essere riempiti";
  }
  else
    {
      $user_check_query = "SELECT * FROM utenti WHERE email='$email'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if (mysqli_num_rows($result) == 0)
      {
        array_push($errors, "1");
        $general_error = "email sbagliata";



      }else{
        $user_check_query1 = "SELECT * FROM credit_card WHERE email='$email'";
        $result1 = mysqli_query($db, $user_check_query1);
        $user1 = mysqli_fetch_assoc($result1);
        if (mysqli_num_rows($result1) == 1)
        {
          array_push($errors, "2");
          $general_error = "Hai già una carta registrata a tuo nome";

        }
      }
    }

    if (count($errors) == 0)
    {
      $saldo = rand(0,100000);
      $query = "INSERT INTO credit_card (email, nome, cognome, ncarta,scadenza,cvc,saldo)
            VALUES('$email', '$name', '$surname', '$ncarta', '$scadenza', '$cvc','$saldo')";
      mysqli_query($db, $query);
      $success = "Carta di credito registrata correttamente";
    }


}

//Pagamento

if (isset($_POST['paga'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $ncarta = mysqli_real_escape_string($db, $_POST['carta_credito']);
  $scadenza = mysqli_real_escape_string($db, $_POST['scadenza_carta']);
  $cvc = mysqli_real_escape_string($db, $_POST['cvc']);


  if (empty(trim($email)) || empty(trim($ncarta)) || empty(trim($scadenza)) || empty(trim($cvc)))
  {
    array_push($errors, "1");
    $general1_error = "Tutti i campi devono essere riempiti";
  }
  else
    {
      $user_check_query = "SELECT * FROM credit_card WHERE email='$email'";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if (mysqli_num_rows($result) == 1)
      {
        $user_check_query1 = "SELECT * FROM credit_card WHERE ncarta='$ncarta' AND scadenza='$scadenza' AND cvc='$cvc' ";
        $result1 = mysqli_query($db, $user_check_query1);
        $user1 = mysqli_fetch_assoc($result1);
        if (mysqli_num_rows($result1) == 0)
        {
          array_push($errors, "2");
          $general1_error = "La carta non corrisponde";

        }

      }
    }

    if (count($errors) == 0)
    {
      $user_check_query2 = "SELECT * FROM credit_card WHERE ncarta='$ncarta'";
      $result2 = mysqli_query($db, $user_check_query2);
      $user2 = mysqli_fetch_assoc($result2);
      $saldo_corrente=$user2['saldo'];
      $query = "SELECT SUM(prezzo_shop) AS sum FROM carrello WHERE acquirente = '$email'";
      $query_run = mysqli_query($db, $query);
      while($row = mysqli_fetch_assoc($query_run)){
        $da_pagare = $row['sum'];
      }
      $saldo = $saldo_corrente-$da_pagare;
      $query = "UPDATE credit_card SET saldo='$saldo' WHERE ncarta='$ncarta'";
      mysqli_query($db, $query);

      $user_check_query1 = "SELECT * FROM carrello WHERE acquirente = '$email'";
      $result1 = mysqli_query($db, $user_check_query1);
      $user1 = mysqli_fetch_assoc($result1);
      if(mysqli_num_rows($result1)>0){
        foreach($result1 as $row) {
          $id = $row['id'];
          $servizio_a = $row['servizio_shop'];
          $p = $row['prezzo_shop'];

          $query1 = "INSERT INTO pacchetti_acquistati (id, servizio_acquistato, prezzo, email_acquirente)
                VALUES('$id', '$servizio_a', '$p', '$email')";
          mysqli_query($db, $query1);
        }
      }


      $q="DELETE FROM carrello WHERE acquirente = '$email'";
      mysqli_query($db, $q);

      $success1 = "Pagamento avvenuto con successo";
    }


}

if (isset($_POST['go_to_pay'])) {
  header('location: pay.php');
}



?>
