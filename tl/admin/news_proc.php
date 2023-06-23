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
				
					if($_POST["asset_type"]=="picture"){
					$picture = "news/pictures/".$_POST['Pic'];
					$video ="";
					}elseif($_POST["asset_type"]=="video"){
					$picture = "";
					$video ="news/videos/".$_POST['Pic'];
					}
					
					
					$sql = "UPDATE news
							SET date = '".$_POST['date']."', title = '".$_POST['title']."', news = '".$_POST['news']."', picture = '".$picture."', video = '".$video."' WHERE ID = ".$_POST['ID']."";
					break;
					
				case "DELETE":
					$sql = "DELETE FROM news WHERE ID = ".$_POST['ID']."";
					break;			
				}
			$result= mysql_query($sql, $conn);

			?>

			<script language="JavaScript">
			<!--
				location.replace ("news_action.php");
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
.style3 {color: #FFFFFF}
.style5 {
	color: #333333;
	font-size: 1em;
}
.style6 {color: #333333; }
.style7 {font-size: 1em}
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
		$sql = "SELECT * FROM news WHERE ID = ".$_GET['ID'] ."";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$array = mysql_fetch_row($result);
		$date = mysql_result($result,0,'date');
		$title = mysql_result($result,0,'title');
		$news = mysql_result($result,0,'news');
		$picture = mysql_result($result,0,'picture');
		$video = mysql_result($result,0,'video');
		$ID = mysql_result($result,0,'ID');
		
		
		if($picture){
		$slika=$picture;
		$asset_type="picture";
		}elseif($video){
		$slika=$video;
		$asset_type="video";
		}
		
		switch ($_GET['ActionType'])
		{

			case "UPDATE":			
				
				?>
				<div id="contentArea">
					<form name="PSMS" action="news_proc.php" method="post">
						<input name='OptionType' type='hidden' value='UPDATE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
						<div class="formHeader">
							<h2 class="style7">Edit news</h2>
						</div>
						
						<div class="formBody">
							<table width="632">
							<tr>
							<fieldset title="Text">
								<td width="114"><label for="Naslov">
                                  <div align="right">Date: </div>
                                </label>						    </td>
								<td width="506"><input type="text" name="date" value="<? echo $date; ?>" maxlength="10" size="53"></td>
							</fieldset></tr>
							<tr>
							  <td><div align="right">Title:</div></td>
							  <td><input name="title" type="text" id="title" value="<? echo $title; ?>" size="53"></td>
							  </tr>
							<tr>
							  <td><div align="right">News:</div></td>
							  <td><textarea name="news" cols="50" rows="10" id="news"><? echo $news; ?></textarea></td>
							  </tr>
							<tr>
							<fieldset title="Text">
								<td><label for="Slicica">
								  <div align="right">Picture/Video:</div>
								</label></td>
								<td align="left" valign="middle"><img src="../<? echo $slika; ?>" alt="slika" border="0"></td>
                                <input name='asset_type' type='hidden' value='<? echo $asset_type;?>'>
                                
							</fieldset></tr>
							<tr>
							<fieldset title="Text">
								<td><label for="Slika"></label></td>
								<td><input type="text" name="Pic" size="53" value="<? echo substr(strrchr($slika,'/'),1); ?>"></td>
							</fieldset></tr>
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
					<form name="PSMS" action="news_proc.php" method="post">
						<input name='OptionType' type='hidden' value='DELETE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
						<input name='slika' type='hidden' value='<? echo $slika; ?>'>
						<div class="formHeader">
							<h2>Delete news<br>
							Are you sure you want to delete this news?</h2>
					  </div>
						<div class="formBody">
							<table width="432">
							<tr>
							<fieldset title="Text">
								<td width="116"><label for="Naslov">
								  <div align="right">Date:
					                </label>						    
				                  </div></td>
								<td width="304"><? echo $date; ?></td>
							</fieldset></tr>
							<tr>
							  <td><div align="right">Title:</div></td>
							  <td><? echo $title; ?></td>
							  </tr>
							<tr>
							  <td><div align="right">News:</div></td>
							  <td><? echo $news; ?></td>
							  </tr>
							<tr>
							<fieldset title="Text">
								<td><div align="right">Picture/Video:								  
							      </label>
								</div></td>
								<td><? echo substr(strrchr($slika,'/'),1); ?></td>
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

