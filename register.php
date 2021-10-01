<?php session_start();
include('bestgigclasses.php');
  if(!empty($_POST['submit'])){
    if(empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['gender']) || empty($_POST['dob'])) {
      $error_msg = "Please supply all the required fields";
    }

    if(empty($error_msg)){
      $fname = $_POST['firstname'];
      $mname = $_POST['middlename'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];

      include('bestgigclasses.php');
      
      //create object of the user class
      $user_obj = new User;
      //then make reference to create user method
      $outcome = $user_obj->createUser($fname, $mname, $lname, $email, $password, $phone, $gender, $dob);
      $_SESSION['user_fname']=$fname;
      $_SESSION['user_mname']=$mname;
      $_SESSION['user_lname']=$lname;
      $_SESSION['user_email']=$email;
      $_SESSION['user_dob']=$dob;
      $_SESSION['user_phone']=$phone;
      $_SESSION['user_gender']=$gender;
      $_SESSION['user_pwd']=$password;
      $_SESSION['user_id']=$outcome;

        header("Location:userlogin.php?msg=$outcome");
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
		<title><?php echo APP_NAME ?>.com - Registration Page</title>

    <!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig Registration, freelancer sign up, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> Registration form to sign up as a new crowdsourcing freelancing member. Please enter ALL fields correctly before submitting the form'>
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
      $("#includemainnavbar").load("mainnavbar2.php");
      $("#includefooter").load("footer.php");
    }) 
    </script>
    <!-- End of JS -->

	</head>
	<body>
	 <!--MAIN NAVIGATION BAR-->
    <div id="includemainnavbar"></div>
    <!--Main Navbar-->

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <?php 
          if(isset($error_msg)){
            echo "<div class='alert alert-danger'>$error_msg</div>";
          }

          ?>
          <?php 
          if(isset($outcome)){
            echo "<div class='alert alert-success'>$outcome</div>";
          }

          ?>
          <!-- REGISTRATION FORM -->
          <form action="" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label">First name</label>
                  <input type="text" id="firstname" name="firstname" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <label class="form-label">Middle name</label>
                  <input type="text" id="middlename" name="middlename" class="form-control">
                </div>
              </div>
            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
              <label class="form-label">Last name</label>
              <input type="text" id="lastname" name="lastname" class="form-control">
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control">
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label">Password</label>
              <input type="password" id="password" name="password" class="form-control">
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
              <label class="form-label">Telephone</label>
              <input type="tel" name="phone" class="form-control">
            </div>

            <!-- Gender input -->
            <div class="form-outline mb-4 ml-2">
              <label class="form-label">Gender</label><br>
              <input type="radio" value="male" name="gender"><small>Male</small>
              <input type="radio" value="female" name="gender"><small>Female</small>
            </div>

            <!-- DOB input type 2 -->
            <div class="form-outline mb-4">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dob" placeholder="dd-m-yyyy" value="" min="1950-01-01" max="2005-01-01">
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input
              class="form-check-input me-2"
              type="checkbox"
              value=""
              id="form6Example8">
            </div>

            <!-- Authorization by user -->
            <div class="form-check d-flex justify-content-center mb-4">
              <label class="form-check-label" for="form6Example8">I hereby authorize creation of my account?</label>
            </div>

            <!-- Submit button -->
            <div class="form-check d-flex justify-content-center mb-4">
              <?php include_once('bestgigclasses.php'); ?>
              <input type="submit" class="btn btn-primary btn-block mb-4" value="Create Your <?php echo APP_NAME ?> Account" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->

		<!-- Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>