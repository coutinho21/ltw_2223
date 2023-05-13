<?php

  $db = new PDO('sqlite:database.db');

  $stmt = $db->prepare('INSERT INTO posts VALUES(NULL, ?, ?)');
  $stmt->execute(array(htmlentities($_POST['username']), htmlentities($_POST['text'])));

  header('Location: /');
?>