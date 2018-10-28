<?php require_once __DIR__ . "/components/header.php";?>

    <section class="section">
        <div class="container featured">
            <div class="columns">
                <div class="column">
                    <div class="tile is-child featured__post featured__post--big">
                        <a href="">
                            <img src="https://cdn.vox-cdn.com/thumbor/nuM8WPbuNKrEdXEgewzfP3kxQOQ=/0x0:2040x1147/1512x851/filters:focal(857x411:1183x737):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/61888685/vsavov_mate20pro22.0.jpg" alt="">
                        </a>
                        <div class="featured__desc">
                            <a class="title is-3 is-size-4-mobile">Huawei Mate 20 Pro review</a>
                            <a class="is-size-6 has-text-link">John Doe</a>
                        </div>
                    </div>
                </div>
                <div class="column is-4 is-hidden-mobile">
                    <div class="featured__post featured__post--small m-2">
                        <a href="">
                            <img src="https://cdn.vox-cdn.com/thumbor/qXfp65-pZaSuigijgPDGGjEJrfs=/0x0:6264x4079/1820x1213/filters:focal(2631x1539:3633x2541):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/61897865/Parrot_ANAFI_Extended_Lifestyle_02_PackContent.0.jpg" alt="">
                        </a>
                        <div class="featured__desc">
                            <a class="title is-6"><?=substr("Parrot releases useful new photo modes for its Anafi drone", 0, 50)?><?=strlen("Parrot releases useful new photo modes for its Anafi drone") > 50 ? " ..." : ""?></a>
                            <a class="is-size-7 has-text-link">John Doe, Jane Doe</a>
                        </div>
                    </div>
                    <div class="featured__post featured__post--small">
                        <a href="">
                            <img src="https://cdn.vox-cdn.com/thumbor/-TyVxOUZsrW7Ly8J9axEqz_ClJA=/0x0:2040x1360/1820x1213/filters:focal(857x517:1183x843):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/61907809/akrales_180913_2950_0307.0.jpg" alt="">
                        </a>
                        <div class="featured__desc">
                            <a class="title is-6">How to get the most out of iOS 12 Shortcuts</a>
                            <a class="is-size-7 has-text-link">Eric Todd</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <p class="title is-2">Latest News</p>
                    <hr>
                    <?php foreach ($articles as $article): ?>
                        <div class="article-preview">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                <img src="<?=$article['banner']?>" alt="">
                                <p class="title is-3"><?=$article['title']?></p>
                                <p><?=$article['preview']?></p>
                            </a>

                            <a href="/"><?=$article['author']?></a>
                        </div>
                        <hr>
                    <?php endforeach;?>
                </div>
                <div class="column is-4 sidebar">
                    <p style="margin-top: 18px;" class="title title is-4">Popular</p>
                    <hr>
                    <?php foreach ($articles as $article): ?>
                        <div class="article-preview">
                            <a href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                <img src="<?=$article['banner']?>" alt="">
                                <p class="title is-5"><?=$article['title']?></p>
                            </a>
                            <a href="<?=getenv('BASE_URL') . "/users/" . $article['authorId']?>" class="is-size-7 has-text-link"><?=$article['author']?></a>
                            <hr>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . "/components/footer.php";?>



