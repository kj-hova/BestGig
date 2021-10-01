<?php
	$cookie_name = "email";
	$cookie_value = $_POST['email'];

	setcookie($cookie_name, '', time() - 20, "/");

	header("location:adminlogin.php");
?>