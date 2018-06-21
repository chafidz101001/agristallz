<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$db = mysqli_connect('localhost', 'root', '', 'agristall');
if (isset($_GET['logout_user'])) {
	  	session_destroy();
	  	//unset($_SESSION['email']);
	  	unset($_SESSION['email']);
	  	header("location: index.php");
	  }

?>