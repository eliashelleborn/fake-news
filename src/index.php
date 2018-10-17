<?php require_once __DIR__ . '/components/header.php' ?>

<?php
require_once __DIR__ . '/functions.php';
$pdo = connectToDB();
?>

<h1>Fake News</h1>

<div>
  <?php 
  $articles = getNewsFeed($pdo);
  ?>
  <?php foreach ($articles as $article) : ?>
    <div>
      <h2><?= $article['title'] ?></h2>
      <p><?= $article['body'] ?></p>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/components/footer.php' ?>

