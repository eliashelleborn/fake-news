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
  <h2>Register</h2>
  <form action="/fake-news/public/auth/register" method="post">

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" value="<?=htmlspecialchars($input['email'])?>">
    </div>
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" value="<?=htmlspecialchars($input['username'])?>">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" value="<?=htmlspecialchars($input['password'])?>">
    </div>
    <div>
      <label for="confirmPassword">Confirm Password</label>
      <input type="password" name="confirmPassword" value="<?=htmlspecialchars($input['confirmPassword'])?>">
    </div>
    <input type="hidden" name="register_request" value="true">
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