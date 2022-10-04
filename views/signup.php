<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Sign Up">

    <link rel="stylesheet" href="/static/css/style.css">

    <title>Sign Up</title>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="header">
                <header id="head">Créer un compte</header>
            </div>
            <div class="line"></div>
            <form action="/signupcontroller" method="POST">
                <div class="form-field">
                    <label class="text-label">Nom</label>
                    <input type="text" class="text-field" name="lastname" placeholder="Nom" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Prénom</label>
                    <input type="text" class="text-field" name="firstname" placeholder="Prénom" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Adresse mail</label>
                    <input type="email" class="text-field" name="email" placeholder="Adresse mail" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Mot de passe</label>
                    <input type="password" class="text-field" placeholder="Mot de passe" name="pwd" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Date de naissance</label><br>
                    <input type="date" id="date-field" name="dob" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Sexe</label><br>
                    <input type="radio" class="btn-radio" id="h" name="genderM">
                    <label for="h">Masculin</label>
                    <input type="radio" class="btn-radio" id="f" name="genderF">
                    <label for="f">Féminin</label>
                    <!-- <input type="radio" class="btn-radio" id="a" name="gender">
                    <label for="a">Autre</label> -->
                </div>
                <div class="form-field">
                    <label class="text-label">Taille (cm)</label>
                    <input type="range" class="btn-range" min="0" max="250" name="height" oninput="this.nextElementSibling.value = this.value">
                    <output class="slider-output">150</output>
                </div>
                <div class="form-field">
                    <label class="text-label">Poids (kg)</label>
                    <input type="range" class="btn-range" min="0" max="250" name="weight" oninput="this.nextElementSibling.value = this.value">
                    <output class="slider-output">60</output>
                </div>
                <input type="submit" class="btn-basic" value="Ok">
            </form>
            <button class="btn-basic" id="logout" onclick="window.location.href='/logincontroller'">Retour</button>
        </div>
    </div>

</body>

</html>