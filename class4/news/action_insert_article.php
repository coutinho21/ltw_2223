<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }

    require_once('database/connection.php');
    require_once('database/news.php');

    $db = getDatabaseConnection();
    $title = $_POST['title'];
    $tags = $_POST['tags'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];
    $username = $_SESSION['username'];
    $date = time();
    $id = insertArticle($db, $title, $introduction, $fulltext, $username, $tags, $date);
    header('Location: article.php?id='.$id);
?>