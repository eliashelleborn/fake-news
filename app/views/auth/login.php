<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<div>
  <h2>Login</h2>
  <form action="<?=getenv("BASE_URL")?>/login" method="post">

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" value="<?=htmlspecialchars($input['email'])?>">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" value="<?=htmlspecialchars($input['password'])?>">
    </div>
    <button type="submit">Register</button>
  </form>

  <?php if (isset($errors)): ?>
    <div>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?=$error?></li>
        <?php endforeach;?>
      </ul>
    </div>
  <?php endif;?>
</div>

</body>
</html>
