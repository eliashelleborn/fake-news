<?php
declare(strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

    <section class="section">
        <div class="container">
            <p class="title is-3 is-marginless">Admin Dashboard</p>
            <small>Logged in as: <?=$this->auth->user['name']?></small>
            <hr>

            <div class="is-flex" style="justify-content: space-between;">
                <p class="title is-4">Articles</p>
                <a class="button is-success is-small" href="<?=getenv('BASE_URL') . "/admin/articles/create";?>">
                    <strong>Create Article</strong>
                </a>
            </div>
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <th><?=htmlspecialchars($article['title'])?></th>
                            <th><?=htmlspecialchars($article['author'])?></th>
                            <th><?=htmlspecialchars($article['publishDate'])?></th>
                            <th>
                                <a class="button is-light is-small" href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                    <strong>View</strong>
                                </a>
                                <a class="button is-dark is-small" href="<?=getenv('BASE_URL') . "/admin/articles/" . $article['id'] . '/edit';?>">
                                    <strong>Edit</strong>
                                </a>
                                <a class="button is-danger is-small" href="<?=getenv('BASE_URL') . "/admin/articles/" . $article['id'] . '/delete';?>">
                                    <strong>Delete</strong>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>



