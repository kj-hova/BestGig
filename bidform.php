<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['user_email']) AND !isset($_SESSION['user_pwd'])){
  header("location: userlogin.php");
  exit;
}

if(!empty($_POST)){
  //var_dump($_POST);
  if(empty($_POST['bidproposal']) || empty($_POST['bidamount']) || empty($_POST['bidtimeframe'])){
    $msg="<p class='alert alert-warning'>Please enter all required fields</p>";
    
  }

  $id = isset($_GET['proj_id']) ? $_GET['proj_id'] : "";


  if (empty($msg)) {
    
    $bidproposal= $_POST['bidproposal'];
    $bidamount= $_POST['bidamount'];
    $bidtimeframe= $_POST['bidtimeframe'];
    $projid= $id;
    $userid=$_SESSION['user_id'];
    
    //create object of the bid class
    $bid_obj=new Bids;
    $output = $bid_obj->createBid($bidproposal,$bidamount,$bidtimeframe,$projid,$userid);
    // var_dump($output);

    if (!$output) {
      $msg="<p class='alert alert-danger'>Something went wrong! Could not submit your bid</p>";
    }else{
      $msg = "<p class='alert alert-success'>Your bid was successfully submitted</p>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bid Form - <?php echo APP_NAME ?>.com</title>
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

<!--Content-->
<div class="card card-image" style="background-image: url('images/greenmodal.jpg')">
  <div class="text-warning rgba-stylish-strong py-5 px-5 z-depth-4">
    <!--Header-->
    <div class="modal-header text-center pb-4">
      <h6 class="modal-title w-100 text-warning font-weight-bold">Welcome to
      <p class="text-warning font-weight-light"><img src="images/logo_bestgig.png" id="logo"><span class="text-warning" id="navname"><?php echo APP_NAME ?></span></p></h3>
      <a href="projectlist.php" class="btn close text-light">Return</a>
    </div>
    <div class="col-md-7 mb-4">
      <h5 id="projectForm">Hello <?php if (isset($_SESSION['user_fname'])) {
            echo ($_SESSION['user_fname']);
          } ?>,</h5><br>
      <small>Welcome to your <?php echo APP_NAME ?>.com bid session. Bid for more projects to improve your chances of getting hired.</small><br>
      <div><?php if (isset($msg)) {
        echo ($msg);
      }  ?></div>
    </div>
    <div class="mt-2">
      <form action="" method="post" enctype="multipart/form-data">
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="Form-email5">1. Bid Description</label><br>
          <small>In not more than 30 words, make a strong case for your bid.</small>
          <textarea class="form-control validate text-success" id="bidproposal" name="bidproposal"></textarea>
        </div>

        <div class="md-form pb-3">
          <label data-error="wrong" data-success="right">2. How much are you charging?</label><br>
          <small>Nigerian Naira only.</small>
          <input type="number" id="bidamount" name="bidamount" class="form-control validate text-success">
        </div>
        <div class="md-form pb-3 mb-4">
          <label data-error="wrong" data-success="right" for="Form-pass5">3. Proposed timeframe to complete the project</label><br>
          <small>Number of days.</small>
          <input type="number" name="bidtimeframe" class="form-control validate text-success">
        </div>

        <!--Grid row-->
        <div class="row d-flex align-items-center mb-4">

        <!--Grid column-->
        <div class="text-center mb-3 col-md-12">
          <button type="submit" class="btn btn-warning btn-block btn-rounded z-depth-1">Submit your bid</button>
          </div>
        </div>
      </form>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
          
            <!--Grid column-->

          </div>
          <!--Grid row-->

        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
