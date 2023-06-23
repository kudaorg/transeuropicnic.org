<?
include('db_conn.php');
include('db_select.php');
include('check.php');
error_reporting(E_ALL);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
		<title>Truths &amp; Lies &gt; Administration</title>
		<style type="text/css" media="all">
			@import url( include/default.css );
.style2 {color: #FFFFFF}
        </style>
		<script type="text/javascript" language="javascript" src="include/ui.js"></script>
	</head>

	<body onLoad="applyHandlers()">
	<div id="header">
		<div id="headerContent">
		  <div id="infoArea">
		    <h1> News Administration</h1>
		  </div>
		</div>
	</div>
  	<div id="page">
  		<div id="menuArea"> 
      		<div class="menuBox"> 
      			<div class="menuTitle"> <img src="images/iminus.gif" width="16" height="16" onMouseDown="toggleMenu('menu1', this)">	
        			<h3>Administration</h3>
      			</div>
      			<ul id="menu1">
       				<li><a href="news_action.php">News</a></li>
					<li><a href="collection_action.php">Collection</a></li>
                    <li><a href="users_action.php">Users</a></li>
				</ul>
      			<div class="menuFooter"></div>
    		</div>
    		</div>
		<?
		if ($_POST['OptionType'] == 'ADD'){
			$_POST['OptionType'] = '';
			$sql_id = "SELECT MAX(ID) AS Maximum FROM news;";
			$result_id = mysql_query($sql_id, $conn) or die(mysql_error());
			$array = mysql_fetch_row($result_id);
			$Maximum = mysql_result($result_id,0,'Maximum');
			$Maximum = $Maximum + 1;
			
			if($_POST["asset_type"]=="picture"){
			$picture = "news/pictures/".$_POST['Pic'];
			$video ="";
			}elseif($_POST["asset_type"]=="video"){
			$picture = "";
			$video ="news/videos/".$_POST['Pic'];
			}
			
			$sql_insert = "INSERT INTO news (ID, date, title, news, picture, video) VALUES (".$Maximum.",'".$_POST['date']."','".$_POST['title']."', '".$_POST['news']."', '".$picture."', '".$video."')";
			$result_insert= mysql_query($sql_insert, $conn);
			
			?>
			<?
		}
		$sql= "SELECT * FROM news";
		$result_sql = mysql_query($sql, $conn) or die(mysql_error());
		?>
    	<div id="contentArea">
<? 
				if ($_POST["slika_poslata"]){
					 if ($_POST["asset_type"]=="picture"){
						$uploaddir = '../news/pictures/';
					}else if($_POST["asset_type"]=="video"){
						$uploaddir = '../news/videos/';
					}
					$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			   			echo "Picture/Video is valid  and uploaded successfully.";
		    		} else {
		    			echo "Error uploading picture! \n";
						echo "Debugging informations:";
						print_r($_FILES);
						$slika_poslata= "";
					}					  
				}else{ 
					?>
						<form enctype="multipart/form-data" action="news_action.php" method="POST">
			                <div class="formHeader">
			            	    <h2>Add news</h2>
		                  </div>
							<div class="formBody">
							  <table width="851">
                                  <tr>
                                    <td width="162"><div align="right">Picture or video:</div></td>
                                    <td width="648">
                                     <input type="radio" name="asset_type" value="picture"> 

                                    picture<br>
                                    <input type="radio" name="asset_type" value="video"> 

                                    video</td>
                                  </tr>
                                </table>
                           	    <table width="851">
	  <tr>
										<td width="162"><div align="right">Choose picture/video:</div></td>
<td width="648"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			      					        <input name="userfile" type="file" />
			        						<input type="submit" value="Send" />
   						<input type="hidden" name="slika_poslata" value="1" /></td>
                                  </tr>
								</table>
		  				        </div></form>
				      <? } ?>
		 	               
			
				 	<form name="PSMS" action="news_action.php" method="post" >
                                
                                
                     <input name='OptionType' type='hidden' value='ADD'>
                     <input name='asset_type' type='hidden' value='<? echo $_POST["asset_type"];?>'>
                     
                     
<div class="formBody">
								<table width="573">
									<tr>
                                    	<fieldset title="Text">
											<td width="169" valign="middle"><div align="right">Date (YYYY-MM-DD):</div></td>
											<td width="392"><input name="date" type="text" id="date" size="53" maxlength="10"></td>
										</fieldset>
                                   	</tr>
                                    <tr>
                                    	<fieldset title="Text">
											<td width="169" valign="middle"><div align="right">Title :</div></td>
											<td width="392"><input name="title" type="text" id="title" size="53" maxlength="200"></td>
										</fieldset>
                                   	</tr>
									<tr>
									  <td><div align="right">News</div></td>
									  <td><textarea name="news" cols="50" rows="10" id="news"></textarea></td>
								  </tr>
									<tr>
										<fieldset title="Text">
			    						    <td><div align="right">Picture/Video:</div></td>
			  								<td valign="middle"><input type="hidden" name="Pic" value="<? echo $_FILES['userfile']['name'] ?>">
                                            <p><? echo $_FILES['userfile']['name'] ?></p></td>			
										</fieldset>
                                    </tr>
								</table>
                                <p>
                                  <input type="submit" name="Submit" value="Add">
		</p>
</div>
							<div class="formFooter"></div>
						</form>

						<table id="contentTable">
							<thead>
								<tr class="formHeader">
			  						<th width="3%" height="19">Edit</th>
		  						  <th width="5%">Delete</th>
								  <th width="3%">No.</th>
								  <th width="9%"><div align="center">Date</div></th>
								  <th width="21%"><span class="style2">Title</span></th>
								  <th width="25%">News</th>
								  <th width="16%">Picture</th>
								  <th width="18%">Video</th>
								</tr>
							</thead>
							<tbody>
							<?
								$Index = 0;
								while ($row_sql = mysql_fetch_row($result_sql)){ 
									$date = mysql_result($result_sql,$Index,'date');
									$title = mysql_result($result_sql,$Index,'title');
									$news = mysql_result($result_sql,$Index,'news');
									$picture = mysql_result($result_sql,$Index,'picture');
									$video = mysql_result($result_sql,$Index,'video');
									$ID = mysql_result($result_sql,$Index,'ID');
									$Index++;
							?>
								<tr>
			  						<td class="tdRow"><a href="news_proc.php?ActionType=UPDATE&ID=<? echo $ID;?>"><img src="images/iedit.gif" alt="edit" width="16" height="16" border="0"></a></td>
			 						<td class="tdRow"><a href="news_proc.php?ActionType=DELETE&ID=<? echo $ID;?>"><img src="images/idelete.gif" alt="delete" width="16" height="16" border="0"></a></td>
									<td class="tdRow"><? echo $Index."."; ?></td>
									<td class="tdRow"><? echo $date; ?></td>
									<td class="tdRow"><? echo $title; ?></td>
									<td class="tdRow"><? echo $news; ?></td>
									<td class="tdRow"><div align="center"><? echo $picture; ?></div></td>
									<td class="tdRow"><div align="center"><? echo $video; ?></div></td>
								</tr>
							<?
								}	
							?>
							</tbody>
						</table>
<?
					include('db_close.php');
				?>
			</div>
		</div>
	</body>
</html>

