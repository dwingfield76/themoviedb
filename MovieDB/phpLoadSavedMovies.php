<?php
//Database connection
include_once 'incDBConnect.inc';
include_once 'incPSL-Config.inc';
error_reporting(E_ALL ^ E_NOTICE);

//SQL Query
$varSQLFindAllMovies = "SELECT movID, movName, movLink FROM tblmovie ORDER BY movID ASC";
$varBGToggle = '0';

$result = $mysqli->query($varSQLFindAllMovies);
$row_count = $result->num_rows;
if($row_count > 0){
	while($row = mysqli_fetch_array($result)){
		if($varBGToggle == '0'){
			$varBGToggle = '1';
			$varBGColor = '#FFFFFF';
		}else{
			$varBGToggle = '0';
			$varBGColor = '#F2F2F2';
		}
		//Write each record
		$varLine = $varLine . "<DIV STYLE = 'position:relative;height:60px;width:100%;background-color:" . $varBGColor . ";'>";
		$varLine = $varLine . "<DIV STYLE = 'position:relative;float:left;width:20%;height:100%;'><IMAGE SRC = '" . $row['movLink'] . "' WIDTH = '40px' HEIGHT = '60px'/></DIV>";
		$varLine = $varLine . "<DIV STYLE = 'position:relative;float:left;width:80%;height:100%;'>" . $row['movName'] . "</DIV>";
		$varLine = $varLine . "</DIV>";	
	}
}else{
	//If no redcords
	$varLine = "<DIV STYLE = 'position:relative;height:20px;width:100%;background-color:#FFFFFF'>No Movies Found</DIV>";
}

echo $varLine;
?>