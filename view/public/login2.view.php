<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../public/css/login.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="container">
    <header>Login</header>
    <form method="POST" action="?pg=connect">
      <div class="input-field">
        <input type="text" name="pseudo" required>
        <label>Username/Pseudo</label>
      </div>
      <div class="input-field">
        <input class="pswrd" type="password" name="pwd" required>
        <span class="show">SHOW</span>
        <label>Password</label>
      </div>
      <div class="button">
        <div class="inner">
        </div>
        <input type="submit" value="login">
      </div>
    </form>

    <script src="../../public/js/login.js"></script>
</body>

</html>