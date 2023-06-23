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
.style1 {color: #000000}
.style2 {
	color: #FFFFFF;
	font-size: 16px;
}
</style>
<script type="text/javascript" language="javascript" src="include/ui.js"></script>
</head>
<script language="JavaScript">
	<!--
		function ValidateUserInput(Opis,URL)
		{
			
			if (Opis.value == "" && URL.value == "")
			{
				return false;
			}
			if (Opis.value == "" )
			{
				alert ("Please, insert link.");
				return false;
			}
			else if (URL.value == "")
			{
				alert ("Please, insert URL.");
				return false;
			}
			
		}
	<!-- //-->
</script>
<body onLoad="applyHandlers()">
<div id="header">
	<div id="headerContent">
	  <div id="infoArea">
	    <h1 align="left">Truths &amp; Lies</h1>
	  </div>
  </div>
</div>
  <div id="page">
  <div id="menuArea"> 
    <div class="menuBox"> 
      <div class="menuTitle"> <img src="images/iminus.gif" width="16" height="16" onMouseDown="toggleMenu('menu1', this)">	
        <h3 class="style2">Administration</h3>
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
include('db_close.php');
?>

</div>
</body>
</html>

