<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['admin_email']) AND !isset($_SESSION['admin_pwd'])){
  header("location: adminlogin.php");
  exit;
}

// create object of bids class
$obj = new Bids;

// fetch a specific bid data based on the bid id
if (isset($_GET['bidid'])) {
	$bidsubmitted = $obj->getBids($_GET['bidid']);

}

// update bid details
if (isset($_POST['submit'])) {
	
	// reference update bid method
	$output = $obj->updateBid($_POST['bidproposal'],$_POST['bidamount'],$_POST['bidtimeframe'],$_POST['bidstatus']);
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title><?php echo APP_NAME ?> - Edit Bids Page</title>
    
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
      }) 
      </script>
  </head>
	<body>
		<!--MAIN NAVIGATION BAR-->
	    <div id="includemainnavbar"></div>
	  	<!--Main Navbar-->

		<div class='container'>
				<div class="row">
					<div class='col-md-6'>
						<h2>Edit This Bid:</h2>
					</div>
				</div>
        <div class="row">
          <div class="mt-2">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="md-form mb-3">
                <label>1. Bid Description</label><br>
                <input class="form-control validate text-success" id="bidproposal" name="bidproposal" value="<?php if(isset($_GET['bidproposal'])){echo $_GET['bidproposal'];} ?>">
              </div>

              <div class="md-form pb-3">
                <label data-error="wrong" data-success="right">2. Bid Amount</label><br>
                <input type="number" id="bidamount" name="bidamount" class="form-control validate text-success" value="<?php if(isset($_GET['bidamount'])){echo $_GET['bidamount'];} ?>">
              </div>
              <div class="md-form pb-3 mb-4">
                <label data-error="wrong" data-success="right" for="Form-pass5">3. Proposed timeframe to complete the project</label><br>
                <small>Number of days.</small>
                <input type="number" name="bidtimeframe" class="form-control validate text-success" value="<?php if(isset($_GET['bidtimeframe'])){echo $_GET['bidtimeframe'];} ?>">
              </div>

              <!--Grid column-->
              <div class="text-center mb-3 col-md-12">
                <button type="submit" class="btn btn-warning btn-block btn-rounded z-depth-1">Edit this Bid</button>
              </div>
            </form>
            <!--Grid column-->
          </div>
        </div>
      </div>
				
		<!-- Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>