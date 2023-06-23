<?
include('db_conn.php');
include('db_select.php');
include('check.php');
error_reporting(E_ALL);
?>
<?
		if ($_POST['OptionType'] != "")
		{
			switch ($_POST['OptionType'])
				{
				case "UPDATE":
					$leftPicture = "collection/".$_POST['leftPicture']."";
					$rightPicture = "collection/".$_POST['rightPicture']."";
					$sql = "UPDATE pictures
							SET leftPicture = '".$leftPicture."',rightPicture = '".$rightPicture."', pictureLimit= '".$_POST['pictureLimit']."'
							WHERE ID = ".$_POST['ID']."";
					break;
					
				case "DELETE":
					$leftPicture = "../includes/".$_POST['leftPicture']."";
					$rightPicture = "../includes/".$_POST['rightPicture']."";
					$sql = "DELETE FROM pictures WHERE ID = ".$_POST['ID']."";
					unlink($leftPicture);
					unlink($rightPicture);
					break;			
				}
			$result= mysql_query($sql, $conn);

			?>

			<script language="JavaScript">
			<!--
				location.replace ("collection_action.php");
			<!-- //-->
			</script>

			<? 
		}
		?>
	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
<title>Truths &amp; Lies &gt; Administration</title>
<style type="text/css" media="all">
	@import url( include/default.css );
.style1 {color: #000000}
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
		$sql = "SELECT * FROM pictures WHERE ID = ".$_GET['ID'] ."";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$array = mysql_fetch_row($result);
		$leftPicture = mysql_result($result,0,'leftPicture');
		$rightPicture = mysql_result($result,0,'rightPicture');
		$pictureLimit = mysql_result($result,0,'pictureLimit');
		$ID = mysql_result($result,0,'ID');
		
		switch ($_GET['ActionType'])
		{

			case "UPDATE":			
				
				?>
				<div id="contentArea">
                
                
                
                
            <? if ($_POST["slika_poslata"]){
			$uploaddir = '../collection/';
			
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			$uploadfile2 = $uploaddir . basename($_FILES['userfile2']['name']);
			
			echo "<div class=\"formHeader\"><h2>Edit Picture</h2></div>
			<div class=\"formBody\">
			<table>
				<tr><td>";	
		//	echo '<pre>';
			
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
			   
			   if ( move_uploaded_file($_FILES['userfile2']['tmp_name'], $uploadfile2)) {
					 echo "Images uploaded succesfully.";
					}
			     
				 } else {
			      
				    echo " An error has happened \n";
				          
					  
					echo 'Debugging info:';
					print_r($_FILES);
					echo "</td></tr></table></div>";}
			
			$slika_poslata= "";
			}					  
			else { ?>
                
                <form enctype="multipart/form-data" action="collection_proc.php?ActionType=UPDATE&ID=<? echo $_GET['ID'];?>" method="POST">
			                <div class="formHeader">
			                  <h2>Coellection edit</h2>
			                </div>
					<div class="formBody"><table>
		<tr>
		  <td>
			Current left picture: <? echo $leftPicture;?><br></td>
					<td>
					<!-- MAX_FILE_SIZE must precede the file input field -->
			        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
			        <!-- Name of input element determines name in $_FILES array -->
			        <input name="userfile" type="file" />
			        
                    
				
			</td></tr>
            
           <tr>
		  <td>
			Current right picture: <? echo $rightPicture;?><br></td>
					<td>
					
			        
			        <!-- Name of input element determines name in $_FILES array -->
			        <input name="userfile2" type="file" />
			        <input type="submit" value="Upload" />
					<input type="hidden" name="slika_poslata" value="1" />
                    
				
			</td></tr> 
            
		
		</table></div></form>
			<? } ?>
                
                  <form name="PSMS" action="collection_proc.php" method="post">
						<input name='OptionType' type='hidden' value='UPDATE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
                        <input type="hidden" name="leftPicture" value="<? if ($_FILES['userfile']['name']){echo $_FILES['userfile']['name'];}else{echo substr(strrchr($leftPicture,'/'),1);} ?>">
                         <input type="hidden" name="rightPicture" value="<? if ($_FILES['userfile2']['name']){echo $_FILES['userfile2']['name'];}else{echo substr(strrchr($rightPicture,'/'),1);} ?>">
                         
						<div class="formHeader">
							<h2>Edit Picture</h2>
						</div>
						
						<div class="formBody">
							<table width="632">
							<tr>
							<fieldset title="Text">
								<td width="112"><label for="Slicica">
						    Left Picture:							      </label></td>
							<td width="508" align="left" valign="middle"><img src="../collection/<? if ($_FILES['userfile']['name']){echo $_FILES['userfile']['name'];}else{echo substr(strrchr($leftPicture,'/'),1);} ?>" alt="slika" border="0"></td>
							</fieldset></tr>
							
						  </table>
                            <table width="632">
                              <tr>
                                <fieldset title="Text">
                                <td><label for="Slicica"> Right Picture: </label></td>
                                  <td align="left" valign="middle"><img src="../collection/<? if ($_FILES['userfile2']['name']){echo $_FILES['userfile2']['name'];}else{echo substr(strrchr($rightPicture,'/'),1);} ?>" alt="slika" border="0"></td>
                                </fieldset>
                              </tr>
                             
                            </table>
                            <table width="632">
                              <tr>
                                <fieldset title="Text">
                                <td width="112"><div align="right">Picture Limit: </div>
                                    </label></td>
                                  <td width="508"><input type="text" name="pictureLimit" value="<? echo $pictureLimit; ?>" maxlength="50" size="70"></td>
                                </fieldset>
                              </tr>
                            </table>
                          <p>
                            <input type="submit" name="Submit2" value="Edit">
					      </p>
                      </div>
						<div class="formFooter"></div>
						
				  </form>

				<? 
				break;

			case "DELETE":
				?>
				<div id="contentArea">
					<form name="PSMS" action="collection_proc.php" method="post">
						<input name='OptionType' type='hidden' value='DELETE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
						<input name='leftPicture' type='hidden' value='<? echo $leftPicture; ?>'>
                        <input name='rightPicture' type='hidden' value='<? echo $rightPicture; ?>'>
						<div class="formHeader">
							<h2>Delete Picture</h2>
					  </div>
						<div class="formBody">
							<table width="432">
							<tr>
							<fieldset title="Text">
								<td width="116"><label for="Naslov">Left Picture:</label></td>
								<td width="304"><? echo substr(strrchr($leftPicture,'/'),1); ?></td>
							</fieldset></tr>
							<tr>
							<fieldset title="Text">
								<td><label for="Proizvodjac">Right Picture:</label></td>
								<td><? echo substr(strrchr($rightPicture,'/'),1); ?></td>
							</fieldset></tr>
							<tr>
							<fieldset title="Text">
								<td><label for="Slika">Picture Limit:</label></td>
								<td><? echo $pictureLimit; ?></td>
							</fieldset></tr>
							</table>
<p>
						      <input type="submit" name="Submit" value="Delete">
</p>
						</div>
						<div class="formFooter"></div>
						
				  </form>
					<?
			
				break;
			
			
		}
		$_GET['ActionType'] = "";
?>
<?
include('db_close.php');
?>
</div>
</div>
</body>
</html>

