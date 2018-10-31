<?php
declare (strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <p class="title has-text-centered">Edit Article</p>
                <form  action="<?=getenv("BASE_URL") . "/admin/articles/" . $article['id'] . "/edit"?>" method="post">

                    <div class="field">
                        <label class="label" for="title">Title</label>
                        <div class="control">
                            <input class="input" type="title" name="title" value="<?=htmlspecialchars($article['title'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="preview">Preview</label>
                        <div class="control">
                            <textarea class="textarea" type="preview" name="preview"><?=htmlspecialchars($article['preview'])?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="body">Body</label>
                        <div class="control">
                            <textarea class="textarea" type="body" name="body"><?=htmlspecialchars($article['body'])?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="banner">Banner</label>
                        <div class="control">
                            <input class="input" type="banner" name="banner" value="<?=htmlspecialchars($article['banner'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-dark" type="submit">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <?php if (!empty($errors)): ?>
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="notification is-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li>
                            <?=$error?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif;?>

    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>
