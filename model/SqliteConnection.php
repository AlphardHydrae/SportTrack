<?php 
class SqliteConnection {

    private static SqliteConnection $sql;

    private function __construct() { /* Constructor */ }

    public static function getInstance() : SqliteConnection {
        if(!isset(self::$sql)) {
            self::$sql = new SqliteConnection();
        }

        return self::$sql;
    }

    public function getConnection() : PDO {
        try {
            $db = new PDO('sqlite:' . DB_FILE);
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e -> getMessage() . "<br/>";
            die();
        }
    }
}
