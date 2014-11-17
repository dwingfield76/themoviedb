<?php
//Created By: David Wingfield
//Created Date: 	11/16/2014
//Update Date:  	11/17/2014
//Description:	Index page that sets up the program. "divSearchResults" Holds the values of the search and "divMovieScreen" holds the saved movies
//Version:	1.0.0.1
?>

<HTML>
<HEAD>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="jsFunctions.js"></script>
</HEAD>
<BODY>
	<DIV ID = '' NAME = '' STYLE = 'position:relative;top:5px;left:5px;float:left;border:solid 1px black;height:50px;width:200px;'>
		<DIV ID = ''  NAME = '' STYLE = 'height:50%;width:100%;background-color:blue;'><INPUT TYPE = 'TEXT' ID = 'txtSearchField' NAME = 'txtSearchField' /></DIV>
		<DIV ID = ''  NAME = '' STYLE = 'height:50%;width:100%;background-color:blue;'><INPUT TYPE = 'BUTTON' ID = 'btnSearch' NAME = 'btnSearch' VALUE = 'SEARCH' onclick = "fnSearchMovieDB();"/></DIV>
	</DIV>
	<DIV ID = 'divSpace' NAME = 'divSpace' STYLE = 'position:relative;float:left;width:10px;top:5px;'>&nbsp</DIV>
	<DIV ID = 'divMovieScreen' NAME = 'divMovieScreen' STYLE = 'position:relative;top:5px;float:left;height:100px;width:300px;overflow-y:auto;border:solid 1px black;background-color:white;color:black;'>
	</DIV>
	<DIV ID = 'divSpace' NAME = 'divSpace' STYLE = 'position:relative;float:left;width:10px;top:5px;'>&nbsp</DIV>
	<DIV ID = 'divSearchResults' NAME = 'divSearchResults' STYLE = 'position:relative;float:left;top: 5px;height:200px;width:400px;border: solid 1px black;overflow-y:auto;'></DIV>
</BODY>
</HTML>