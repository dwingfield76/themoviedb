<?php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/New_York'); 
//Include database connections

include_once 'incDBConnect.inc';
include_once 'incPSL-Config.inc';

//Get variables from the function
$varMovieID 		= $_POST['postVar1'];
$varMovieName 		= $_POST['postVar2'];
$varMovieLink 		= $_POST['postVar3'];
//Current Date
$date = date('Ymd');
//SQL Query
$varSQL = "INSERT INTO tblmovie (movID, movDateCreated, movStatus, movName, movLink) VALUES (" . $varMovieID . ", " . $date . ", 'ACTIVE', '" . $varMovieName . "', '" . $varMovieLink . "');";

//Execute Query
$mysqli->query($varSQL);

//If no errors return 1
echo "1";
?>