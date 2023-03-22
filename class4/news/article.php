<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    $db = getDatabaseConnection();
    $articles = getAllNews($db);

    foreach ($articles as $article) {
        $date = date('F j', $article['published']);
        $tags = explode(',', $article['tags']);
        echo '<h1> News number ' . $article['id'] . '</h1>';
        echo '<h1>' . $article['title'] . '</h1>';
        echo '<h3> By ' . $article['username'] . ' on ' . $date . '</h3>';
        echo '<p>' . $article['introduction'] . '</p>';
        echo '<p>' . $article['fulltext'] . '</p>';
        echo "<h4>Number of comments</h4>" . $article['comments'];
    }

    echo "<br/> <br/>";
    echo "<a href='index.php'>Back to Homepage</a>"
?>