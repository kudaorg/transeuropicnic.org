<? 
if(!empty($_POST['myName']) || !empty($_POST['myEmail']) || !empty($_POST['friendsName']) || !empty($_POST['friendsEmail'])){    

$myName = $_POST['myName'];    
$myEmail = $_POST['myEmail']; 
$friendsName =  $_POST['friendsName'];  
$friendsEmail = $_POST['friendsEmail'];


$body .= "--MIME_BOUNDRY\n";
$body .= "Content-Type: text/html; charset=\"utf-8\"\n";
$body .= "Content-Transfer-Encoding: 8bit\n";


$body .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
$body .= "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
$body .= "<head>\n";
$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
$body .= "<style type=\"text/css\">\n";
$body .= "<!--\n";
$body .= ".style1 {color: #FF0000}\n";
$body .= ".style2 {\n";
$body .= "font-size: 14;\n";
$body .= "font-family: Verdana, Arial, Helvetica, sans-serif;\n";
$body .= "font-weight: bold;\n";
$body .= "}\n";
$body .= ".style3 {color: #666666}\n";
$body .= "-->\n";
$body .= "</style>\n";
$body .= "</head>\n";
$body .= "<body>\n";
$body .= "<table width=\"81%\" border=\"0\">\n";
$body .= " <tr>\n";
$body .= "    <td width=\"20%\"><img src=\"http://test.kuda.org/tl/logo.jpg\" width=\"242\" height=\"293\" /></td>\n";
$body .= "    <td width=\"80%\"><p class=\"style2\"><span class=\"style1\">$friendsName, $myName</span> <span class=\"style3\">the ha invitado a participar en el juego de verdad y mentira.</span></p>\n";
$body .= "      <p class=\"style2\"><span class=\"style3\"> Diviertete adivinando las verdades de la gente y gana premios.</span></p>\n";
$body .= "      <p class=\"style2\">&nbsp;</p>\n";
$body .= "    <p><a href=\"http://www.truthsandlies.com/\"><img src=\"http://test.kuda.org/tl/web.jpg\" width=\"237\" height=\"23\" border=\"0\"/></a></p></td>\n";
$body .= "  </tr>\n";
$body .= "</table>\n";
$body .= "</body>\n";
$body .= "</html>\n";

$body .= "--MIME_BOUNDRY--\n";


$subject = $myName ." te invita a ver";    


$header = "From: Truths&Lies\n";    
$header .= "Reply-To: $myEmail\n";    
$header .= "X-Mailer: PHP/" . phpversion() . "\n";    

$header .= "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/alternative;boundary=\"MIME_BOUNDRY\"\n";
$header.="X-Sender: noreply@truthsandlies.com\n";
$header.="X-Priority: 3\n";
$header.="Return-Path: noreply@truthsandlies.com\n";

if(@mail($friendsEmail, $subject, $body, $header)){
	print "output=sent";
} else {
	print "output=error";
}

}else{
	print "output=ERROR";
}

$dummy = "dummy";
print "&dummy=$dummy";
?>





