<?php
require_once 'SqliteConnection.php';

class UtilisateurDAO {
    private static UtilisateurDAO $dao;

    private function __construct() { /* Constructor */ }

    public static function getInstance() : UtilisateurDAO {
        if(!isset(self::$dao)) {
            self::$dao = new UtilisateurDAO();
        }

        return self::$dao;
    }

    public final function findAll() : Array {
        $db = SqliteConnection::getInstance() -> getConnection();

        $stmt = $db -> prepare("SELECT * FROM Utilisateur ");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_CLASS, 'utilisateur');
    }

    // public final function insert(Utilisateur $st) : void {
    //     if($st instanceof Utilisateur){
    //         $dbc = SqliteConnection::getInstance() -> getConnection();
    //         // prepare the SQL statement
    //         $query = "insert into utilisateur(nom, prenom) values (:n,:p)";
    //         $stmt = $dbc->prepare($query);

    //         // bind the paramaters
    //         $stmt->bindValue(':n',$st->getNom(),PDO::PARAM_STR);
    //         $stmt->bindValue(':p',$st->getPrenom(),PDO::PARAM_STR);

    //         // execute the prepared statement
    //         $stmt->execute();
    //     }
    // }

    // public function delete(Utilisateur $obj): void { ... }

    // public function update(Utilisateur $obj): void {...}
}
?>
