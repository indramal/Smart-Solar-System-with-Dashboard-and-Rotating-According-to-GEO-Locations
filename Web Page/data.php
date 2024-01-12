<?php

require_once(__DIR__ . "../../php/db_configx1.php");

function getcordinates($db_conx, $monthval, $dayval, $timeval)
{   

    $azimut = "";
    $altitude = "";
    $id = "";

    $stmt1 = $db_conx->prepare("SELECT * FROM solarcordinates WHERE monthval='$monthval' AND dayval='$dayval' AND timeval='$timeval' ORDER BY timeval DESC LIMIT 1");
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
                $azimut = $row['azimut'];
                $altitude = $row['altitude'];
                $id = $row['id'];
            }
        } else {
            $azimut = "0";
            $altitude = "0";
            $id = "0";
        }

    }

    return array($azimut, $altitude, $id);

}

function inserdata($db_conx, $datev, $locv, $solarno, $volv, $current, $tem, $hum)
{

    $stmt1 = $db_conx->prepare("INSERT INTO solardata(dateval,locationname,solarpno,volatage,current,temp,hum) VALUES ('$datev','$locv','$solarno','$volv','$current','$tem','$hum')");

    if (false === $stmt1) {
        $sqlst = "Error:" . $db_conx->errno;
        $st = "ErrorIN";
    }

    $exs1 = $stmt1->execute();

    if (false === $exs1) {
        $sqlst = "Error:" . $stmt1->errno;
        $st = "ErrorIN";
    } else {

        $st = "DoneIN";

    }

    return $st;
}

function roundToQuarterHour($datetime)
{

    $datetime = ($datetime instanceof DateTime) ? $datetime : new DateTime($datetime);

    $datetime = $datetime->setTime($datetime->format('H'), ($i = $datetime->format('i')) - ($i % 15));

    $datetime = $datetime->format('H:i');

    return $datetime;
}

if (!empty($_GET['lc']) && !empty($_GET['sno']) && $_GET['vl'] >= 0 && $_GET['cr'] >= 0 && $_GET['tm'] >= 0 && $_GET['hm']>= 0) {


    $lkdate = new DateTime("now", new DateTimeZone('Asia/Colombo'));
    $lkdateval = $lkdate->format('Y-m-d H:i:s');

    $mon = $lkdate->format('m');
    $day = $lkdate->format('d');
    $time = roundToQuarterHour($lkdate);

    $locv = $_GET['lc'];
    $solarno = $_GET['sno'];
    $volv = $_GET['vl'];
    $current = $_GET['cr'];
    $tem = $_GET['tm'];
    $hum = $_GET['hm'];

    $st = inserdata($db_conx,$lkdateval, $locv, $solarno, $volv, $current, $tem, $hum);

    list($v1, $v2, $v3) = getcordinates($db_conx,$mon, $day, $time);

    $valueq = array("azi" => "$v1", "alt" => "$v2", "datain" => "$st");
    $myJSON = json_encode($valueq);
    echo $myJSON;
} else {
    echo "Error";
}

?>