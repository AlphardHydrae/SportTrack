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

                        $query = "select * from Activite where unUtilisateur = :e order by date";
                        $stmt = $dbc->prepare($query);
                        $stmt->bindValue(':e', $data['email'], PDO::PARAM_STR);
                        $stmt->execute();
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
                <form action="/loadfile.php" method="POST">
                    <label class="#">Charger un fichier</label>
                    <input type="file" accept=".json" required>
                    <input type="submit" value="Ok">
                </form>
            </div>
            <button class="btn-basic" id="alt" onclick="window.location.href='/changecredentialscontroller'">Modifier mes données</button><br>
            <button class="btn-basic" id="logout" onclick="window.location.href='/logincontroller'">Déconnexion</button>
        </div>
    </div>

</body>

</html>