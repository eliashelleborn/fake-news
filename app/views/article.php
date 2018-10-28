<?php require_once __DIR__ . "/components/header.php";?>

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
                        </div>
                        <div class="column is-3">
                            <p class="title is-6">More by author</p>
                            <hr>
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

<?php require_once __DIR__ . "/components/footer.php";?>



