<?php 
	mysql_pconnect ("localhost", "jelenak", "tortoise"); 
  
	mysql_select_db ("tl"); 
	
	$qResult = mysql_query ("SET NAMES utf8;");
	
	$qResult = mysql_query ("SELECT id, date, title, news, picture, video FROM news ORDER BY date DESC;"); 
	$nRows = mysql_num_rows($qResult); 
	print "nRows=$nRows";
	
	for ($i=0; $i< $nRows; $i++){ 
                $row = mysql_fetch_array($qResult); 
		$id = $row['id'];
		$date = $row['date'];
		$title = $row['title'];
		$news = $row['news'];
                $picture = $row['picture'];
                $video = $row['video'];
		print "&id$i=$id&date$i=$date&title$i=$title&news$i=$news&picture$i=$picture&video$i=$video";
        }
        
        $dummy = "dummy";
        print "&dummy=$dummy";
	
?> 