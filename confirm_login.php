<?php
session_start();

if (($_POST['username']== "eprot3") && ($_POST['password']=="3torpe")) 
	 {
	  $_SESSION['name'] = $_POST['username'];
	  $_SESSION['pass'] = $_POST['password'];
	  header("Location:upload_handler.php");
	 }
	else { $INFO .= "<script>alert('incorrect username and password');</script>"; include "login.php";}


?>
