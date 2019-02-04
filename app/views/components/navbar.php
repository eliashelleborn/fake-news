<?php
declare(strict_types = 1);
?>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?=getenv('BASE_URL') . "/";?>">
                <p class="title is-4">FN</p>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="<?=getenv('BASE_URL') . "/";?>">
                Home
            </a>


            <!--<div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>-->
        </div>

            <div class="navbar-end">
                <?php if (!$this->auth->check()): ?>
                    <div class="navbar-item">
                        <div class="buttons">
                        <a class="button is-dark is-small" href="<?=getenv('BASE_URL') . "/register";?>">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-ligh is-small" href="<?=getenv('BASE_URL') . "/login";?>">
                            Log in
                        </a>
                        </div>
                    </div>
                <?php else: ?>
                <div class="navbar-item">
                    <div class="buttons">
                        <?php if ($this->auth->hasRole(1)): ?>
                        <a class="button is-danger is-small" href="<?=getenv('BASE_URL') . "/admin";?>">
                            <strong>Admin</strong>
                        </a>
                        <?php endif;?>
                        <a class="button is-dark is-small" href="<?=getenv('BASE_URL') . "/logout";?>">
                            <strong>Log out</strong>
                        </a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>

</nav>
