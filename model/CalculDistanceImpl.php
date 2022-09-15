<?php
class CalculDistanceImpl implements CalculDistance {

    require_once("CalculDistance.php");

    function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        ret = 0;
        $R = 6378.137;
        if ($lat1!= null && $long1 != null && $lat2 != null && $long2 != null){
            
            ret = $R*acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
        }
        return ret;
    }

    function calculDistanceTrajet(Array $parcours): float { 
        ret = 0;
        if(&parcours != null){

        }
        return ret; 
    }
    }
?>