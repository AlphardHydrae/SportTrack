<?php 
class SqliteConnection {
    function getConnection() {
        try {
            $db = new PDO('sqlite:../data/sport_track.db');
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $user = 'sophie_bertrand@zohomail.eu';

            $sth = $db -> prepare("SELECT * FROM Activite JOIN Data ON date = uneActivite WHERE unUtilisateur = '" + $user + "';");
            $sth -> execute();
            $result = $sth -> fetchAll();

            $table = '</td><td>';

            foreach ($result as $row) {
                echo "<tbody><td>" . $row['date'] . $table . $row['description'] . $table . $row['fMoy'] . $table . $row['duree'] . $table . $row['duree'] . $table . $row['distance'] . $table . $row['altitude'] . "</td></tbody>";
            }

            $db = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    getConnection();
}
?>