<?php 
	
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$first_name = $HTTP_POST_VARS['first_name'];
	$last_name = $HTTP_POST_VARS['last_name'];
	$email = $HTTP_POST_VARS['email'];
	$sex = $HTTP_POST_VARS['sex'];
	$age = $HTTP_POST_VARS['age'];
	$profession = $HTTP_POST_VARS['profession'];
	$city = $HTTP_POST_VARS['city'];
        $ensanche = $HTTP_POST_VARS['ensanche'];
	$truth = $HTTP_POST_VARS['truth'];
	$first_lie = $HTTP_POST_VARS['firstLie'];
	$second_lie = $HTTP_POST_VARS['secondLie'];
	
	$query = mysql_query ("SET NAMES utf8;");
	
	$query="INSERT INTO registration( id , firstName, lastName, email, sex, age, profession, city, ensanche, truth, firstLie, secondLie) VALUES (NULL, '$first_name', '$last_name', '$email', '$sex', '$age', '$profession', '$city', '$ensanche', '$truth', '$first_lie', '$second_lie') ";
	
	if(mysql_query ($query)){
		print "&output=sent";
	} else {
		print "&output=error";
	}
	
	$dummy = "dummy";
	print "&dummy=$dummy";
	
?> 