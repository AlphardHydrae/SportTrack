<?php
require_once "SqliteConnection.php";
require_once "Utilisateur.php";

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
        
        $stmt = $db -> prepare("SELECT * FROM Utilisateur");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
    }

    public final function insert(Utilisateur $obj) : void {
        if($obj instanceof Utilisateur) {
            $db = SqliteConnection::getInstance() -> getConnection();

            $query = "INSERT INTO Utilisateur(nom, prenom, dateDeNaissance, sexe, taille, poids, email, mdp) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $db -> prepare($query);

            // $stmt->bindValue(':n',$obj -> getNom(), PDO::PARAM_STR);
            // $stmt->bindValue(':p',$obj -> getPrenom(), PDO::PARAM_STR);
            // $stmt->bindValue(':d',$obj -> getDob(), PDO::PARAM_STR);
            // $stmt->bindValue(':s',$obj -> getSexe(), PDO::PARAM_STR);
            // $stmt->bindValue(':t',$obj -> getTaille(), PDO::PARAM_STR);
            // $stmt->bindValue(':pd',$obj -> getPoids(), PDO::PARAM_STR);
            // $stmt->bindValue(':e',$obj -> getEmail(), PDO::PARAM_STR);
            // $stmt->bindValue(':m',$obj -> getMdp(), PDO::PARAM_STR);

            $n = $obj -> getNom();
            $p = $obj -> getPrenom();
            $d = $obj -> getDob();
            $s = $obj -> getSexe();
            $t = $obj -> getTaille();
            $pd = $obj -> getPoids();
            $e = $obj -> getEmail();
            $m = $obj -> getMdp();

            $stmt -> execute(array($n, $p, $d, $s, $t, $pd, $e, $m));
        }
    }

    public function delete(Utilisateur $obj) : void {
        if($obj instanceof Utilisateur) {
            $db = SqliteConnection::getInstance() -> getConnection();

            $query = "DELETE FROM Utilisateur WHERE email = :e";
            $stmt = $db -> prepare($query);

            $stmt->bindValue(':e',$obj -> getEmail(), PDO::PARAM_STR);

            $stmt->execute();
        }
    }

    // public function update(Utilisateur $obj): void {
    //     if($obj instanceof Utilisateur) {
    //         // $db = SqliteConnection::getInstance() -> getConnection();

    //         // $query = "UPDATE Utilisateur SET $param = $newParam WHERE email = :e";
    //         // $stmt = $db -> prepare($query);

    //         // $stmt->bindValue(':e',$obj -> getEmail(), PDO::PARAM_STR);

    //         // $stmt->execute();
    //     }
    // }
}
?>
