<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <p class="title has-text-centered" style="margin-bottom: 5px;">Delete Article</p>
                <p class="title is-5 has-text-centered"style="margin-bottom: 15px;"><?=$article['title']?></p>
                <p class="has-text-centered" style="margin-bottom: 10px;">Are you sure you want to delete this article?</p>
                <form class="has-text-centered"  action="<?=getenv("BASE_URL") . "/admin/articles/" . $article['id'] . "/delete"?>" method="post">
                    <div class="field">
                        <div class="control has-text-centered">
                            <button class="button is-danger" type="submit">Delete</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>
