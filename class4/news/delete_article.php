<?php 
    session_start();
    if(!isset($_SESSION['username']))
        header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>  
    <title>Super Legit News</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Are you sure you want to delete this article?</h1>
    <form action="action_delete_article.php" method="post">
        <input type="submit" name="yes" value="yes"/>
        <input type="submit" name="no" value="no"/>
        <input type="hidden" name="id" value="<?=$_GET['id']?>"/>
    </form>
</body>
</html>