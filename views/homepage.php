<?php
require_once __ROOT__ . "/model/SqliteConnection.php";
?>

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
            <div class="table-container">
                <table class="table">
                    <thead>
                        <th>Date</th>
                        <th>Description</th>
                        <th>fMin</th>
                        <th>fMax</th>
                        <th>fMoy</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Durée</th>
                    </thead>
                    <tbody>
                        <?php
                        $dbc = SqliteConnection::getInstance()->getConnection();

                        $query = "SELECT * FROM Activite WHERE unUtilisateur = ? ORDER BY date";
                        $stmt = $dbc->prepare($query);
                        $stmt->execute(array($data['email']));
                        $result = $stmt->fetchAll();

                        $table = '</td><td>';

                        foreach ($result as $activity) {
                            echo "<td>" . $activity['date'] . $table . $activity['description'] . $table . $activity['fMin'] . $table . $activity['fMax'] . $table . $activity['fMoy'] . $table . $activity['hDebut'] . $table . $activity['hFin'] . $table . $activity['duree'] . "</td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="#">
                <h3>Saisir de nouvelles données</h3>
                <form action="/homepagecontroller" method="POST" enctype="multipart/form-data">
                    <label class="#">Charger un fichier</label>
                    <input type="file" class="btn-file" accept=".json" name="file" required>
                    <input type="submit" class="btn-ok-file" value="Ok">
                </form>
            </div>
            <button class="btn-basic" id="alt" onclick="window.location.href='/changecredentialscontroller'">Modifier mes données</button><br>
            <button class="btn-basic" id="logout" onclick="window.location.href='/logincontroller'">Déconnexion</button>
        </div>
    </div>

</body>

</html>