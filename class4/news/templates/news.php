<?php function outputArticleList($articles) { ?>
  <section id="news">
    <?php foreach($articles as $article) outputArticle($article); ?>
  </section>
<?php } ?>

<?php 
    function outputArticle($article){ 
        $date = date('F j', $article['published']);
        $tags = explode(',', $article['tags']);
?>
    <article>
    <header>
      <h1><a href="article.php?id=<?=$article['id']?>"><?= $article['title']?></a></h1>
    </header>
    <img src="https://picsum.photos/600/300?<?=$article['id']?>" alt="">
    <p><?= $article['introduction']?></p>
    <p><?= $article['fulltext']?></p>
    <footer>
      <span class="author"><?= $article['username']?></span>
      <span class="tags"><a href="index.php"><?= $tags[0]?></a> <a href="index.php"><?= $tags[1]?></a></span>
      <span class="date"><?=$date?></span>
      <a class="comments" href="article.php?id=<?=$article['id']?>#comments"><?=$article['comments']?></a>
    </footer>
  </article>
<?php } ?>