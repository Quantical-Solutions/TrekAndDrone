<?php
include("geoipcity.inc");
include("geoipregionvars.php");

$gi = geoip_open(realpath("GeoLiteCity.dat"),GEOIP_STANDARD);

$record = geoip_record_by_addr($gi,banirIp());

$result = $record->country_name . " / GPS: " . $record->latitude . " | " . $record->longitude;

geoip_close($gi);
echo $result;

function banirIp() {

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }    
    return $ip;
}
?>
