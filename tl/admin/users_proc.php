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
					if($_POST["sex_type"]=="male"){
					$sex = "male";
				}elseif($_POST["sex_type"]=="female"){
					$sex = "female";
				}
				
					$sql = "UPDATE registration
							SET firstName = '".$_POST['firstName']."', lastName = '".$_POST['lastName']."', email = '".$_POST['email']."', sex = '".$sex."', age = '".$_POST['age']."', profession = '".$_POST['profession']."', city = '".$_POST['city']."', ensanche = '".$_POST['ensanche']."', truth = '".$_POST['truth']."', firstLie = '".$_POST['firstLie']."', secondLie = '".$_POST['secondLie']."', active = '".$_POST['active']."'  WHERE ID = ".$_POST['ID'] ;
					
					break;
					
				case "DELETE":
					
					$sql = "DELETE FROM registration WHERE ID = ".$_POST['ID']."";
					break;		
				}
			$result= mysql_query($sql, $conn);

			?>

			<script language="JavaScript">
			<!--
				location.replace ("users_action.php");
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
			<h1>Users Administration</h1>
		</div>
  </div>
</div>
  
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
		$sql = "SELECT * FROM registration WHERE ID = ".$_GET['ID'] ."";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$array = mysql_fetch_row($result);
		$firstName = mysql_result($result,0,'firstName');
		$lastName = mysql_result($result,0,'lastName');
		$email = mysql_result($result,0,'email');
		$sex = mysql_result($result,0,'sex');
		$age = mysql_result($result,0,'age');
		$profession = mysql_result($result,0,'profession');
		$city = mysql_result($result,0,'city');
		$ensanche = mysql_result($result,0,'ensanche');
		$truth = mysql_result($result,0,'truth');
		$firstLie = mysql_result($result,0,'firstLie');
		$secondLie = mysql_result($result,0,'secondLie');						
		$active = mysql_result($result,0,'active');
		$ID = mysql_result($result,0,'ID');
		
		switch ($_GET['ActionType'])
		{

			case "UPDATE":			
				
				?>
				<div id="contentArea">
					<form name="PSMS" action="users_proc.php" method="post" >
						<input name='OptionType' type='hidden' value='UPDATE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
						<div class="formHeader">
							<h2>Edit User Data</h2>
						</div>
						
						<div class="formBody">
							<table width="632">
							<tr>
			<fieldset title="Text">
				<td width="103"><label for="firstName">First Name: </label></td>
			<td width="420"><input type="text" name="firstName" value="<? echo $firstName; ?>" maxlength="155" size="70"></td>
			</fieldset></tr>
			
			<tr>
			<fieldset title="Text">
				<td><label for="lastName">Last Name: </label></td>
				<td><input type="text" name="lastName" value="<? echo $lastName; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
			<tr>
			<fieldset title="Text">
				<td><label for="email">Email: </label></td>
				<td><input type="text" name="email" value="<? echo $email; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
			<tr>
			<fieldset title="Text">
				<td><label for="sex">Sex:</label></td>
				<td><label>
				  <input type="radio" name="sex_type" id="male" value="male">
			    Male 
			    <input type="radio" name="sex_type" id="female" value="female">
			    Female</label></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="age">Age: </label></td>
				<td><input type="text" name="age" value="<? echo $age; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="profession">Profession: </label></td>
				<td><input type="text" name="profession" value="<? echo $profession; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="city">City: </label></td>
				<td><input type="text" name="city" value="<? echo $city; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="ensanche">District: </label></td>
				<td><input type="text" name="ensanche" value="<? echo $ensanche; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="truth">Truth: </label></td>
				<td><input type="text" name="truth" value="<? echo $truth; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="firstLie">First Lie: </label></td>
				<td><input type="text" name="firstLie" value="<? echo $firstLie; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="secondLie">Second Lie: </label></td>
				<td><input type="text" name="secondLie" value="<? echo $secondLie; ?>" maxlength="50" size="70"></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="active">Active: </label></td>
				<td><input type="text" name="active" value="<? echo $active; ?>" maxlength="50" size="70"></td>
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
					<form name="PSMS" action="users_proc.php" method="post">
						<input name='OptionType' type='hidden' value='DELETE'>
						<input name='ID' type='hidden' value='<? echo $ID; ?>'>
					
						<div class="formHeader">
							<h2>Delete User<br>
							Are you sure you want to delete this user?</h2>
						</div>
						<div class="formBody">
							<table width="432">
							<tr>
							<fieldset title="Text">
								<td><label for="firstName">First Name :</label></td>
								<td><? echo $firstName; ?></td>
							</fieldset></tr>
							
							<tr>
							<fieldset title="Text">
								<td><label for="lastName">Last Name: </label></td>
								<td><? echo $lastName; ?></td>
							</fieldset></tr>
							<tr>
							<fieldset title="Text">
								<td><label for="email">Email: </label></td>
								<td><? echo $email; ?></td>
							</fieldset></tr>
							 <tr>
							<fieldset title="Text">
								<td><label for="active">Activation:</label></td>
								<td><? echo $active; ?></td>
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

