<?php
  session_start();

  $db = new PDO('sqlite:database.db');

  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $db->prepare("SELECT * FROM users WHERE username = '?'");
  $stmt->execute(array($username));

  $user = $stmt->fetch();


  if ($user && password_verify($password, $user['password'])) $_SESSION['username'] = $user['username'];

  header('Location: /');
?>