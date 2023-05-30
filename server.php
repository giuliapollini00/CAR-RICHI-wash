<?php
session_start();

// initializing variables
$username = "";
$username_error=null;
$password_error=null;
$email_error=null;
$general_error=null;
$email    = "";
$i = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'sitoweb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (empty(trim($username)) && empty(trim($email)) && empty(trim($password_1)))
  {
    array_push($errors, "1");
    $general_error = "Casella Username, Password, Email vuota";
  }
  else{
    if (empty(trim($username)))
    {
      array_push($errors, "Username mancante");
      $username_error = "Casella Username vuota";
    }
    if (empty(trim($email)))
    {
        array_push($errors, "Email mancante");
        $email_error = "Casella Email vuota";
    }
    if(empty(trim($password_1)))
    {
          array_push($errors, "Password mancante");
          $password_error = "Casella Password vuota";
    }
  }






  if ($password_1 != $password_2) {
  array_push($errors, "2");
  $password_error = "Le password non corrispondono";
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM utenti WHERE nome_utente='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 1) { // if user exists
    if ($user['nome_utente'] === $username) {
      array_push($errors, "3");
      $username_error = "Il nome utente è già in uso";
    }

    if ($user['email'] === $email) {
      array_push($errors, "4");
      $email_error = "L'email è già in uso";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO utenti (nome_utente, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
    header('location: login.php');

  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

if (empty(trim($username)) && empty(trim($password))){
  array_push($errors, "Username mancante Password mancante");
  $general_error = "Casella Username, Password vuota";
}else{
  if (empty(trim($username))){
    array_push($errors, "Username mancante");
    $username_error = "Casella Username vuota";
  }else{
    if (empty(trim($password))){
      array_push($errors, "Password mancante");
      $password_error = "Casella Password vuota";
    }
  }

}



  if (count($errors) == 0) {
  	$password = ($password);
  	$query = "SELECT * FROM utenti WHERE nome_utente='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;

      if($username==="Admin")
      {
        header('location: admin.php');
      }
      else
      {
        header('location: index.php');
      }
    }


  	else {

      $general_error = "Username o Password errati";
  	}




  }
}



?>
