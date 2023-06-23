<?php 
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$qResult = mysql_query ("SET NAMES utf8;");
	
	$qResult = mysql_query ("SELECT id, age, profession, truth, firstLie, secondLie FROM registration ORDER BY id ASC;"); 
	$nRows = mysql_num_rows($qResult); 
	print "nRows=$nRows";
	
	for ($i=0; $i< $nRows; $i++){ 
                $row = mysql_fetch_array($qResult); 
		$id = $row['id'];
                $age = $row['age'];
                $profession = $row['profession'];
		$truth = $row['truth'];
		$firstLie = $row['firstLie'];
                $secondLie = $row['secondLie'];
		print "&id$i=$id&age$i=$age&profession$i=$profession&truth$i=$truth&firstLie$i=$firstLie&secondLie$i=$secondLie";
	}
        
        $dummy = "dummy";
        print "&dummy=$dummy";
	
?> 