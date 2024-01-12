<?php
$db_conx = new mysqli("localhost", "id19806140_kavindu", "zTU7*#tGlhy8oLFH%mb8", "id19806140_solardata");
// common
if ($db_conx -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db_conx -> connect_error;
  exit();
}
?>