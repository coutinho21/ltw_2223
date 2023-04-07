<?php
    session_start();

    if(!isset($_SESSION['username']))
        header('Location: index.php');

    require_once('database/connection.php');
    require_once('database/news.php');

    $db = getDatabaseConnection();
    $id = $_POST['id'];

    if(isset($_POST['yes'])){
        deleteArticle($db, $id);
        header('Location: index.php');
    }
    else if(isset($_POST['no'])){
        header('Location: article.php?id='.$id);
    }
?>