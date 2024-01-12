<?php

require_once(__DIR__ . "../../php/db_configx1.php");

$azimut = "";
$altitude = "";

$tabledata = "";
$monval = "";
$day = "";

$lkdate = new DateTime("now", new DateTimeZone('Asia/Colombo'));
$lkdateval = $lkdate->format('Y-m-d H:i:s');

$mon = $lkdate->format('m');
$day = $lkdate->format('d');

$monval = $lkdate->format('F');

$stmt1 = $db_conx->prepare("SELECT * FROM solarcordinates WHERE monthval='$mon' AND dayval='$day' ORDER BY timeval ASC");
//$stmt1 = $db_conx->prepare( "SELECT * FROM solarcordinates ORDER BY timeval DESC LIMIT 1" );

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
            $tbrow = '<tr>';
            $tbrow = '</tr>';

            $tm = $row['timeval'];
            $azimut = $row['azimut'];
            $altitude = $row['altitude'];

            $tabledata .= $tbrow . '<td>' . $tm . '</td>' . '<td>' . $azimut . '</td>' . '<td>' . $altitude . '</td>' . $tbrow;            
        }
    } 
}


?>