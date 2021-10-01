<!-- SUPER ADMIN PAGE, SOLELY FOR CREATION OF NEW ADMIN CREDENTIALS.
	 PAGE TO BE STANDARDDIZED FOR VERSION 2 -->
<?php
	include('bestgigclasses.php');

	if(!empty($_POST)){
		if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])){
			$msg = "<div class='alert alert-danger'>Please supply all the required fields</div>";
		}

		if(empty($msg)){
			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$admin_obj = new Admin;
			$outcome=$admin_obj->createAdmin($fname, $lname, $email, $password);
			$msg = "<div class='alert alert-success'>New admin successfully created</div>";
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
	
	<div class="container" id="adminer">
		<div class="row justify-content-center">
		<?php
			if(!empty($outcome)){
				echo "$msg";
			}

		//  if(!empty($msg)){
		// 	echo "<div class='alert alert-danger'>$msg</div>";
		// }else{
		// 	echo "<div class='alert alert-success'>Hello, creation of new Admin was succesful.</div>";
		// }
		?>
		</div>
		<div class="row" mt-5>
			<div class="col-md-4" id="wallpaper">
				<h2>Welcome To BestGig Admin Link</h2>
				<p>Please login with your administrator credentials</p>

				<a href="adminlogin.php"  class="btn">Sign in</a>
			</div>
			<div class="col-md-8 reg">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2>Register New Administrator</h2>
						<form action="" method="post">
					<div class="form-group">
 						<label><span id="importante">*</span>First Name:</label>
						<input type='text' name="firstname" class="form-control">
					</div>
					<div class="form-group">
 						<label><span id="importante">*</span>Surname:</label>
						<input type='text' name="lastname" class="form-control">
					</div>
					<div class="form-group">
						<label><span id="importante">*</span>Email:</label>
						<input type='email' name="email" class="form-control">
					</div>
					<div class="form-group">
						<label><span id="importante">*</span>Password:</label>
						<input type='password' name="password" class="form-control">
					</div>
					<!-- Image Upload -->
			        <!-- <div class="form-outline mb-4">
			          <label style="font-weight: bold;">Upload Image</label>
			          <input type="file" name="adminpix" id="adminpix"><br>
			          <small><i>Upload your profile image in jpeg, jpg, pnd or webp formats only. Not more than 2mb size.</i></small>
			        </div> -->
					<input type="submit" name="submit" value="Register Admin" class="btn">
				</form>
				</div>
				<div class="col-md-2"></div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>