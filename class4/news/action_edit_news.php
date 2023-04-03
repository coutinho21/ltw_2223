<?php
    session_start();
    if(!isset($_SESSION['username']))
        header('Location: index.php');
    require_once('database/connection.php');
    require_once('database/news.php');
    $db = getDatabaseConnection();
    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];
    editArticle($db, $id, $title, $introduction, $fulltext);
    header('Location: article.php?id='.$id);
?>