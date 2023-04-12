<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }
    
    require_once('database/connection.php');
    require_once('database/news.php');

    $db = getDatabaseConnection();
    $id = $_POST['id'];
    $username = $_POST['username'];
    $date = time();
    $comment = $_POST['comment'];

    if($username != $_SESSION['username']){
        header('Location: index.php');
        exit();
    }

    insertComment($db, $id, $username, $date, $comment);
    header('Location: article.php?id='.$id);
?>