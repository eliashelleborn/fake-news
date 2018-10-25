<?php require_once __DIR__ . "/components/header.php";?>

    <section class="section">
        <div class="container">
            <?php if (isset($user)): ?>
            <small>Logged in as: <?=$user['email']?></small>
            <?php endif;?>

            <div>
                <?php foreach ($articles as $article): ?>
                <div>
                    <p class="title is-3"><?=$article['title']?></p>
                    <p><?=$article['body']?></p>
                    <a href="/"><?=$article['author']?></a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>

<?php require_once __DIR__ . "/components/footer.php";?>



