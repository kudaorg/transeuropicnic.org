<? 
$conn = mysql_connect("localhost", "jelenak", "tortoise");
$qResult = mysql_query ("SET NAMES utf8;", $conn);
if (!$conn)
{
	echo 'Error: It is not possible to connect with MySQL Server. Please, try again later.';
	exit;
}
?>