<?php
class CalculDistanceImpl implements CalculDistance {

    require_once("CalculDistance.php");

    function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        $R = 6378.137;

        return $R*acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
    }

    function calculDistanceTrajet(Array $parcours): float { return 0; }
    }
?>