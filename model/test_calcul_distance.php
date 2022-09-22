<?php
require_once "CalculDistanceImpl.php";
// require_once "C:\wamp64\www\projet_web_Semestre3\SportTrack\model\CalculDistanceImpl.php";
#include "C:\wamp64\www\projet_web_Semestre3\SportTrack\model\CalculDistanceImpl.php";
$test = new CalculDistanceImpl();
$var = $test->calculDistance2PointsGPS(47.644795,-2.776605,47.648510,-2.780145);

#echo $var;
$list =  array(
    array("latitude"=>47.644795,"longitude"=>-2.776605),
    array("latitude"=>47.646870,"longitude"=>-2.778911),
    array("latitude"=>47.646197,"longitude"=>-2.780220),
    array("latitude"=>47.646992,"longitude"=>-2.781068),
    array("latitude"=>47.647867,"longitude"=>-2.781744),
    array("latitude"=>47.648510,"longitude"=>-2.780145),
);
$var2 = $test -> calculDistanceTrajet($list);
#echo ($list[1]["latitude"]);
echo $var2;
?>  