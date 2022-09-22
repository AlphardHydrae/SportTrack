<?php
class Utilisateur{
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $sexe;
    private $taille;
    private $poids;
    private $email;
    private $mdp;

    public function  __construct() { /* Constructor */ }
    public function init($n, $p, $d, $s, $t, $pd, $e, $m){
        $this -> nom = $n;
        $this -> prenom = $p;
        $this -> dateDeNaissance = $d;
        $this -> sexe = $s;
        $this -> taille = $t;
        $this -> poids = $pd;
        $this -> email = $e;
        $this -> mdp = $m;
    }

    public function getNom() : string { return $this -> nom; }
    public function getPrenom() : string { return $this -> prenom; }
    public function getDob() : string { return $this -> dateDeNaissance; }
    public function getSexe() : string { return $this -> sexe; }
    public function getTaille() : string { return $this -> taille; }
    public function getPoids() : string { return $this -> poids; }
    public function getEmail() : string { return $this -> email; }
    public function getMdp() : string { return $this -> mdp; }
    public function  __toString() : string { return $this -> nom . " " . $this -> prenom; }
}
?>
