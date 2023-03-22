<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>News</title>
  </head>
  <body>
    <?php
    require_once('database/connection.php');
    require_once('database/news.php');
    $db = getDatabaseConnection();
    ?>
    <a href="article.php">View all news</a>
  </body>
</html>