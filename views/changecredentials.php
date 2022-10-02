<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Change Credentials">

    <link rel="stylesheet" href="/static/css/style.css">

    <title>Change Credentials</title>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="header">
                <header id="head">Modifier ses informations personnelles</header>
            </div>
            <div class="line"></div>
            <form action="/changecredentialscontroller" method="POST">
                <div class="form-field">
                    <label class="#">Nom</label>
                    <input type="text" class="text-field" name="lastname" placeholder="Nom" required>
                </div>
                <div class="form-field">
                    <label class="#">Prénom</label>
                    <input type="text" class="text-field" name="firstname" placeholder="Prénom" required>
                </div>
                <div class="form-field">
                    <label class="#">Adresse mail</label>
                    <input type="email" class="text-field" name="email" value="<?php echo $data['email']; ?>" disabled>
                </div>
                <div class="form-field">
                    <label class="#">Mot de passe</label>
                    <input type="password" class="text-field" placeholder="Mot de passe" name="pwd" required>
                </div>
                <div class="form-field">
                    <label class="#">Date de naissance</label><br>
                    <input type="date" id="date-field" name="dob" required>
                </div>
                <div class="form-field">
                    <label class="#">Sexe</label><br>
                    <input type="radio" class="#" id="h" name="gender">
                    <label for="h">Masculin</label>
                    <input type="radio" class="#" id="f" name="gender">
                    <label for="f">Féminin</label>
                    <input type="radio" class="#" id="a" name="gender">
                    <label for="a">Autre</label>
                </div>
                <div class="form-field">
                    <label class="#">Taille (cm)</label>
                    <input type="range" id="#" min="0" max="250" name="height" oninput="this.nextElementSibling.value = this.value">
                    <output class="#">150</output>
                </div>
                <div class="form-field">
                    <label class="#">Poids (kg)</label>
                    <input type="range" id="#" min="0" max="250" name="weight" oninput="this.nextElementSibling.value = this.value">
                    <output class="#">60</output>
                </div>
                <input type="submit" class="btn-basic" value="Ok">
            </form>
            <button class="btn-basic" id="logout" onclick="window.location.href='homepage.html'">Retour</button>
        </div>
    </div>

</body>

</html>