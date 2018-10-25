<?php require_once dirname(__DIR__) . "/components/header.php";?>

<div class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <p class="title has-text-centered">Register</p>
                <form action="<?=getenv("BASE_URL")?>/register" method="post">

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="email" value="<?=htmlspecialchars($input['email'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="username">Username</label>
                        <div class="control">
                            <input class="input" type="text" name="username" value="<?=htmlspecialchars($input['username'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password" value="<?=htmlspecialchars($input['password'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="confirmPassword">Confirm Password</label>
                        <div class="control">
                            <input class="input" type="password" name="confirmPassword" value="<?=htmlspecialchars($input['confirmPassword'])?>">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-dark" type="submit">Register</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
        <?php if (!empty($errors)): ?>
            <div class="columns is-centered">
                <div class="notification is-danger column is-half">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li>
                            - <?=$error?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>

<?php require_once dirname(__DIR__) . "/components/footer.php";?>
