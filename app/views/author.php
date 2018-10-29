<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title is-2">Articles</p>
                    <hr>
                    <?php foreach ($articles as $article): ?>
                        <div class="article-preview">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                <img src="<?=$article['banner']?>" alt="">
                                <p class="title is-3"><?=$article['title']?></p>
                                <p><?=$article['preview']?></p>
                            </a>
                        </div>
                        <hr>
                    <?php endforeach;?>
                </div>
                <div class="column is-4">
                    <p class="title is-2">Author</p>
                    <hr>
                    <div class="author-card author-card--vertical">
                        <img src="<?=$user['image']?>" alt="">
                        <div>
                            <p class="title is-4"><?=$user['name']?></p>
                            <p class="title is-6">Writer</p>
                            <hr>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam luctus risus sit amet euismod tempor. Fusce egestas fringilla velit. Nunc in congue tortor. Vestibulum ac consequat magna. Vivamus a odio blandit quam ornare lacinia vitae eu nunc. Vestibulum tempor libero ut lectus egestas elementum. Etiam mattis, tortor et dapibus finibus, tellus ipsum ornare nunc, ac commodo velit metus vitae turpis. Aenean congue cursus tortor nec blandit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>



