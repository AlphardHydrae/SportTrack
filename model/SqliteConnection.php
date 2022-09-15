<?php 
class SqliteConnection {
    try {
        $db = new PDO('mysql:host=localhost;dbname=$dbname', $root, $AlphardPWD);
        foreach($dbh->query('SELECT * from Utilisateur') as $row) {
            print_r($row);
        }
        $db = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>