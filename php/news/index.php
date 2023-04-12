<?php
  require_once('database/connection.php');
  require_once('database/news.php');

  require_once('templates/common.php');
  require_once('templates/news.php');
  
  $db = getDatabaseConnection();
  $articles = getAllNews($db);

  outputHeader();
  outputArticleList($articles);
  outputFooter(); 
?>