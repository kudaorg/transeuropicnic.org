<?
error_reporting(E_ALL);
include_once('db_conn.php');
include_once('db_select.php');

$sql = "SELECT * FROM admin WHERE user_name='".$_POST['un']."' AND password='".$_POST['pw']."' AND log_nivo=1";
$result = mysql_query($sql, $conn) or die(mysql_error());
$result_num = mysql_num_rows($result);
//echo $result_num;
if ($result_num > 0)
	{
	
		setcookie('auth', '1');
		header("location: admin.php");
	}
else
	{
		setcookie('auth', '');	
		header("location: login.php");
	}
?>
