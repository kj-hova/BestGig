<?php session_start();
include_once("bestgigconstants.php");
include_once("bestgigclasses.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Community Page - <?php echo APP_NAME ?>.com</title>
		<meta name='keyword' content='bestgig, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john KJ idehai'>
		<meta name='description' content='bestgig is a crowdsourcing platform that matches projects and workers in Nigeria.'>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
     $(function(){
      $("#includemainnavbar").load("mainnavbar1.php");
      $("#includefooter").load("footer.php");
    }) 
    </script>
	
	</style>
	</head>
	<body>
	<!--MAIN NAVIGATION BAR-->
	   <div id="includemainnavbar"></div>
  <!--Main Navbar-->
		<!--AUXILIARY NAVIGATION BAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="nav-link" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      <li class="nav-item dropdown nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Artisan</a>
          <a class="dropdown-item" href="#">Tutors</a>
          <a class="dropdown-item" href="#">Cooks</a>
        </div>
      </li>
      
    </ul>
  </div>
</nav>
<!--Auxiliary Navbar-->


		<!--BANNER 1-->
    <div class="container-fluid">
      <div class="row" id="extrabanner">
        <div class="col-md-2 d-flex align-items-center" id="">
          <h5>Become an expert</h5><br>
        </div>
        <div class="col-md-2 d-flex align-items-center">
          <h1 id="BestGigscreamer"><?php echo APP_NAME ?></h1>
        </div>
        <div class="col-md-1 d-flex align-items-center">
          <h4>User</h4>
        </div>
        <div class="imageholder col-md-6">
          <img src="images/modalbg.jpg" class="img-fluid" alt="Responsive image">
        </div>
      </div>
      <div class="row justify-content-center mt-1 mb-2 mx-auto">
        <button class="btn ml-5 btn-outline-dark">How to post projects</button>
        <button class="btn ml-5">Get the best reviews</button>
        <button class="btn ml-5">How to bid for projects</button>
        <button class="btn ml-5">Visit our community page</button>
      </div>
      <div class="row justify-content-center mx-auto" id="extrabanner"><br>
        <div class="col-md-6 offset-6">
          <span>Don't have a <?php echo APP_NAME ?> account?</span>
          <a href="" class="btn btn-sm btn-rounded btn-outline-dark" data-toggle="modal" data-target="#signupdarkModalForm">Sign Up</a>
        </div>
        <div class="col-md-6 offset-6 align-items-end">
          <span>Already a member?</span>
          <a href="" class="btn btn-sm btn-rounded btn-outline-success" data-toggle="modal" data-target="#logindarkModalForm">Log in</a>
        </div><br>
      </div>
      <div class="row">
        <div class="col-md-12 justify-text mt-4">
          <h3 id="aboutus">About the <?php echo APP_NAME ?> Family</h3>
          <?php
            include('textfile/bestgig_aboutus.txt');
          ?>
        </div>
      </div>
      <!--Footer-->
      <div id="includefooter"></div>    
      <!-- Footer ends -->
    </div>


    



	</body>
	<script type="text/javascript" language="javascript">

		
	</script>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

		<script type="text/javascript" language="javascript">
		 

		</script>
	</body>
</html>