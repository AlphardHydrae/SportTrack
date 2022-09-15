<?php
class Utilisateur{
    private string $nom;
    private string $prenom;
    private string $dateDeNaissance;
    private string $sexe;
    private string $taille;
    private string $poids;
    private string $email;

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
?>
