<?php
declare (strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column article">
                    <p class="title is-2"><?=$article['title']?></p>
                    <p class="article__date">
                        <?=date("d M - g:i a", strtotime($article['publishDate']))?>
                    </p>
                    <hr>
                    <img class="article__banner" src="<?=$article['banner']?>" alt="">
                    <div class="columns">
                        <div class="column">
                            <p class="article__body"><?=$article['body']?></p>
                            <button class="like-btn">
                                <i class="far fa-heart"></i>
                                <span><?=$article['likes']?></span>
                            </button>
                        </div>
                        <div class="column is-3 sidebar">
                            <p class="title is-6">More by author</p>
                            <hr>
                            <?php foreach ($articlesByAuthor as $articleByAuthor): ?>
                            <?php if ($articleByAuthor !== $article): ?>
                                <div class="article-preview">
                                    <a href="<?=getenv('BASE_URL') . "/articles/" . $articleByAuthor['id']?>">
                                        <img src="<?=$articleByAuthor['banner']?>" alt="">
                                        <p class="title is-5"><?=$article['title']?></p>
                                    </a>
                                    <a href="<?=getenv('BASE_URL') . "/authors/" . $articleByAuthor['authorId']?>" class="is-size-7 has-text-link"><?=$article['author']?></a>
                                    <hr>
                                </div>
                            <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>

                    <hr>
                    <a href="<?=getenv('BASE_URL') . "/authors/" . $article['authorId']?>" class="author-card">
                        <img src="<?=$article['authorImg']?>" alt="">
                        <div>
                            <p class="title is-4"><?=$article['author']?></p>
                            <p class="title is-6">Writer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>



