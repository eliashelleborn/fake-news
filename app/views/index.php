<?php
declare (strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>


    <?php if (isset($featuredArticles[0])): ?>
    <section class="section">
        <div class="container featured">
            <div class="columns">
                <div class="column">
                    <div class="tile is-child featured__post featured__post--big">
                        <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[0]['id']?>">
                            <img src="<?=$featuredArticles[0]['banner']?>" alt="">
                        </a>
                        <div class="featured__desc">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[0]['id']?>" class="title is-3 is-size-4-mobile"><?=$featuredArticles[0]['title']?></a>
                            <a href="<?=getenv('BASE_URL') . "/authors/" . $featuredArticles[0]['authorId']?>" class="is-size-6 has-text-link"><?=$featuredArticles[0]['author']?></a>
                        </div>
                    </div>
                </div>
                <?php if (isset($featuredArticles[1], $featuredArticles[2])): ?>
                <div class="column is-4 is-hidden-mobile">

                    <div class="featured__post featured__post--small m-2">
                        <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[1]['id']?>">
                            <img src="<?=$featuredArticles[1]['banner']?>" alt="">
                        </a>
                        <div class="featured__desc">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[1]['id']?>" class="title is-6"><?=substr($featuredArticles[1]['title'], 0, 50)?><?=strlen($featuredArticles[1]['title']) > 50 ? " ..." : ""?></a>
                            <a href="<?=getenv('BASE_URL') . "/authors/" . $featuredArticles[1]['authorId']?>" class="is-size-7 has-text-link"><?=$featuredArticles[1]['author']?></a>
                        </div>
                    </div>
                    <div class="featured__post featured__post--small">
                        <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[2]['id']?>">
                            <img src="<?=$featuredArticles[2]['banner']?>" alt="">
                        </a>
                        <div class="featured__desc">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $featuredArticles[2]['id']?>" class="title is-6"><?=substr($featuredArticles[2]['title'], 0, 50)?><?=strlen($featuredArticles[2]['title']) > 50 ? " ..." : ""?></a>
                            <a href="<?=getenv('BASE_URL') . "/authors/" . $featuredArticles[2]['authorId']?>" class="is-size-7 has-text-link"><?=$featuredArticles[2]['author']?></a>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title is-2">Latest News</p>
                    <hr>
                    <?php foreach ($articles as $article): ?>
                    <?php if (!in_array($article, $featuredArticles)): ?>
                        <div class="article-preview">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                <img class="is-marginless" src="<?=$article['banner']?>" alt="">
                                <p class="is-marginless"><?=date("d M - g:i a", strtotime($article['publishDate']))?></p>
                                <p class="title is-3"><?=htmlspecialchars($article['title'])?></p>
                                <p><?=htmlspecialchars($article['preview'])?></p>
                            </a>

                            <a href="<?=getenv('BASE_URL') . "/authors/" . $article['authorId']?>" class="is-size-7 has-text-link">by <?=htmlspecialchars($article['author'])?></a>
                        </div>
                        <hr>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
                <div class="column is-4 sidebar">
                    <p style="margin-top: 18px;" class="title title is-4">Popular</p>
                    <hr>
                    <?php foreach ($popularArticles as $article): ?>
                        <div class="article-preview">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                <img src="<?=$article['banner']?>" alt="">
                                <p class="title is-5"><?=htmlspecialchars($article['title'])?></p>
                            </a>
                            <a href="<?=getenv('BASE_URL') . "/authors/" . $article['authorId']?>" class="is-size-7 has-text-link"><?=htmlspecialchars($article['author'])?></a>
                            <hr>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>



