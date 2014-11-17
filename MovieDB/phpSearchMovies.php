<?php
error_reporting(E_ALL ^ E_NOTICE);
$varLine = "<TABLE>";
$varSearch = $_POST['postVar1'];
$newSearch = str_replace(" ", "+", $varSearch );

//Grab the base url of the images
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "http://api.themoviedb.org/3/configuration?api_key=accd3ddbbae37c0315fb5c8e19b815a5");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ca);

curl_close($ca);

$config = json_decode($response, true);
$base = $config['images']['base_url'];
$size = $config['images']['poster_sizes'][2];
$varImageURL = $base . $size;

//Grab the data from themoviedb.org
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?query=Monster&api_key=accd3ddbbae37c0315fb5c8e19b815a5");
curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?query=" . $newSearch . "&api_key=accd3ddbbae37c0315fb5c8e19b815a5");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$responsePHP = json_decode($response);
$movies = $responsePHP->results;
$i = 0;

$varTotalResults = $responsePHP->total_results;

for($x=0;$x<intval($varTotalResults);$x++){
	$firstMovie = $movies[intval($x)];
	$varURL = $firstMovie->poster_path;
	$varID = $firstMovie->id;
	$varTitle = $firstMovie->title;
	//Elemenate the blank results
	if($varTitle != ""){
		//Write out the results in a readable format
		$varLine = $varLine . 	"<TR>";
		$varLine = $varLine . 	"<TD><IMG SRC = '" . $varImageURL . $varURL . "' HEIGHT = '100px' WIDTH = '75px' /><TD>";
		$varLine = $varLine . 	"<TD><A HREF = '#' onclick = \"fnAddToDB('" . $varID . "', '" . $varTitle . "', '" . $varImageURL . $varURL .  "')\">" . $varID . "</A></TD>";
		$varLine = $varLine . 	"<TD>" . $varTitle . "</TD>";
		$varLine = $varLine . 	"</TR>";
	}
}
$varLine = $varLine . "</TABLE>";
echo $varLine;
 ?>