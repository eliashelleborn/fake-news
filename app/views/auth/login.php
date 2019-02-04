<?php
declare(strict_types = 1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/app/Views/components/header.php";?>

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <p class="title has-text-centered">Login</p>
                <form  action="<?=getenv("BASE_URL")?>/login" method="post">

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="email" value="<?=htmlspecialchars($input['email'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password" value="<?=htmlspecialchars($input['password'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-dark" type="submit">Log in</button>
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
