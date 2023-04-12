<?php
    require_once('connection.php');

    function userExists($username, $password){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $stmt->execute(array($username, $password));
        return $stmt->fetch() !== false;
    }
?>