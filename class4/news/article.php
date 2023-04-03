<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('templates/common.php');
    $db = getDatabaseConnection();
    $articles = getAllNews($db);

    outputHeader();
?>
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
      <?php if(isset($_SESSION['username'])){ ?> 
      <a href="edit_article.php?id=<?=$id?>">Edit this article</a> 
      <?php } ?>
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
<?php
    outputFooter();
?>