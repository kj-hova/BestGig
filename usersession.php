<?php session_start();

	if (!empty($_SESSION['email'])) {
		//echo "<h3>You are not logged in</h3>";
		//echo "<a href='login.php'>Login here</a>";
		require_once("location:user.php");
	}else{
		// echo "<h5>Welcome Admin</h5><br>Please ensure to log out when you are done.";
		// echo "<a href='adminlogout.php'>Logout</a>";
		require_once("location:index.php");
	}

?>