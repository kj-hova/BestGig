<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['admin_email']) AND !isset($_SESSION['admin_pwd'])){
  header("location: adminlogin.php");
  exit;
}

// create object of project class
$obj = new Project;

// fetch a specific project data based on the project_id
if (isset($_GET['projid'])) {
	$projectpicked = $obj->getProject($_GET['projid']);

}

// update project details
if (isset($_POST['submit'])) {
	
	// reference update project method
	$output = $obj->updateProject($_POST['projectname'],$_POST['projectdescription'],$_POST['projecttimeframe'],$_POST['projectofferpay'],$_POST['projectstreet'],$_POST['projecttown'],$_POST['skillcategory'],$_POST['projectstatus']);
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title><?php echo APP_NAME ?> - Edit Project Page</title>
    
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
				<div class='row'>
					
				</div>
				<div class="row">
					<div class='col-md-6'>
						<h2>Edit Project Details</h2>
					</div>
				</div>

				<div class="col-md-7">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <div class="form-outline mb-4">
            <label>Project Title</label>
            <input type="text" class="form-control" name="projectname" value="<?php if(isset($_GET['projectname'])){echo $_GET['projectname'];} ?>">
          </div>
          <div class="form-outline mb-4">
            <label>Project description</label>
            <input type="text" class="form-control validate text-success" name="projectdescription" value="<?php if(isset($_POST['projectdescription'])){echo $_POST['projectdescription'];} ?>">
          </div>
          <div class="form-outline mb-4">
            <label>Timeframe</label>
            <small><i>(estimated number of days to complete the project)</i></small>
            <input type="number" class="form-control validate text-success" name="projecttimeframe" value="<?php if(isset($_POST['projecttimeframe'])){echo $_POST['projecttimeframe'];} ?>">
          </div>
          <div class="form-outline mb-4">
            <label>What is your budget?</label>
            <small><i>(in Nigerian Naira only)</i></small>
            <input type="number" class="form-control validate text-success" name="projectofferpay" value="<?php if(isset($_POST['projectofferpay'])){echo $_POST['projectofferpay'];} ?>">
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
            <input type="text" class="form-control" name="projecttown" value="<?php if(isset($_POST['projecttown'])){echo $_POST['projecttown'];} ?>">
          </div>
          <div class="form-outline mb-4">
            <label>Street Address</label>
            <input type="text" class="form-control" name="projectstreet" value="<?php if(isset($_POST['projectstreet'])){echo $_POST['projectstreet'];} ?>">
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
              <button type="submit" class="btn btn-block btn-success mb-4">Edit this Project</button>
            </div>
        </div>
      </form>
    </div>

	

	  	<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
</html>