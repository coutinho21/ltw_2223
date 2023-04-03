<?php
  require_once('database/connection.php');
  require_once('database/users.php');
  session_start();
  $username = $_POST['username'];
  $password = SHA1($_POST['password']);

  if (userExists($username, $password))  // test if user exists
    $_SESSION['username'] = $username;            // store the username

  header('Location: ' . $_SERVER['HTTP_REFERER']);         // redirect to the page we came from
?>