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
				<h1>Collection Administration</h1>
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
			$sqll = "SELECT * FROM pictures where leftPicture='".$_POST['leftPicture']."' or rightPicture='".$_POST['rightPicture']."';";
			echo $sqll;
			$resultl= mysql_query($sqll, $conn) or die(mysql_error());
			if (mysql_fetch_row($resultl) == 0){
				$sql_id = "SELECT MAX(ID) AS Maximum FROM pictures;";
				$result_id = mysql_query($sql_id, $conn) or die(mysql_error());
				$array = mysql_fetch_row($result_id);
				$Maximum = mysql_result($result_id,0,'Maximum');
				$Maximum = $Maximum + 1;
				$leftPicture = "collection/".$_POST['leftPicture'];
				$rightPicture = "collection/".$_POST['rightPicture'];
				$sql_insert = "INSERT INTO pictures (ID, leftPicture, rightPicture, pictureLimit) VALUES (".$Maximum.",'".$leftPicture."', '".$rightPicture."', '".$_POST['pictureLimit']."')";
				$result_insert= mysql_query($sql_insert, $conn);
			}else{
			?>
				<script language="JavaScript">
				<!--
					alert("You have allready insert that picture!");
				<!--  -->
				</script>
				<?
			}
		}
		$sql= "SELECT * FROM pictures";
		$result_sql = mysql_query($sql, $conn) or die(mysql_error());
		?>
    	<div id="contentArea">
			<? 
				if ($slika_poslata){
					$uploaddir = '../collection/';
					$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
					$uploadfile2 = $uploaddir . basename($_FILES['userfile2']['name']);
					
					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			   			
						if (move_uploaded_file($_FILES['userfile2']['tmp_name'], $uploadfile2)) {
						echo "Pictures are valid  and uploaded successfully.";
		    			}
					
					
					
					} else {
		    			echo "Error uploading picture! \n";
						echo 'Debugging informations:';
						print_r($_FILES);
						$slika_poslata= "";
						
					}					  
				}else{ 
					?>
						<form enctype="multipart/form-data" action="collection_action.php" method="POST">
			                <div class="formHeader">
			            	    <h2>Add new picture</h2>
			                </div>
							<div class="formBody">
                            	<table width="615">
<tr>
										<td width="212" height="50"><div align="right">Choose left picture:</div></td>
<td width="391"><input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
			      					        <input name="userfile" type="file" />
			        					
											<input type="hidden" name="slika_poslata" value="1" />		
                                        </td>
                                  </tr>
								</table>
		  				        <table width="615">
                                  <tr>
                                    <td width="213" height="50"><div align="right">Choose right picture:</div></td>
                                    <td width="390">
                                        <input name="userfile2" type="file" />
                                        <input type="submit" value="Send" />
                                       
                                    </td>
                                  </tr>
                                </table>
	  				          <p>&nbsp;</p>
						  </div>
                       	    <? } ?>
		 	               
			</form>
				 	<form name="PSMS" action="collection_action.php" method="post">
                     <input name='OptionType' type='hidden' value='ADD'>
<div class="formBody">
								<table width="573">
									<tr>
                                    	<fieldset title="Text">
											<td width="115" valign="middle"><div align="right">Picture Limit:</div></td>
											<td width="446"><input type="text" name="pictureLimit" maxlength="10" size="10"></td>
									  </fieldset>
                                   	</tr>
									<tr>
										<fieldset title="Text">
			    						    <td><div align="right">Left Picture:</div></td>
			  								<td valign="middle"> <img src="../collection/<? echo $_FILES['userfile']['name'] ?>">
		       									<input type="hidden" name="leftPicture" value="<? echo $_FILES['userfile']['name'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $_FILES['userfile']['name'] ?>&nbsp;&nbsp;&nbsp;&nbsp;                                            </td>			
										</fieldset>
                                    </tr>
								</table>
						        <table width="573">
                                  <tr>
                                    <fieldset title="Text">
                                    <td width="116"><div align="right">Right Picture:</div></td>
                                      <td width="445" valign="middle"><img src="../collection/<? echo $_FILES['userfile2']['name'] ?>">
                                        <input type="hidden" name="rightPicture" value="<? echo $_FILES['userfile2']['name'] ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<? echo $_FILES['userfile']['name'] ?>&nbsp;&nbsp;&nbsp;&nbsp; </td>
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
			  						<th width="4%"><span class="style2">Edit</span></th>
		  						  <th width="17%">Delete</th>
								  <th width="14%">No.</th>
									<th width="30%">Left Picture</th>
									<th width="10%">Right Picture</th>
									<th width="25%">Picture Limit</th>
								</tr>
							</thead>
							<tbody>
							<?
								$Index = 0;
								while ($row_sql = mysql_fetch_row($result_sql)){ 
									$leftPicture = mysql_result($result_sql,$Index,'leftPicture');
									$rightPicture = mysql_result($result_sql,$Index,'rightPicture');
									$pictureLimit = mysql_result($result_sql,$Index,'pictureLimit');
									$ID = mysql_result($result_sql,$Index,'ID');
									$Index++;
							?>
								<tr>
			  						<td class="tdRow"><a href="collection_proc.php?ActionType=UPDATE&ID=<? echo $ID;?>"><img src="images/iedit.gif" alt="edit" width="16" height="16" border="0"></a></td>
			 						<td class="tdRow"><a href="collection_proc.php?ActionType=DELETE&ID=<? echo $ID;?>"><img src="images/idelete.gif" alt="delete" width="16" height="16" border="0"></a></td>
									<td class="tdRow"><? echo $Index."."; ?></td>
									<td class="tdRow"><div align="left"><? echo $leftPicture; ?></div>			    </td>
									<td class="tdRow"><div align="left"><? echo $rightPicture; ?></div>			    </td>
									<td class="tdRow"><div align="left"><? echo $pictureLimit; ?></div>			    </td>
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

