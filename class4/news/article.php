<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    $db = getDatabaseConnection();
    $articles = getAllNews($db);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Super Legit News</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/layout.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/comments.css" rel="stylesheet">
  <link href="css/forms.css" rel="stylesheet">
</head>

<body>
  <header>
    <h1><a href="index.php">Super Legit News</a></h1>
    <h2><a href="index.php">Where fake news are born!</a></h2>
    <div id="signup">
      <a href="register.html">Register</a>
      <a href="login.html">Login</a>
    </div>
  </header>
  <nav id="menu">
    <!-- just for the hamburguer menu in responsive layout -->
    <input type="checkbox" id="hamburger">
    <label class="hamburger" for="hamburger"></label>

    <ul>
      <li><a href="index.php">Local</a></li>
      <li><a href="index.php">World</a></li>
      <li><a href="index.php">Politics</a></li>
      <li><a href="index.php">Sports</a></li>
      <li><a href="index.php">Science</a></li>
      <li><a href="index.php">Weather</a></li>
    </ul>
  </nav>
  <aside id="related">
    <article>
      <h1><a href="#">Duis arcu purus</a></h1>
      <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
    </article>
    <article>
      <h1><a href="#">Sed efficitur interdum</a></h1>
      <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
    </article>
    <article>
      <h1><a href="#">Vestibulum congue blandit</a></h1>
      <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
    </article>
  </aside>
  <section id="news">
    <article>
      <?php
      $id = $_GET['id'];
      for($i = 0; $i < count($articles); $i++) {
        if($articles[$i]['id'] == $id) {
          $article = $articles[$i];
          break;
        }
      }
      $date = date('F j', $article['published']);
      $tags = explode(',', $article['tags']);
      ?>
      <header>
        <h1><a href="article.php?id=<?= $id ?>"><?= $article['title'] ?></a></h1>
      </header>
      <img src="https://picsum.photos/600/300?<?= $id ?>" alt="">
      <p><?= $article['introduction'] ?></p>
      <p><?= $article['fulltext'] ?></p>
      <section id="comments">
        <h1><?= $article['comments'] ?> Comments</h1>
        <?php
          $comments = getComments($db, $id);
          foreach ($comments as $comment) {
            $commentDate = date('F j', $article['published']);
        ?>
          <article class="comment">
            <span class="user"><?= $comment['username'] ?></span>
            <span class="date"><?=$commentDate?></span>
            <p><?= $comment['text'] ?></p>
          </article>
        <?php } ?>
        <form>
          <h2>Add your voice...</h2>
          <label>Username
            <input type="text" name="username">
          </label>
          <label>E-mail
            <input type="email" name="email">
          </label>
          <label>Comment
            <textarea name="comment"></textarea>
          </label>
          <button formaction="#" formmethod="post">Reply</button>
        </form>
      </section>
      <footer>
        <span class="author"><?= $article['username'] ?></span>
        <span class="tags"><a href="index.php"><?= $tags[0] ?></a> <a href="index.php"><?= $tags[1] ?></a></span>
        <span class="date"><?= $date ?></span>
        <a class="comments" href="article.php?id=<?= $id ?>#comments"><?= $article['comments'] ?></a>
      </footer>
    </article>
  </section>
  <footer>
    <p>&copy; Fake News, 2022</p>
  </footer>
</body>

</html>