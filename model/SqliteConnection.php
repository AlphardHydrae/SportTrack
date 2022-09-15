<?php 
class SqliteConnection {

    private static SqliteConnection $sql;

    public static function getInstance() : SqliteConnection {
        if(!isset(self::$sql)) {
            self::$sql = new SqliteConnection();
        }

        return self::$sql;
    }
    public static function getConnection() : PDO {
        try {
            $db = new PDO('sqlite:../data/sport_track.db');
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e -> getMessage() . "<br/>";
            die();
        }
    }
}
?>