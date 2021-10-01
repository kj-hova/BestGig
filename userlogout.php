<?php
	$cookie_name = "username";
	$cookie_value = $_POST['username'];

	setcookie($cookie_name, '', time() - 20, "/");

	header("location:index.php");
?>