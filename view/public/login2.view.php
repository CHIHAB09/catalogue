<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/login.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Login</title>
</head>

<body>
      <h1>Panther Sneakers</h1></br>
      <h2>Se conecter!</h2></br>
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
    </div>
        <a href="?pg=Accueil"><button class="button">Retour à l'accueil.</button></a>
        <script src="../../public/js/login.js"></script>
</body>

</html>