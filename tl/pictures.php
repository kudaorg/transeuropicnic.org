<?php 
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$qResult = mysql_query ("SET NAMES utf8;");
	
	$qResult = mysql_query ("SELECT id, leftPicture, rightPicture, pictureLimit, transition, detailLeft, detailLeftX, detailLeftY, detailRight, detailRightX, detailRightY FROM pictures ORDER BY id ASC;"); 
	$nRows = mysql_num_rows($qResult); 
	print "nRows=$nRows";
	
	for ($i=0; $i< $nRows; $i++){ 
                $row = mysql_fetch_array($qResult); 
		$id = $row['id'];
		$left = $row['leftPicture'];
		$right = $row['rightPicture'];
                $limit = $row['pictureLimit'];
		$transition = $row['transition'];
                $detailLeft = $row['detailLeft'];
                $detailLeftX = $row['detailLeftX'];
                $detailLeftY = $row['detailLeftY'];
                $detailRight = $row['detailRight'];
                $detailRightX = $row['detailRightX'];
                $detailRightY = $row['detailRightY'];
		print "&id$i=$id&leftPicture$i=$left&rightPicture$i=$right&pictureLimit$i=$limit&transition$i=$transition&detailLeft$i=$detailLeft&detailLeftX$i=$detailLeftX&detailLeftY$i=$detailLeftY&detailRight$i=$detailRight&detailRightX$i=$detailRightX&detailRightY$i=$detailRightY";
	}
        
        $dummy = "dummy";
        print "&dummy=$dummy";
	
?> 