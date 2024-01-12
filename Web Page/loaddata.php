<?php

require_once(__DIR__ . "../../php/db_configx1.php");

$locationname = "Colombo";
$solarpno = "1";

$stmt1 = $db_conx->prepare("SELECT * FROM solardata WHERE locationname='$locationname' AND solarpno='$solarpno' ORDER BY dateval DESC LIMIT 1");

if (false === $stmt1) {
    $sqlst = "Error:" . $db_conx->errno;
}

$exs1 = $stmt1->execute();

if (false === $exs1) {
    $sqlst = "Error:" . $stmt1->errno;
} else {

    $result = $stmt1->get_result();
    $row_cnt = $result->num_rows;

    if ($row_cnt > 0) {
        while ($row = $result->fetch_assoc()) {
            $curv = $row['current'] . "A";
            $temv = $row['temp'] . "°C";
            $humv = $row['hum'] . "%";
            $sqlst = $row['dateval'];
        }
    } else {
        $curv = "0";
        $temv = "0";
        $humv = "0";
        $sqlst = "0";
    }
}

$allstatus = array();

$valueq = array("curv" => "$curv", "temv" => "$temv", "humv" => "$humv", "lsdate" => "$sqlst", "lcdata" => "$locationname", "sno" => "$solarpno");
array_push($allstatus, $valueq);

$myJSON = json_encode($allstatus);
echo $myJSON;


?>