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
                    <label class="text-label">Nom</label>
                    <input type="text" class="text-field" name="lastname" value="<?php echo $data['lastname']; ?>" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Prénom</label>
                    <input type="text" class="text-field" name="firstname" value="<?php echo $data['firstname']; ?>" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Adresse mail</label>
                    <input type="email" class="text-field" name="email" value="<?php echo $data['email']; ?>" disabled>
                </div>
                <div class="form-field">
                    <label class="text-label">Mot de passe</label>
                    <input type="password" class="text-field" placeholder="Mot de passe" name="pwd" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Date de naissance</label><br>
                    <input type="date" id="date-field" value="<?php echo $data['dob']; ?>" name="dob" required>
                </div>
                <div class="form-field">
                    <label class="text-label">Sexe</label><br>
                    <input type="radio" class="btn-radio" id="h" name="genderM">
                    <label for="h">Masculin</label>
                    <input type="radio" class="btn-radio" id="f" name="genderF">
                    <label for="f">Féminin</label>
                </div>
                <div class="form-field">
                    <label class="text-label">Taille (cm)</label>
                    <input type="range" class="btn-range" min="0" max="250" value="<?php echo $data['height']; ?>" name="height" oninput="this.nextElementSibling.value = this.value">
                    <output class="slider-output"><?php echo $data['height'] ?></output>
                </div>
                <div class="form-field">
                    <label class="text-label">Poids (kg)</label>
                    <input type="range" class="btn-range" min="0" max="250" value="<?php echo $data['weight']; ?>" name="weight" oninput="this.nextElementSibling.value = this.value">
                    <output class="slider-output"><?php echo $data['weight'] ?></output>
                </div>
                <input type="submit" class="btn-basic" value="Ok">
            </form>
            <div class="btn-footer">
                <form action="/logoutcontroller" method="POST">
                    <input type="submit" class="btn-basic" id="btn-alt-delete" value="Supprimer">
                </form>
                <button class="btn-basic" id="logout" onclick="history.back()">Retour</button>
            </div>
        </div>
    </div>

</body>

</html>