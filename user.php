<?php session_start();
include_once("bestgigconstants.php");
include_once("bestgigclasses.php");

if(!isset($_SESSION['user_email']) AND !isset($_SESSION['user_pwd'])){
  header("location: userlogin.php");
  exit;
}

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
}else{
  $msg = "";
}
        
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
		<title><?php echo APP_NAME ?>.com - User Profile</title>

    <!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig user page, <?php echo APP_NAME ?> member, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> user profile page. <?php echo APP_NAME ?> is the leading general service crowdsourcing and freelancing app in Nigeria'>
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
      $("#includemainnavbar").load("mainnavbar3.php");
      $("#includeauxnavbar").load("auxnavbar3.php");
      $("#includefooter").load("footer.php");
    }) 
    </script>
    <!-- End of JS -->
	</head>
	<body>
    <!--MAIN NAVIGATION BAR-->
    <div id="includemainnavbar"></div>
    <!--Main Navbar-->

    <!--AUXILIARY NAVIGATION BAR-->
    <div id="includeauxnavbar"></div>
    <!--Main Navbar-->

		<div class="container-fluid mt-2">
      
      <!-- Grid row -->
			<div class="row mb-3 justify-content-center">
				<div class="col-md-7">
          
          <!-- Sub-grid row -->
          <div class="row mb-3">
            <!-- Profile Image -->
            <div class="col">
              <img src="workimg/<?php if(isset($_SESSION['user_picture'])){
                echo $_SESSION['user_picture'];
              } ?>" class="img-rounded img-fluid mt-2" id="dp" alt="Display Picture">
            </div>

            <div class="col">
              <div>
                <!-- Profile Name -->
                <small><i>Name</i></small><br>
                <strong><?php if (isset($_SESSION['user_fname'])) {
                  echo ($_SESSION['user_fname']." ".$_SESSION['user_lname']);
                } ?></strong>
              </div>

              <!-- Date User Joined -->
              <div>
                <small><i><?php echo APP_NAME ?> Member since:</i></small>
                <p><?php if (isset($_SESSION['user_datereg'])) {
                  echo $_SESSION['user_datereg'];
                } ?></p>
              </div>

              <!-- Current Membership Type -->
              <div>
                <small>Type of Member</small>
                <p><?php if (isset($_SESSION['memtype_id'])) {
                  echo $_SESSION['memtype_id'];
                } ?></p>
              </div>
            </div>
          </div>

          <!-- Sub-grid row -->
          <div class="row mb-3">
            <div class="col">
              <h6>Welcome <?php if (isset($_SESSION['user_fname'])) {
                echo $_SESSION['user_fname'];
                } ?>!</h6>
              <p><?php if (isset($_SESSION['user_description'])) {
                echo $_SESSION['user_description'];
                } ?></p>
            </div>
          </div>

          <!-- Sub-grid row -->
          <div class="row">
            <div class="col table-responsive-sm">
              <p class="h5">Your Activity Dashboard</p>
              <table class="table table-responsive-sm table-bordered table-striped border-light table-dark table-sm table-hover table-condensed table-active align-top">
                <tbody>
                  <tr>
                    <th>Total projects posted</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Total bids</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Successful bids</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Total projects completed</th>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Sub-grid row -->
          <div class="row mb-1"><p class="justify-content-center"><?php echo ($msg); ?><p></div>
          <div class="row mb-3">
            <div class="col ml-1">
              <div class="ml-3">
                <a href="#" class="btn btn-rounded btn-success btn-md mt-4">Accept New Projects</a>
              </div>
              <div class="ml-3">
                <span class="text-danger mt-1">Someone wants to hire you!</span><br>
                <span class="text-maroon">Accept new project.</span>
              </div>
            </div>
            <div class="col ml-1">
              <div class="ml-3">
                <a href="updateproject.php" class="btn btn-rounded btn-light btn-md mt-4">My Projects</a>
              </div>
              <div class="ml-3">
                <span class="text-light mt-1">Track your existing projects!</span><br>
                <span class="text-maroon">Accept new project.</span>
              </div>
            </div>
            <div class="col">
              <div class="ml-3">
                <a href="postproject.php" class="btn btn-rounded btn-info btn-md mt-4">Post New Project</a>
              </div>
              <div class="ml-3">
                <span class="text-light mt-1">Post a new project</span><br>
                <span class="text-maroon">& receive bids now.</span>
              </div>
              
            </div>
          </div>

          <!-- Sub-grid row -->
          <div class="row mb-3">
            <!-- RATINGS DIV (to be incorporated in v.2) -->
            <!-- <div class="col">
              <p>Rating</p>
              <span class="fa fa-star-half checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span><br><br>
              <button type="button" class="btn btn-outline-success btn-md" onclick="review()">See your reviews</button>
            </div> -->
            <!-- REVIEW DIV (to be incorporated in v.2) -->
            <!-- <div class="col-3">
              <p id="rev"></p>
            </div> -->
          </div>

          <!-- Sub-grid row -->
          <div class="row mb-3">
            <div class="col mt-3 table-responsive-sm justify-content-between">
              <table class="table table-bordered table-secondary table-hover table-responsive-sm table-condensed text-success border-success table-condensed align-center">
                <thead>
                  <tr>
                    <th>Gender</th>
                    <th>Telephone</th>
                    <th>Email Address</th>
                    <th>Skills</th>
                    <th>Skill Category</th>
                    <th>Location</th>
                    <th>LCDA</th>
                    <th>State</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php if (isset($_SESSION['user_gender'])) {
                        echo $_SESSION['user_gender'];
                      } ?>
                    </td>
                    <td><?php if (isset($_SESSION['user_phone'])) {
                        echo $_SESSION['user_phone'];
                      } ?>
                    </td>
                    <td><?php if (isset($_SESSION['user_email'])) {
                        echo $_SESSION['user_email'];
                      } ?>
                    </td>
                    <td>Skills</td>
                    <td><?php if (isset($_SESSION['skillcategory_id'])) {
                        echo $_SESSION['skillcategory_id'];
                      } ?>
                    </td>
                    <td><?php if (isset($_SESSION['user_street'])) {
                        echo $_SESSION['user_street'];
                      } ?>
                    </td>
                    <td><?php if (isset($_SESSION['localgov_id'])) {
                        echo $_SESSION['localgov_id'];
                      } ?>
                    </td>
                    <td><?php if (isset($_SESSION['states_id'])) {
                        echo $_SESSION['states_id'];
                      } ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
		</div>
    
    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->

  <!-- Vestigial JS retained for v.2 -->
	<!-- <script type="text/javascript" language="javascript">
    function review(){
      document.getElementById("rev").innerHTML = "Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time.";
    }
	</script> -->
    

		<!-- Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>