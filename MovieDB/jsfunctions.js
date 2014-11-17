//Description:	This is where all my onLoad functionality is
//		When the page loads, we do a call to the database
//		to list all the saved movies
$( document ).ready(function() {

	$.ajax({
  	type: 'POST',
  	url: 'phpLoadSavedMovies.php',
  	data: { postVar1: 't' },
 	 beforeSend:function(){
    		// this is where we append a loading image
    		$('#divMovieScreen').html('<CENTER><div class="loading" style = "width:68px;height:68px;"><img src="loading.gif" alt="Loading..." HEIGHT = "68px" WIDTH = "68px" /></div></CENTER>');
  	},
  	success:function(data){
    		// successful request; do something with the data
		var myvar = data;	
    		$('#divMovieScreen').empty();
		$('#divMovieScreen').append(myvar);
 	 },
  	error:function(){
   		 // failed request; give feedback to user
    		$('#divMovieScreen').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
 	 }
	});

});

//Description:	This function calls the search page and returns the
//		resluts in a table that you can click to add to the 
//		database
var fnSearchMovieDB = function (  ){
        // getting the value that user typed

        var searchString    = $("#txtSearchField").val();
        // forming the queryString
	$.ajax({
  	type: 'POST',
  	url: 'phpSearchMovies.php',
  	data: { postVar1: searchString  },
 	 beforeSend:function(){
    		// this is where we append a loading image
    		$('#divSearchResults').html('<CENTER><div class="loading" style = "width:68px;height:68px;"><img src="loading.gif" alt="Loading..." HEIGHT = "68px" WIDTH = "68px" /></div></CENTER>');
  	},
  	success:function(data){
    		// successful request; do something with the data
		var myvar = data;	
    		$('#divSearchResults').empty();
		$('#divSearchResults').append(myvar);
 	 },
  	error:function(){
   		 // failed request; give feedback to user
    		$('#divSearchResults').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
 	 }
	});

}
//Description:	This function calls the Add to Database page
//		that adds the movie to the database
var fnAddToDB = function ( varMovieID, varMovieName, varMovieImage ){
        // getting the value that user typed

        // forming the queryString
	$.ajax({
  	type: 'POST',
  	url: 'phpExecuteAddMovie.php',
  	data: { postVar1: varMovieID, postVar2: varMovieName, postVar3: varMovieImage    },
 	 beforeSend:function(){
    		// this is where we append a loading image
    		$('#divSearchResults').html('<CENTER><div class="loading" style = "width:68px;height:68px;"><img src="loading.gif" alt="Loading..." HEIGHT = "68px" WIDTH = "68px" /></div></CENTER>');
  	},
  	success:function(data){
    		// successful request; do something with the data
		var myvar = data;	
		if(myvar == 1){
			fnReloadDB();
			fnSearchMovieDB();
		}else{
			alert(myvar);
		}
 	 },
  	error:function(){
   		 // failed request; give feedback to user
    		$('#divSearchResults').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
 	 }
	});

}
//Description:	This function reloads the results from the database
var fnReloadDB = function (  ){

	$.ajax({
  	type: 'POST',
  	url: 'phpLoadSavedMovies.php',
  	data: { postVar1: 't' },
 	 beforeSend:function(){
    		// this is where we append a loading image
    		$('#divMovieScreen').html('<CENTER><div class="loading" style = "width:68px;height:68px;"><img src="loading.gif" alt="Loading..." HEIGHT = "68px" WIDTH = "68px" /></div></CENTER>');
  	},
  	success:function(data){
    		// successful request; do something with the data
		var myvar = data;	
    		$('#divMovieScreen').empty();
		$('#divMovieScreen').append(myvar);
 	 },
  	error:function(){
   		 // failed request; give feedback to user
    		$('#divMovieScreen').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
 	 }
	});

}