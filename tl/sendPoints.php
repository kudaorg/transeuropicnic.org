<?php 
	
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$userPoints = $HTTP_POST_VARS['userPoints'];
        $userID = $HTTP_POST_VARS['userID'];
		
	$query = mysql_query ("SET NAMES utf8;");
	
	$query="UPDATE registration SET points=$userPoints WHERE id=$userID";
	
	if(mysql_query ($query)){
		print "&output=sent";
	} else {
		print "&output=error";
	}
	
	$dummy = "dummy";
	print "&dummy=$dummy";
	
?> 