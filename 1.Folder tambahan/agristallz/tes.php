<?php
include "connect.php";
	$email = "tasmanusia@gmail.com";
	$sql = "SELECT * FROM user WHERE email = '$email'";
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);


$r = mysqli_fetch_assoc($res);
$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
$headers = "From : vivek@codingcyber.com";
mail($to, $subject, $message, $headers)

?>