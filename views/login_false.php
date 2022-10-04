<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>SportTrack</title>
  <link href="/static/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="main">
    <div class="container" id="login_false">
      <div class="header">
        <header id="head">Se connecter</header>
      </div>
      <div class="line"></div>
      <p id="login_false-text">le nom d'utilisateur ou le mot de passe est incorrect</p>
      <form method="POST" action="/logincontroller">
        <div class="form-field">
          <label class="text-label" for="femail">Email</label><br>
          <input type="email" class="text-field" id="femail" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="form-field">
          <label class="text-label" for="fmdp">Mot de Passe</label><br>
          <input type="password" class="text-field" id="fmdp" name="pwd" placeholder="Mot de passe" required>
        </div>
        <input type="submit" class="btn-basic" value="Connexion">
      </form>
      <button class="btn-basic" id="btn-alt" onclick="window.location.href='/signupcontroller'">Créer un compte</button>
    </div>
  </div>
</body>

</html>