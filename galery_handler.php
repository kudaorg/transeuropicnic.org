<?php
$base = getcwd();
if (!isset($_POST['path'])) {
	chdir('upload'); 
} else{
	chdir($_POST['path']);// path 
}
//$INFO .="<br>show content of ".getcwd();
showContent(getcwd(), &$LIST);
function showContent($path, $list){
global $INFO;
//$INFO .= "<br>current dir is ".$path;
findPath($path, &$real_path);
if ($handle = opendir('.')){
	while (false !== ($file = readdir($handle))) {
		if (is_dir($file)){ 
	 		if ($file!="." && !($file==".." && $real_path=="upload/")) 
				$list .="<label id='".$real_path.$file."' class=\"dir\" onClick=\"this.form.path.value=this.id; this.form.submit();\" onMouseOver=\"window.status=this.id; return true;\" onMouseOut=\"window.status=''; return true;\"> ... . . .  .    $file\</label><br>";	
				//$INFO .= "<br>current dir is ".$file."<br>";
		} else { 	
	    	if (!eregi(".db", $file))	
				$list .="<label id=".$real_path.$file." class=\"img_link\" onClick=\"switchClass(this.form.img_src.value, this.id); this.form.img_src.value=this.id; SetImage(this.id); \" onMouseOver=\"window.status=this.id; return true;\" onMouseOut=\"window.status=''; return true;\">$file</label><br>";
				//$INFO .= "<br>current file is ".$file."<br>";
		} 
	}
	closedir($handle);
}
}

function findPath($path, $real_path){
 if (basename($path)!='www'){
	$real_path= basename($path)."/".$real_path;
	findPath(dirname($path), &$real_path);
 }
}


include "galery.php";

?>