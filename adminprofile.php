<?php session_start();
include_once("bestgigclasses.php");

if(!isset($_SESSION['admin_email']) AND !isset($_SESSION['admin_pwd'])){
  header("location: adminlogin.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Page - <?php echo APP_NAME ?>.com</title>
		
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
					<h4>This is the Admin Page for <?php if (!empty($_SESSION['admin_email'])) {
						echo $_SESSION['admin_email'];
						} ?> </h4>
				</div>
				<div class="col-md-3">
					<a class="btn btn-warning" href="adminsessionlogout.php">Log out</a>
				</div>
			</div>

			<!-- ADMIN DP DEPRECATED TILL V.2 -->
			<!-- <div class="row">
				<div class="col-md-9">
					<?php

					// if (!empty($_SESSION['admin_email'])) {
					//  	echo $value['admin_picture'];
					//  }
	          ?>
				</div>
			</div> -->

			<div class="row mt-3 mb-3">
				<div class="col-md-3 ml-4 mb-3">
					<a href="images/adminimage2.png"><img src="images/adminimage2.png"></a>
				</div>
				<div class="col-md-5 mb-3">
					<div class="row mb-2">
						
						<div class="col-md-12 ml-4">
							<h2 class="text-center">Administrator Panels</h2>	
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-md ml-5">
							<div class="mb-4 d-grid gap-2 col-6 mx-auto">
								<a class="btn btn-outline-info btn-lg btn-block" href="userlist.php">Users Directory</a>
							</div>
							<div class="mb-4 d-grid gap-2 col-6 mx-auto">
								<a class="btn btn-outline-info btn-lg btn-block" href="project-directory.php">Projects Directory</a>
							</div>
							<div class="mb-4 d-grid gap-2 col-6 mx-auto">
								<a class="btn btn-outline-info btn-lg btn-block" href="bids-directory.php">Bids Directory</a>
							</div>
							<div class="mb-4 d-grid gap-2 col-6 mx-auto">
								<a class="btn btn-outline-info btn-lg btn-block" href="listcategory.php">Skill Categories Panel</a>
							</div>
							<div class="mb-5 d-grid gap-2 col-6 mx-auto">
								<a class="btn btn-outline-info btn-lg btn-block" href="paymentlist.php">Payment Panel</a>
							</div>
							<div class="mt-5">
								<p class="h5 text-center text-danger">Always Remember</p>
								<p class="text-center">We work for the <strong>Ordinary</strong> people</p>
								<p class="text-center">Therefore, we must render <strong>Extra-Ordinary</strong> duty!</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<a href="images/adminimage3.png"><img src="images/adminimage3.png"></a>
				</div>
			</div>
		</div>
		<!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->

    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->
	</body>
</html>	