<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['user_email']) AND !isset($_SESSION['user_pwd'])){
  header("location: userlogin.php");
  exit;
}

if(!empty($_POST)){
  //var_dump($_POST);
  if(empty($_POST['projectname']) || empty($_POST['projectdescription']) || empty($_POST['projecttimeframe']) || empty($_POST['projectofferpay']) || empty($_POST['projectstreet']) || empty($_POST['projecttown'])){
    $msg="<p class='alert alert-warning'>All project details are required</p>";
  }

  if (empty($msg)) {
    //echo "i got here";
    $projname= $_POST['projectname'];
    $projdescription= $_POST['projectdescription'];
    $projtimeframe= $_POST['projecttimeframe'];
    $projofferpay= $_POST['projectofferpay'];
    $projstreet= $_POST['projectstreet'];
    $projtown= $_POST['projecttown'];
    $projlcda= $_POST['lcda'];
    $projstate= $_POST['state'];
    $skillcatid=$_POST['skillcategory'];
    $userid=$_SESSION['user_id'];
    //var_dump($_POST);
    //include_once "bestgigclasses.php";
    //create object of the skill category class
    $proj_obj=new Project;
    $output = $proj_obj->createProject($projname,$projdescription,$projtimeframe,$projofferpay,$projstreet,$projtown,$projlcda,$projstate,$skillcatid,$userid);

    if (!$output) {
      $msg = "<p class='alert alert-success'>New project was successfully posted. Your new project shall be published shortly</p>";
    }else{
      $msg="<p class='alert alert-danger'>Something went wrong! Could not post new project</p>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
		<title><?php echo APP_NAME ?> - Project Form</title>

    <!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig, crowdsourcing app in Lagos, Nigeria freelancer, project, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> project form for posting your new projects for instanting bids from skilled members of the rapidly growing crowdsourcing platform in Nigeria.'>
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
      $("#includemainnavbar").load("mainnavbar4.php");
      $("#includefooter").load("footer.php");
    })
  </script>
	</head>
	<body>
    <!--MAIN NAVIGATION BAR-->
    <div id="includemainnavbar"></div>
    <!--Main Navbar-->


    <div class="container-fluid">
    	<div class="row mb-5" id="smallbanner">
        <div class="col" id="insideSmallbanner">
          <h2>Post A New Project</h2>
          <h6 id="hh6">and receive bids within minutes!</h6>
        </div>
      </div>
      
      <div class="row d-flex justify-content-center">
        <div class="col-md-7 mb-4">
          <h5 id="projectForm">Hi <?php if (isset($_SESSION['user_fname'])) {
                echo ($_SESSION['user_fname']);
              } ?>,</h5><br>
          <div><?php if (isset($msg)) {
            echo ($msg);
          }  ?></div>
          <small>Kindly ensure that your <?php echo APP_NAME ?> account is adequately funded upfront to support this project.</small><br>
        </div>
        <div class="col-md-7">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-outline mb-4">
                <label>Project Title</label>
                <input type="text" class="form-control" name="projectname">
              </div>
              <div class="form-outline mb-4">
                <label>Project description</label>
                <textarea class="form-control validate text-success" name="projectdescription"></textarea>
              </div>
              <div class="form-outline mb-4">
                <label for="Form-pass5">Timeframe</label>
                <small><i>(estimated number of days to complete the project)</i></small>
                <input type="number" class="form-control validate text-success" name="projecttimeframe">
              </div>
              <div class="form-outline mb-4">
                <label>What is your budget?</label>
                <small><i>(in Nigerian Naira only)</i></small>
                <input type="number" class="form-control validate text-success" name="projectofferpay">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Select state where project is located</label>
                </div>
                <div class="col-md-6">
                  <div class="form-outline mb-4">
                    <!-- Select States button -->
                    <?php
                     // create instance of state             
                    
                       //create object of the states class
                      $obj = new States;
                      $states = $obj->getStates();
                      //execute run the query
                    ?>
                    <select class='form-select btn btn-outline-info btn-rounded btn-sm' name="state" id="state" aria-label='Default select example'>
                      <option value="">Select State</option>
                      <?php
                      //Fetch states
                      $stateid = "state_id";
                      foreach ($states as $key => $value) {
                        $stateid = $value['state_id'];
                        $statename = $value['state_name'];
                        echo "<option value='$stateid'>".$statename."</option>";
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Select LCDA where project is located</label>
                </div>
                <div class="col-md-6">
                  <div class="form-outline mb-4">
                     <!-- Select LGA/LCDA button -->
                      <script>
                        $(document).ready(function(){
                          $("#state").change(function(){
                            var selectedState =$(this).val();
                            $.ajax({
                              type: "POST",
                              url: "state-lcda.php",
                              data: {state : selectedState}
                            }).done(function(data){
                              $("#lcda").html(data);
                            });
                          });
                        });
                      </script>
                    <select class='form-select btn btn-outline-info btn-rounded btn-sm' value="" name="lcda" id="lcda" aria-label='Default select example'>
                      <option value="">Select LGA/LCDA</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-outline mb-4">
                <label>Town where project is located</label>
                <input type="text" class="form-control" name="projecttown">
              </div>
              <div class="form-outline mb-4">
                <label>Street Address</label>
                <input type="text" class="form-control" name="projectstreet">
              </div>
              
              <!-- Skill Category dropdown -->
              <?php
                //create object of the SkillCategory class
                $obj = new SkillCategory;
                $skillcat = $obj->getSkillCategories();
              ?>
              <div class="row">
                <div class="col-md-6">
                  <label class="form-label">Required Skill Category</label>
                </div>
                <div class="col-md-6">
                  <div class="form-outline mb-4">
                    <select class='form-select btn btn-outline-info btn-rounded btn-sm' id="skillcategory" name="skillcategory" aria-label="Default select example">
                      <option value="">Select Skill Category</option>
                      <?php
                      // Fetch skill categories
                      $skillcatid = "skillcategory_id";
                      foreach ($skillcat as $key => $value) {
                        $skillcatid = $value['skillcategory_id'];
                        $skillcatname = $value['skillcategory_name'];
                        echo "<option value='$skillcatid'>".$skillcatname."</option>";
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="form-outline mb-4">
                <!-- <label>Select ALL skills required for this project</label> -->
                 <!-- Select skills checkboxes -->
                <!-- <script>
                  $(document).ready(function(){
                    $("#skillcategory").change(function(){
                      var SkillCat =$(this).val();
                      $.ajax({
                        type: "POST",
                        data: {skill : SkillCat}
                      }).done(function(data){
                        $("#projskill").html(data);
                        url: "skillcat-skill.php",
                      });
                    });
                  });
                </script> -->
                <!-- <div class="form-outline mb-4"> -->
                  <!-- <input type="text" class="form-control validate text-success" name="projskill" id="projskill"> -->
                  <!-- <select class='form-select btn btn-outline-info btn-rounded btn-sm' name="projskill" id="projskill" aria-label='Default select example'>
                    <label class="form-label">Select skills </label>
                    <option value="">Select skills</option>
                  </select>
                </div> -->
                <div class="form-outline mb-4">
                  <button type="submit" class="btn btn-block btn-success mb-4">Submit Your Project</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  	<!-- Popper.js, then Bootstrap JS -->
  	<script type="text/javascript" src="js/popper.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>