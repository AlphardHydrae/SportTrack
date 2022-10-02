<?php
class Data {
    private $time;
    private $frequenceCardiaque;
    private $latitude;
    private $longitude;
    private $altitude;

    public function  __construct() { /* Constructor */ }
    public function init($t, $f, $la, $lo, $a){
        $this -> time = $t;
        $this -> frequenceCardiaque = $f;
        $this -> latitude = $la;
        $this -> longitude = $lo;
        $this -> altitude = $a;
    }

    public function getTime() : string { return $this -> time; }
    public function getFrequenceCardiaque() : string { return $this -> frequenceCardiaque; }
    public function getLatitude() : string { return $this -> latitude; }
    public function getLongitude() : string { return $this -> longitude; }
    public function getAltitude() : string { return $this -> altitude; }
}
?>
