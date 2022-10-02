<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Homepage">

    <link rel="stylesheet" href="/static/css/style.css">

    <title>Homepage</title>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="header">
                <header id="head">Accueil</header>
            </div>
            <div class="line"></div>
            <h3 id="greet">Bienvenue <?php echo $data['lastname'] . " " . $data['firstname']; ?></h3>
            <div class="#">
                <form action="/loadfile.php" method="POST">
                    <label class="#">Charger un fichier</label>
                    <input type="file" accept=".json" required>
                    <input type="submit" value="Ok">
                </form>
            </div>
            <button class="btn-basic" id="alt" onclick="window.location.href='/changecredentialscontroller'">Modifier
                mes données</button><br>
            <button class="btn-basic" id="logout" onclick="window.location.href='/logincontroller'">Déconnexion</button>
        </div>
    </div>

</body>

</html>