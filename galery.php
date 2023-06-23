<html>
<head>
<title>trans_european galery</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#7B901C" >
<form enctype="multipart/form-data" action="galery_handler.php" method="post" name="galery">
<input type="hidden" name="img_src" value="<?php echo $IMG_SRC;?>">
<input type="hidden" name="path" >
<table width="100%" height="50%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="2">
  <tr> 
    <td width="20%" align="right" valign="top">
	<pre><?php echo $LIST;?></pre></td>
    <td width="1%" align="right" valign="top">&nbsp;</td>
    
    <td width="50%" align="left" valign="top"><img id="image" src="images/noImg.gif"></td>
    <td width="30%">&nbsp;</td>
  </tr>
</table><?php echo $INFO;?>
</form>
<script>
function SetImage(source){
var img = new Image();
img.src = source;
document.getElementById('image').src = source;
if (img.height > img.width) {document.getElementById('image').height = 651; document.getElementById('image').width = 488;}
else {document.getElementById('image').height = 488; document.getElementById('image').width = 650;}

}

function switchClass(old_i, new_i){
if (old_i!='')
document.getElementById(old_i).className = 'img_link';
document.getElementById(new_i).className = 'img_linkB';

}
</script>
</body>
</html>
