<?php 
	
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$first_name = $HTTP_POST_VARS['first_name'];
	$last_name = $HTTP_POST_VARS['last_name'];
	$email = $HTTP_POST_VARS['email'];
	$phone = $HTTP_POST_VARS['phone'];
	$age = $HTTP_POST_VARS['age'];
	$photo1 = "concursos/".$HTTP_POST_VARS['photo1'];
	$photo2 = "concursos/".$HTTP_POST_VARS['photo2'];
	$photo3 = "concursos/".$HTTP_POST_VARS['photo3'];
	
	$query = mysql_query ("SET NAMES utf8;");
	
	$query="INSERT INTO concursos( id , firstName, lastName, email, phone, age, firstPicture, secondPicture, thirdPicture) VALUES (NULL, '$first_name', '$last_name', '$email', '$phone', '$age', '$photo1', '$photo2', '$photo3') ";
	
	if(mysql_query ($query)){
		print "&output=sent";
	} else {
		print "&output=error";
	}
	
	$dummy = "dummy";
	print "&dummy=$dummy";
	
?> 