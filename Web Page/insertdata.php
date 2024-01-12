<?php

require_once(__DIR__ . "../../php/db_configx1.php");

$monthval = "11";
$dayval = "3";
$timeval = "06:00";
$azimut = "105.13";
$altitude = "0.14";

//$stmt1 = $db_conx->prepare("INSERT INTO solarcordinates (monthval,dayval,timeval,azimut,altitude) 	VALUES('$monthval','$dayval','$timeval','$azimut','$altitude')");

$stmt1 = $db_conx->prepare("INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'06:15','107.1','3.16');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'06:30','107.65','6.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'06:45','108.27','10.11');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'07:00','108.97','13.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'07:15','109.77','17.12');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'07:30','110.66','20.6');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'07:45','111.67','24.06');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'08:00','112.8','27.5');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'08:15','114.09','30.91');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'08:30','115.54','34.29');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'08:45','117.2','37.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'09:00','119.09','40.9');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'09:15','121.26','44.12');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'09:30','123.76','47.25');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'09:45','126.67','50.29');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'10:00','130.06','53.21');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'10:15','134.02','55.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'10:30','138.67','58.54');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'10:45','144.1','60.86');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'11:00','150.42','62.88');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'11:15','157.65','64.51');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'11:30','165.72','65.68');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'11:45','174.41','66.32');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'12:00','183.37','66.39');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'12:15','192.17','65.88');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'12:30','200.41','64.83');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'12:45','207.85','63.3');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'13:00','214.38','61.37');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'13:15','220.02','59.12');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'13:30','224.84','56.6');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'13:45','228.96','53.88');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'14:00','232.47','51');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'14:15','235.48','47.99');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'14:30','238.08','44.87');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'14:45','240.32','41.67');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'15:00','242.27','38.41');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'15:15','243.98','35.09');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'15:30','245.47','31.73');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'15:45','246.79','28.33');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'16:00','247.96','24.89');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'16:15','248.99','21.44');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'16:30','249.91','17.96');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'16:45','250.72','14.46');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'17:00','251.44','10.96');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'17:15','252.08','7.46');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'17:30','252.64','3.99');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,8,'17:45','253.13','0.69');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'06:00','106.91','-0.09');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'06:15','107.38','3.11');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'06:30','107.93','6.55');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'06:45','108.55','10.05');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'07:00','109.26','13.54');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'07:15','110.06','17.04');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'07:30','110.95','20.51');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'07:45','111.97','23.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'08:00','113.11','27.4');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'08:15','114.4','30.8');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'08:30','115.86','34.17');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'08:45','117.52','37.49');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'09:00','119.42','40.76');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'09:15','121.6','43.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'09:30','124.11','47.09');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'09:45','127.03','50.12');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'10:00','130.42','53.02');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'10:15','134.38','55.77');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'10:30','139.01','58.32');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'10:45','144.43','60.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'11:00','150.7','62.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'11:15','157.87','64.23');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'11:30','165.85','65.39');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'11:45','174.44','66.03');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'12:00','183.28','66.1');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'12:15','191.97','65.6');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'12:30','200.13','64.57');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'12:45','207.51','63.06');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'13:00','214','61.15');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'13:15','219.62','58.92');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'13:30','224.44','56.42');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'13:45','228.56','53.72');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'14:00','232.08','50.85');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'14:15','235.1','47.85');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'14:30','237.71','44.75');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'14:45','239.96','41.57');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'15:00','241.93','38.31');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'15:15','243.64','35');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'15:30','245.15','31.65');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'15:45','246.48','28.26');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'16:00','247.65','24.83');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'16:15','248.69','21.38');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'16:30','249.61','17.91');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'16:45','250.43','14.42');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'17:00','251.15','10.93');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'17:15','251.79','7.43');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'17:30','252.35','3.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,9,'17:45','252.84','0.67');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'06:00','107.18','-0.14');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'06:15','107.66','3.05');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'06:30','108.21','6.49');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'06:45','108.83','9.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'07:00','109.54','13.47');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'07:15','110.34','16.95');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'07:30','111.24','20.42');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'07:45','112.26','23.87');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'08:00','113.4','27.3');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'08:15','114.7','30.69');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'08:30','116.17','34.05');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'08:45','117.84','37.36');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'09:00','119.74','40.62');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'09:15','121.93','43.81');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'09:30','124.45','46.93');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'09:45','127.37','49.94');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'10:00','130.76','52.83');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'10:15','134.72','55.56');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'10:30','139.35','58.1');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'10:45','144.74','60.38');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'11:00','150.97','62.37');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'11:15','158.07','63.97');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'11:30','165.97','65.12');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'11:45','174.45','65.75');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'12:00','183.19','65.82');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'12:15','191.77','65.33');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'12:30','199.85','64.31');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'12:45','207.17','62.82');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'13:00','213.63','60.93');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'13:15','219.23','58.72');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'13:30','224.05','56.24');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'13:45','228.17','53.56');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'14:00','231.7','50.71');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'14:15','234.73','47.72');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'14:30','237.35','44.64');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'14:45','239.61','41.46');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'15:00','241.59','38.22');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'15:15','243.31','34.92');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'15:30','244.83','31.58');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'15:45','246.16','28.19');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'16:00','247.35','24.77');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'16:15','248.39','21.33');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'16:30','249.32','17.87');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'16:45','250.14','14.39');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'17:00','250.87','10.9');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'17:15','251.51','7.41');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'17:30','252.07','3.95');
INSERT INTO solarcordinates(monthval,dayval,timeval,azimut,altitude) VALUES (11,10,'17:45','252.56','0.66');");

if (false === $stmt1) {
    $sqlst = "Error:" . $db_conx->errno . " Dis:" . $db_conx->error;
    echo $sqlst;
}

$exs1 = $stmt1->execute();

if (false === $exs1) {
    $sqlst = "Error:" . $stmt1->errno . " Dis:" . $db_conx->error;
    echo $sqlst;
} else {

    $idloc = $db_conx->insert_id;
    echo $idloc;

}

?>