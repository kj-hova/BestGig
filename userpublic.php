<?php
include_once("bestgigconstants.php");
include_once("bestgigclasses.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo APP_NAME ?>.com</title>
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
      $("#includefooter").load("footer.php");
    }) 
    </script>
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

		<div class="container-fluid">
      <?php
        //create object of user class
        $obj = new User;
        $userid = $_GET['user_id'];
        $user = $obj->getUser($userid);

        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        if (!isset($userid)) {
          echo "<span class='alert alert-danger'>This user profile is non existent</span>";
        }else{
         $query="SELECT * FROM user ORDER BY user_id";
      ?>
			<div class="row mt-3">
				<div class="col-2">
          <img src="workimg/<?php echo $_GET['user_picture']; ?>" class="img-rounded img-fluid mt-2" id="dp" alt="Display Picture">
        </div>
        <div class="col">
          <input type="text" class="form-control" readonly="" value="<?php echo $_GET['user_fname']." ".$_GET['user_lname']; ?>"><br>
          <input type="text" class="form-control" readonly="" value="<?php echo $_GET['user_datereg']; ?>"><br>
          <input type="text" class="form-control" readonly="" value="<?php echo $_GET['memtype_id']; ?>"><br>
				</div>
        <div class="col-4">
          <p>Rating</p>
          <span class="fas fa-star-half checked"></span>
          <span class="fas fa-star checked"></span>
          <span class="fas fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span><br><br>
          <button type="button" class="btn btn-outline-success btn-sm" onclick="review()">See the user's reviews</button><br>
          <br><button class="btn btn-rounded btn-alert btn-md"><a href="workerhireform.php?user_id=<?php echo $_GET['user_id'];?>&&user_fname=<?php echo $GET['user_fname'];?>&&user_lname=<?php echo $GET['user_lname'];?>" class="text-light">Hire this worker</a></button>
        </div>
        <div class="col-3">
          <p id="rev"></p>
        </div>
			</div><br>
      <div class="row">
        <div class="col">
          <h6> Hi, I am <?php echo $_GET['user_fname']; ?></h6>
          <p><?php echo $_GET['user_description']; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
            <table class="table table-hover table-responsive-sm table-condensed">
              <thead>
                <tr>
                  <th>Gender</th>
                  <th>Telephone</th>
                  <th>Email Address</th>
                  <th>Skills</th>
                  <th>Skill Category</th>
                  <th>LCDA</th>
                  <th>State</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $_GET['user_gender']; ?></td>
                  <td><?php echo $_GET['user_phone']; ?></td>
                  <td><?php echo $_GET['user_email']; ?></td>
                  <td>Skills</td>
                  <td><?php echo $_GET['skillcategory_id']; ?></td>
                  <td><?php echo $_GET['localgov_id']; ?></td>
                  <td><?php echo $_GET['states_id']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <h6>Activity Count</h6>
            <table class="table">
              <tbody>
                <tr>
                  <td>Total projects posted</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Total bids</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Successful bids</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Total projects completed</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <!-- FOOTER -->
      <div id="includefooter"></div>
      <!-- footer ends -->
 
	</body>
	<script type="text/javascript" language="javascript">
    function review(){
      document.getElementById("rev").innerHTML = "Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time. Great job the last time.";
    }
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