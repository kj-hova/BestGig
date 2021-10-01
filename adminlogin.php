<?php session_start();
include('bestgigclasses.php');
	if (isset($_SESSION['admin_email'])) {
			header("location: adminprofile.php");
			exit;
	}

	if(!empty($_POST)){
		$error_msg = '';
	    if(empty(trim($_POST['email']))){
	      $error_msg="<div class='alert alert-warning'>Email is required. Please enter this and retry.</div>";
	    }

	    if(empty(trim($_POST['password']))){
	      $error_msg="<div class='alert alert-warning'>Password is required. Please enter this and retry,</div>";
	    }

	    if (empty($error_msg)) {
	    	
	        $admin = new Admin;
	        $result = $admin->loginAdmin($_POST['email'], $_POST['password']);

	        echo $result;
        	
		}     	
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo APP_NAME ?>.com - Admin Login</title>

		<!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> is a crowdsourcing platform that enables members to post and bid for projects in Nigeria.'>
		<!-- End of SEO Meta Tags -->

		<!-- OTHER REQUIRED TAGS/LINKS -->
		 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	    <!-- BestGig Custom CSS -->
	    <link rel="stylesheet" type="text/css" href="bestgig.css">
	    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	    <!-- End of Required Tags -->
	    
	    <!-- JS TO INCLUDE EXTERNAL PAGES -->
	    <script>
	     $(function(){
	      $("#includemainnavbar").load("adminnavbar.php");
	      $("#includefooter").load("footer.php");
	    }) 
	    </script>
	</head>
	<body>
		<!--MAIN NAVIGATION BAR-->
		 <div id="includemainnavbar"></div>
		<!-- main navbar ends-->

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div>
						<?php if (isset($error_msg)) {
							echo $error_msg;
						} ?>
					</div>

					<!-- LOGIN FORM -->
					<form action="" method="post" id="login">
						<div style="background-color: white;" id="navname" class="mb-3"><?php echo APP_NAME ?>.com Admin Environment.</div>
						<img src="images/logo2_bestgig.png">
						<h3 class="mt-5">Admin login</h3>
						<div class="form-group">
							<label>Email:</label>
							<input type='email' name="email" class="box ml-4">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type='password' name="password" class="box">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Log in" class="btn btn-block">
						</div>
						<!-- <div class="form-group">
							<p>forgot password? <a href="#">click here</a></p>
						</div>	 -->	
					</form>
					<!--login ends-->
				</div>
				<div class="col-md-6 mr-2">
					<a href="images/adminimage.png"><img src="images/adminimage.png"></a>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
	    <div id="includefooter"></div>
	    <!-- footer ends -->
		
		<!-- popper, bootstrap-->
		<script type='text/javascript' src='js/popper.min.js'></script>
		<script type='text/javascript' src='js/bootstrap.js'></script>

	</body>
</html>