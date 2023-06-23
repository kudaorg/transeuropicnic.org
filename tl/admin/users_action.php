<?
include('db_conn.php');
include('db_select.php');
include('check.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
<title>Truths &amp; Lies &gt; Administration</title>
<style type="text/css" media="all">
	@import url( include/default.css );
.style2 {font-size: .7}
.style3 {color: #FFFFFF}
</style>
<script type="text/javascript" language="javascript" src="include/ui.js"></script>
</head>
<body onLoad="applyHandlers()">
<div id="header">
	<div id="headerContent">
	  <div id="infoArea">
			<h1>User Administration</h1>
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
		if (($_POST['OptionType'] == 'ADD'))
		{
			$_POST['OptionType'] = '';
			$sql1 = "SELECT * FROM registration where email='".$_POST['email']."';";
			$result1= mysql_query($sql1, $conn) or die(mysql_error());
			if (mysql_fetch_row($result1) == 0)
			{
				$sql_id = "SELECT MAX(ID) AS Maximum FROM registration";
				$result_id = mysql_query($sql_id, $conn) or die(mysql_error());
				$array = mysql_fetch_row($result_id);
				$Maximum = mysql_result($result_id,0,'Maximum');
				$Maximum = $Maximum + 1;
				
				if($_POST["sex_type"]=="male"){
					$sex = "male";
				}elseif($_POST["sex_type"]=="female"){
					$sex = "female";
				}
				
				
				if($_POST['active']=="on"){
				$active_db="true";
				}else{
				$active_db="false";
				
				}
				
				
				$sql_insert = "INSERT INTO registration (ID, firstName, lastName, email, sex, age, profession,  city, ensanche, truth, firstLie, secondLie, active) VALUES (".$Maximum.",'".$_POST['firstName']."', '".$_POST['lastName']."', '".$_POST['email']."','".$sex."', '".$_POST['age']."', '".$_POST['profession']."', '".$_POST['city']."','".$_POST['ensanche']."', '".$_POST['truth']."', '".$_POST['firstLie']."', '".$_POST['secondLie']."','".$active_db."' )";
				
				
				$result_insert= mysql_query($sql_insert, $conn);
			}
			else
			{
				?>
				<script language="JavaScript">
				<!--
					alert("User is allready in the database!");
				<!--  -->
				</script>
	<?
			}
					
		}
	
		$sql= "SELECT * FROM registration";
		$result_sql = mysql_query($sql, $conn) or die(mysql_error());
	?>
                <div id="contentArea">
                  <? //} ?>
                  <form name="PSMS" action="users_action.php" method="post" >
                    <p><input name='OptionType' type='hidden' value='ADD'>
		  
		  
		  
		  
	    <strong class="menuTitle style2 style3">Insert New User</strong></p>
		<div class="formBody">
		  <table width="573">
			
			
			<tr>
			<fieldset title="Text">
				<td width="136"><label for="firstName">
			    First Name:			      </label></td>
			<td width="425"><div align="left">
			  <input type="text" name="firstName" value="" maxlength="155" size="70">
		    </div></td>
			</fieldset></tr>
			
			<tr>
			<fieldset title="Text">
				<td><label for="lastName">
			    Last Name:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="lastName" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
			<tr>
			<fieldset title="Text">
				<td><label for="email">
			    Email:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="email" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
			<tr>
			<fieldset title="Text">
				<td><label for="sex">
			    Sex:			      </label></td>
		  <td><div align="left">
		    <label>
		    <input type="radio" name="sex_type" id="male" value="male">
		    Male</label>
		    <label>
		     <input type="radio" name="sex_type" id="female" value="female">
		    Female</label>
		  </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="age">
			    Age:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="age" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="profession">
			    Profession:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="profession" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="city">
			    City:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="city" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="ensanche">
			    District:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="ensanche" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="truth">
			    Truth:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="truth" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="firstLie">
			    First Lie:			      </label></td>
		  <td><div align="left">
				  <input type="text" name="firstLie" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
				<td><label for="secondLie">
				  Second Lie:			      </label></td>
				<td><div align="left">
				  <input type="text" name="secondLie" value="" maxlength="50" size="70">
			    </div></td>
			</fieldset></tr>
            <tr>
			<fieldset title="Text">
			<td><label for="active">
		    Activate User:		      </label></td>
		  <td><p align="left"><input type="checkbox" name="active" id="active">
			      <label for="active">Active</label>
</p>		    </td>
			</fieldset></tr>
		  </table>
<p>
	          <input type="submit" name="Submit" value="Insert">
          </p>
	  </div>
		<div class="formFooter"></div>
		
	</form>

  <table id="contentTable">
  <thead>
			<tr class="formHeader">
			  <th width="5%">Edit</th>
			  <th width="5%">Delete</th>
				<th width="10%">No.</th>
				<th width="20%">First Name</th>
				<th width="20%">Last Name</th>
				<th width="15%">Email</th>
                <th width="10%">Active</th>
			</tr>
		</thead>
		<tbody>
			<?
					$Index = 0;
					while ($row_sql = mysql_fetch_row($result_sql))
					{ 	
						$ID = mysql_result($result_sql,$Index,'ID');
						$firstName = mysql_result($result_sql,$Index,'firstName');
						$lastName = mysql_result($result_sql,$Index,'lastName');
						$email = mysql_result($result_sql,$Index,'email');
						$sex = mysql_result($result_sql,$Index,'sex');
						$age = mysql_result($result_sql,$Index,'age');
						$profession = mysql_result($result_sql,$Index,'profession');
						$city = mysql_result($result_sql,$Index,'city');
						$ensanche = mysql_result($result_sql,$Index,'ensanche');
						$truth = mysql_result($result_sql,$Index,'truth');
						$firstLie = mysql_result($result_sql,$Index,'firstLie');
						$secondLie = mysql_result($result_sql,$Index,'secondLie');						
						$active = mysql_result($result_sql,$Index,'active');
						$Index++;
				?>
			<tr>
			  <td class="tdRow"><a href="users_proc.php?ActionType=UPDATE&ID=<? echo $ID;?>"><img src="images/iedit.gif" alt="edit" width="16" height="16" border="0"></a></td>
			  <td class="tdRow"><a href="users_proc.php?ActionType=DELETE&ID=<? echo $ID;?>"><img src="images/idelete.gif" alt="delete" width="16" height="16" border="0"></a></td>
				
				<td class="tdRow"><? echo $Index."."; ?></td>
				<td class="tdRow"><div align="left"><? echo $firstName ; ?></div>			    </td>
				<td class="tdRow"><div align="left"><? echo $lastName ; ?></div>			    </td>
				<td class="tdRow"><div align="left"><? echo $email; ?></div>			    </td>
				<td class="tdRow"><div align="left"><? echo $active; ?></div>			    </td>
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

