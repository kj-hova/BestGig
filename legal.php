<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to bestgig.com</title>
		<meta name='keyword' content='bestgig, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john KJ idehai'>
		<meta name='description' content='bestgig is a crowdsourcing platform that matches projects and workers in Nigeria.'>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
     $(function(){
      $("#includemainnavbar").load("mainnavbar1.php");
      $("#includeloginmodal").load("loginmodal.php");
    }) 
    </script>
	</head>
	<body>
	<!--MAIN NAVIGATION BAR-->
	  <div id="includemainnavbar"></div>
  <!--Main Navbar-->
<!--Auxiliary Navbar-->
  <div class="container legal">
    <div class="row">
      <div class="col text-justify">
        <h4 class="headline" id="privacypolicy">Privacy Policy</h4>
        <small>
          <?php
            include('textfile/bestgig_privacypolicy.txt');
          ?>
        </small>
      </div>
    </div><hr><br>
		<div class="row">
			<div class="col text-justify">
        <h4 class="headline" id="codeofconduct">BestGig Code of Conduct</h4>
        <small>
          <?php
            include('textfile/bestgig_conductcode.txt');
          ?>
        </small>
			</div>
    </div><hr><br>
    <div class="row">
      <div class="col text-justify">
        <h4 class="headline" id="useragreement">BestGig User Agreement</h4>
        <small>
          <?php
            include('textfile/bestgig_useragreement.txt');
          ?>
        </small>
      </div>
		</div><hr><br>
    <!--Auxiliary Navbar-->
    <!--MODAL FORM FOR LOGIN-->
    <div id="includeloginmodal"></div>    
    <!-- Modal For Login -->
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