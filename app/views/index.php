<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="<?=getenv('BASE_URL')?>/assets/css/index.css">
</head>
<body>

    <header class="navbar">
        <div class="container">
        <section class="navbar-section">
            <a href="..." class="navbar-brand mr-2">Spectre.css</a>
            <a href="..." class="btn btn-link">Docs</a>
            <a href="..." class="btn btn-link">GitHub</a>
        </section>
        <section class="navbar-section">
            <div class="input-group input-inline">
            <input class="form-input" type="text" placeholder="search">
            <button class="btn btn-primary input-group-btn">Search</button>
            </div>
        </section>
        </div>

    </header>

    <?php if (isset($user)): ?>
        <small>Logged in as: <?=$user['email']?></small>
    <?php endif;?>

    <div>
        <?php foreach ($articles as $article): ?>
        <div>
            <h2><?=$article['title']?></h2>
            <p><?=$article['body']?></p>
            <a href="/"><?=$article['author']?></a>
        </div>
        <?php endforeach;?>
    </div>

</body>
</html>
