<?php require_once dirname(__DIR__) . "/components/header.php";?>

    <section class="section">
        <div class="container">
            <p class="title is-3 is-marginless">Admin Dashboard</p>
            <small>Logged in as: <?=$this->auth->user['name']?></small>
            <hr>

            <div class="is-flex" style="justify-content: space-between;">
                <p class="title is-4">Articles</p>
                <a class="button is-success is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
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
                            <th><?=$article['title']?></th>
                            <th><?=$article['author']?></th>
                            <th><?=$article['publishDate']?></th>
                            <th>
                                <a class="button is-light is-small" href="<?=getenv('BASE_URL') . "/authors/" . $article['authorId']?>">
                                    <strong>View</strong>
                                </a>
                                <a class="button is-dark is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
                                    <strong>Edit</strong>
                                </a>
                                <a class="button is-danger is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
                                    <strong>Delete</strong>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <hr>

            <?php if (isset($users)): ?>
                <p class="title is-4">Users</p>
                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <th><?=$user['name']?></th>
                                <th><?=$user['email']?></th>
                                <th><?=$user['role']?></th>
                                <th><?=$user['createdAt']?></th>
                                <th>
                                    <a class="button is-light is-small" href="<?=getenv('BASE_URL') . "/articles/" . $article['id']?>">
                                        <strong>View</strong>
                                    </a>
                                    <a class="button is-dark is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
                                        <strong>Edit</strong>
                                    </a>
                                    <a class="button is-danger is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
                                        <strong>Delete</strong>
                                    </a>
                                </th>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;?>

        </div>
    </section>

<?php require_once dirname(__DIR__) . "/components/footer.php";?>



