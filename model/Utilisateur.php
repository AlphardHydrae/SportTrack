<?php
class Utilisateur{
    private string $nom;
    private string $prenom;

    public function  __construct() { }
    public function init($n, $p){
        $this->nom = $n;
        $this->prenom = $p;
    }

    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function  __toString(): string { return $this->nom. " ". $this->prenom; }
}
?>
