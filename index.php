<?php
include ("bestgigconstants.php");
include ("bestgigclasses.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
		<title><?php echo APP_NAME ?>.com - Home Page</title>

    <!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig work, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> app is a freelancing and crowdsourcing platform in Nigeria that enablesmembers to post and bid for projects. All payments are executed in-app upon completion of the project.'>
    <!-- End of SEO Meta Tags -->

		<!-- OTHER REQUIRED TAGS/LINKS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- BestGig Custom CSS -->
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- End of Required Tags -->
    
    <!-- JS TO INCLUDE EXTERNAL PAGES -->
    <script>
    $(function(){
      $("#includemainnavbar").load("mainnavbar1.php");
      $("#includefooter").load("footer.php");
    });
    </script>
    <!-- End of JS -->
    
	</head>
	<body>
    <!--MAIN NAVIGATION BAR-->
		<div id="includemainnavbar"></div>
    <!--Main Navbar-->
		
    <!--BANNER 1-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12" id="bannerdiv1">
            <div id="alignVertical" class="align-items-center">
                <h1 class="text-center">ONE  STOP  SHOP</h1>
                <h6 class="text-center">Find all the skills required</h6>
                <h6 class="text-center">to complete your project</h6>
            </div>
				</div>
			</div>
		</div>
    <hr>
    <!-- End Banner 1 -->

    <!-- BANNER 2 -->
    <div class="container-fluid" class="overlayBanner">
      <div class="row">
        <div class="col" id="bannerdiv2">
          <div id="alignVertical" class="align-items-center">
            <h1 class="text-center">COST  EFFECTIVE</h1>
            <h6 class="text-center">Why keep staff for redundant periods</h6>
            <h6 class="text-center">when you can pay for specific job done?</h6>
          </div>
        </div>
      </div>
    </div><hr>
    <!-- End Banner 2 -->

    <!-- BANNER 3 -->
    <div class="container-fluid" class="overlayBanner">
      <div class="row">
        <div class="col" id="bannerdiv3">
          <div id="alignVertical" class="align-items-center">
            <h1 class="text-center">REMAIN EMPLOYED</h1>
            <h6 class="text-center">Bid for more projects</h6>
            <h6 class="text-center">and never stop earning a living!</h6>
          </div>
        </div>
      </div>
    </div><hr>
    <!-- End Banner 3 -->

    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->

		<!-- Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
</html>