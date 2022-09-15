<?php
require_once 'SqliteConnection.php';

class Utilisateur{
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $sexe;
    private $taille;
    private $poids;
    private $email;

    public function  __construct() { /* Constructor */ }
    public function init($n, $p, $d, $s, $t, $pd, $e){
        $this -> nom = $n;
        $this -> prenom = $p;
        $this -> dateDeNaissance = $d;
        $this -> sexe = $s;
        $this -> taille = $t;
        $this -> poids = $pd;
        $this -> email = $e;
    }

    public function getNom() : string { return $this -> nom; }
    public function getPrenom() : string { return $this -> prenom; }
    public function getDob() : string { return $this -> dateDeNaissance; }
    public function getSexe() : string { return $this -> sexe; }
    public function getTaille() : string { return $this -> taille; }
    public function getPoids() : string { return $this -> poids; }
    public function getEmail() : string { return $this -> email; }
    public function  __toString() : string { return $this -> nom . " " . $this -> prenom; }
}

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

        echo 'test';

        $stmt = $db -> prepare("SELECT * FROM Utilisateur");
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
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
