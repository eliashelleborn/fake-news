<?php require_once dirname(__DIR__) . "/components/header.php";?>

    <section class="section">
        <div class="container">
            <p class="title is-3">Admin Dashboard</p>
            <small>Logged in as: <?=$this->auth->user['name']?></small>
        </div>
    </section>

<?php require_once dirname(__DIR__) . "/components/footer.php";?>



