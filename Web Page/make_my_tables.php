<?php
echo "Start..!";
echo __DIR__;
require_once (__DIR__ . "../../php/db_configx1.php");
echo "Database Connected";

$deltb = 'DROP TABLE IF EXISTS solarcordinates';

$query = mysqli_query($db_conx, $deltb);

if ($query === TRUE) {
	echo "<h3>solarcordinates table Delete OK :) </h3>"; 
} else {
	echo "<h3>solarcordinates table NOT Delete :( </h3>"; 
}

$deltb = 'DROP TABLE IF EXISTS solardata';

$query = mysqli_query($db_conx, $deltb);

if ($query === TRUE) {
	echo "<h3>solarcordinates table Delete OK :) </h3>"; 
} else {
	echo "<h3>solarcordinates table NOT Delete :( </h3>"; 
}

//////////////////////////////////////////

$tbl_users = "CREATE TABLE IF NOT EXISTS solarcordinates (
              	id INT(255) NOT NULL AUTO_INCREMENT,
			  	monthval INT(255) NOT NULL,
				dayval INT(255) NOT NULL,
			  	timeval TIME NOT NULL,
			  	azimut VARCHAR(255) NOT NULL,
			  	altitude VARCHAR(255) NOT NULL,	
				remarks VARCHAR(255),		  
            	PRIMARY KEY (id),
			  	UNIQUE KEY id (id)
              )";

$query = mysqli_query($db_conx, $tbl_users);

if ($query === TRUE) {
	echo "<h3>solarcordinates table created OK :) </h3>"; 
} else {
	echo "<h3>solarcordinates table NOT created :( </h3>"; 
}

$tbl_users = "CREATE TABLE IF NOT EXISTS solardata (
	id INT(255) NOT NULL AUTO_INCREMENT,
	dateval DATETIME NOT NULL,
	locationname VARCHAR(255),
	solarpno VARCHAR(255),
	volatage VARCHAR(255),
	current VARCHAR(255),
	temp VARCHAR(255),
	hum VARCHAR(255),
	other VARCHAR(255),
	remarks VARCHAR(255),	  
	PRIMARY KEY (id),
	UNIQUE KEY id (id)
	)";

$query = mysqli_query($db_conx, $tbl_users);

if ($query === TRUE) {
echo "<h3>solardata table created OK :) </h3>"; 
} else {
echo "<h3>solardata table NOT created :( </h3>"; 
}

?>