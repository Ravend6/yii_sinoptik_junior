<?php
function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
{
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;

    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;

    return ($miles ? ($km * 0.621371192) : $km);
}
$ax = (double) '50.515572';
$ay = (double) '30.238318';
$bx = (double) '50.163000';
$by = (double) '29.831000';
echo distance($ax, $ay, 50.510000, 30.481000) . PHP_EOL;
echo distance($ax, $ay, 50.339529, 30.894000) . PHP_EOL;
echo distance($ax, $ay, 50.163000, 29.831000) . PHP_EOL;
