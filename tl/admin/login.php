<html>
<head>
<title>:: Administration ::Truths &amp; Lies</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
<style type="text/css">
<!--
.style1 {font-family: "Trebuchet MS", sans-serif}
.style2 {
	font-size: 14px;
	font-weight: bold;
}
.style3 {font-size: 14px}
.style4 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
}
.style5 {color: #FFFFFF}
.style6 {
	font-family: "Trebuchet MS", sans-serif;
	font-weight: bold;
	font-size: 36px;
}
.style7 {
	font-family: "Trebuchet MS", sans-serif;
	font-size: 24px;
}
.style8 {
	font-family: "Trebuchet MS", sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<script>
function provera(form) {ejoj1=0;ejoj2=0;
	if (form.un.value=='') {alert('You did not enter username!');ejoj1=1;
	}
	if (form.pw.value=='') {alert('You did not enter password!');ejoj2=2;
	}
	switch (ejoj1+ejoj2) {
		case 1:form.un.focus();form.un.select();break;
		case 2:form.pw.focus();form.pw.select();break;
		case 3:form.un.focus();form.un.select();break;
	}
	if (ejoj1+ejoj2==0) {return true;
	}
	else return false;
}
</script>
<link rel="Stylesheet" type="text/css" href="../style.css">
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<form ACTION="checklogin.php" METHOD="post" id="form1" NAME="form1" target="_self"> 
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
      	<td valign="top" bgcolor="#000000">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="150" valign="top" bgcolor="#000000">&nbsp;</td>
			  <tr>
					<td bgcolor="#333333">
					<table align="center">
						
				  <tr>
				    <td colspan="2" align="center" valign="top" class="titleb style1">&nbsp;</td>
				    </tr>
				  <tr>
				    <td colspan="2" align="center" valign="top" class="titleb style1">&nbsp;</td>
				    </tr>
				  <tr>
							<td colspan="2" align="center" valign="top" class="titleb style5 style6">Truths &amp; Lies</td>
</tr>
						
						<tr>
							<td colspan="2" align="center" valign="top" class="t02 style8">Administration</td>
					  </tr>
<tr>
							<td valign="top" align="center" class="t02" colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" align="center" valign="top" class="titleb style3 style2 style5 style7">&nbsp;</td>
</tr>
						<tr>
							<td valign="top" align="center" class="t02" colspan="2">&nbsp;</td>
						</tr>
						
						
						<tr>
							<td valign="middle" align="right"><p align="right" class="style3 style1"><strong><span class="style4">username</span></strong></p></td>
<td valign="top" align="left">
									<input type="text" name="un" value="">							</td>
						</tr>
						<tr>
                  			<td align="right" valign="middle" class="style2"><p align="right" class="style4">password</p></td>
<td valign="top" align="left">
									<input type="password" name="pw" value="">							</td>
						</tr>
						<tr>
						  <td valign="top" align="right">&nbsp;</td>
						  <td valign="top" align="left"><input type="submit" name="submit" value="Submit"></td>
					  </tr>
						<tr>
						  <td colspan="2" align="right" valign="top">&nbsp;</td>
					  </tr>
						<tr>
							<td colspan="2" align="right" valign="top"><p>&nbsp;</p></td>
						</tr>
					</table>
			    </td>
			  </tr>
			</table>
		</td>
	</tr>
</table>
</form>
</body>
</html>
