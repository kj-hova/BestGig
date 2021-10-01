<?php session_start();
include('bestgigclasses.php');
  if (isset($_SESSION['email'])) {
      header("location: user.php");
      exit;
    }

    if(!empty($_POST)){
      //var_dump($_POST); 
      $msg = '';
        if(empty(trim($_POST['email']))){
          $msg="<p class='alert alert-danger'>Email is required. Please enter this and retry.</p>";
        }

        if(empty(trim($_POST['password']))){
          $msg="<p class='alert alert-danger'>Password is required. Please enter this and retry.</p>";
        }

        if (empty($msg)) {
          $email = $_POST['email'];
          $password = $_POST['password'];
        
            $user = new User;
            $outcome = $user->loginUser($_POST['email'], $_POST['password']);
  
            header("Location:user.php?msg=$myid");
        }         
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?php include_once('bestgigclasses.php'); ?>
    <title><?php echo APP_NAME ?>.com - Login Page</title>

    <!-- SEO META TAGS -->
    <meta name='keyword' content='<?php echo APP_NAME ?>, best gig login, crowdsourcing app, Nigeria freelancer, freelance, Lagos Nigeria'>
    <meta name='author' content='john "KJ" idehai'>
    <meta name='description' content='<?php echo APP_NAME ?> Login Page. Login to view projects, post projects and bid for projects in the fastest growing freelancing and crowdsourcing platform in Nigeria.'>
    <!-- End of SEO Meta Tags -->
    
    <!-- OTHER REQUIRED TAGS/LINKS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- End of Required tags -->
    
    <!-- JS TO INCLUDE EXTERNAL PAGES -->
    <script>
     $(function(){
      $("#includemainnavbar").load("mainnavbar3.php");
    }) 
    </script>
    <!-- End of JS -->

  </head>
  <body>
    <!--MAIN NAVIGATION BAR-->
    <div id="includemainnavbar"></div>
    <!-- main navbar ends-->
    <div class="container-fluid">
      <div class="container mb-3" id="login-container">
        <div class="row text-success rgba-stylish-strong py-5 px-5 z-depth-4 justify-content-center">
          <!--Header-->
          <div class="col-md-7 text-center pb-4">
            <h6 class="font-weight-bold">Welcome to
              <p class="text-success font-weight-light"><img src="images/logo2_bestgig.png" id="logo"><span id="navname">BestGig</span></p></h6>
          </div>
          
          <!-- ALERT MESSAGE DIV -->
          <div class="col-md-7 text-center pb-4">
            <?php if (isset($msg)) {
              echo $msg;
            } ?>
          </div>
          <!-- End of Alert -->

          <div class="col-md-7 text-center pb-4">
            
            <!-- LOGIN FORM -->
            <form action="" method="post">

              <!-- Email input -->
              <div class="md-form mb-5">
                <input type="email" id="Form-email5" class="form-control validate text-success" name="email" placeholder="Email">
                <label data-error="wrong" data-success="right">Your email</label>
              </div>

              <!-- Password input -->
              <div class="md-form pb-3">
                <input type="password" name="password" id="Form-pass5" class="form-control validate white-text">
                <label data-error="wrong" data-success="right" for="Form-pass5">Your password</label>
                <div class="form-group mt-3">
                  <input class="form-check-input" type="checkbox" id="checkbox624">
                  <label for="checkbox624" class="white-text form-check-label">Remember<span class="green-text font-weight-bold"> my password</span></label>
                  <!-- <a href="" class="text-light align-items-left">Forgot<span class="green-text font-weight-bold">your password?</span></a> -->
                </div>
              </div>

              <!-- Submit button -->
              <div class="row d-flex align-items-center mb-4">
                <div class="text-center mb-3 col-md-12">
                  <input type="submit" class="btn btn-success btn-block btn-rounded z-depth-1" value="Log in">
                </div>
              </div>
            </form>

            <!-- Grid row -->
            <div class="row">
              <div class="col-md-12">
                <p class="font-small white-text d-flex justify-content-end">Are you new to BestGig?
                <a href="register.php" class="text-success ml-1 font-weight-bold">Sign up</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Popper.js, then Bootstrap JS -->
    <script type='text/javascript' src='js/popper.min.js'></script>
    <script type='text/javascript' src='js/bootstrap.js'></script>
  </body>
</html>