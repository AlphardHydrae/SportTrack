<?php
require_once 'CalculDistance.php';
class CalculDistanceImpl implements CalculDistance
{
    function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float
    {
        $ret = 0;
        $R = 6378.137;
        if ($lat1 != null && $long1 != null && $lat2 != null && $long2 != null) {
            $lat1 = $lat1 * pi() / 180;
            $long1 = $long1 * pi() / 180;
            $lat2 = $lat2 * pi() / 180;
            $long2 = $long2 * pi() / 180;
            $ret = $R * acos(sin($lat2) * sin($lat1) + cos($lat2) * cos($lat1) * cos($long2 - $long1));
        }
        return $ret;
    }

    function calculDistanceTrajet(array $parcours): float
    {
        $dist = 0;
        if ($parcours != null) {
            for ($i = 0; $i < count($parcours) - 1; $i++) {
                $lat1 = $parcours[$i]["latitude"];
                $long1 = $parcours[$i]["longitude"];
                $lat2 = $parcours[$i + 1]["latitude"];
                $long2 = $parcours[$i + 1]["longitude"];
                $dist += CalculDistanceImpl::calculDistance2PointsGPS($lat1, $long1, $lat2, $long2);
            }
        }
        return $dist;
    }
}
