<?php
declare(strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>
    <section class="section">
        <div class="container">
            <p class="title is-3">404 - Not Found</p>
            <?="<a class='button is-link' href=\"javascript:history.go(-1)\">< Go Back</a>";?>
        </div>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/footer.php";?>
