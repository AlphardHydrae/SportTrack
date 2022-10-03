<?php
    #Ajouter,modifier,supprimer,lister les activités sportives,get
    #require_once("SqliteConnection.php";
class Activity
{
    /**
     * À l’instar de la séance précédente, écrivez une classe ActivityDAO 
     * permettant d’ajouter, de modifier, de supprimer et de lister les activités sportives contenues dans votre base de données.
     * Cette classe devra également permettre d’obtenir les activités sportives d’un utilisateur en particulier.
     */

    private string $date;
    private string $description;
    private string $fMin;
    private string $fMax;
    private string $fMoy;
    private string $hDebut;
    private string $hFin;
    private string $duree;
    private string $distance;

    public function  __construct() { /* Constructor */ }

    public function init($d, $de, $fMi, $fMa, $fMo, $hD, $hF, $du, $di) {
        $this -> date = $d;
        $this -> description = $de;
        $this -> fMin = $fMi;
        $this -> fMax = $fMa;
        $this -> fMoy = $fMo;
        $this -> hDebut = $hD;
        $this -> hFin = $hF;
        $this -> duree = $du;
        $this -> distance = $di;
    }
    
    public function getDate() : string { return $this -> date; }
    public function getDescription() : string { return $this -> description; }
    public function getFMin() : string { return $this -> fMin; }
    public function getFMax() : string { return $this -> fMax; }
    public function getFMoy() : string { return $this -> fMoy; }
    public function getHDebut() : string { return $this -> hDebut; }
    public function getHFin() : string { return $this -> hFin; }
    public function getDuree() : string { return $this -> duree; }
    public function getDistance() : string { return $this -> distance; }
    
    // public function setDate(string $date) : string { this.$date -> $date}
    // public function setDescription(string $description) : string { this.$description -> $description }
    // public function setFMin(string $fMin) : string { this.$fMin -> $fMin }
    // public function setFMax(string $fMax) : string { this.$fMax -> $fMax; }
    // public function setFMoy(string $fMoy) : string { this.$fMoy -> $fMoy; }
    // public function setHDebut(string $hDebut) : string { this.$hDebut -> $hDebut; }
    // public function setHFin(string $hFin) : string { this.$hFin -> $hFin; }
    // public function setDuree(string $duree) : string { this.$duree -> $duree; }
    // public function setDistance(string $distance) : string { this.$distance -> $distance; }
}
