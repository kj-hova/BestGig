<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

if(!isset($_SESSION['admin_email']) AND !isset($_SESSION['admin_pwd'])){
  header("location: adminlogin.php");
  exit;
}

// create object of admin class
$obj = new Admin;

// fetch a specific user data based on the user_id
if (isset($_GET['userid'])) {
	$userdata = $obj->getUser($_GET['userid']);

}

// update user details
if (isset($_POST['submit'])) {
	
	// reference update user method
	$output = $obj->updateUser($_POST['firstname'],$_POST['middlename'],$_POST['lastname'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['gender'],$_POST['dob'],$_POST['street'],$_POST['lcda'],$_POST['state'],$_POST['description'],$_POST['membertype'],$_POST['memberduration'],$_POST['userstatus']);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <title><?php echo APP_NAME ?> - Edit User Details Page</title>
	    
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
				$("#includefooter").load("footer.php");
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
						<h2>Edit User Details</h2>
					</div>
				</div>


	        <div class="row mb-4">
	        	<form action="" method="post" enctype="multipart/form-data">
	          		<div class="col">
			            <div class="form-outline">
			              <label class="form-label">First name</label>
			              <input type="text" id="firstname" name="firstname" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>" class="form-control">
			            </div>
			        </div>
			        <div class="col">
			            <div class="form-outline">
			              <label class="form-label">Middle name</label>
			              <input type="text" id="middlename" name="middlename" class="form-control" value="<?php if(isset($_POST['middlename'])){echo $_POST['middlename'];} ?>">
			           </div>
			        </div>
			        <!-- Text input -->
			        <div class="form-outline mb-4">
			          <label class="form-label">Last name</label>
			          <input type="text" id="lastname" name="lastname" class="form-control" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];} ?>">
			        </div>

			        <!-- Email input -->
			        <div class="form-outline mb-4">
			          <label class="form-label">Email</label>
			          <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
			        </div>

			        <!-- Password input -->
			        <div class="form-outline mb-4">
			          <label class="form-label">Password</label>
			          <input type="password" id="password" name="password" class="form-control">
			        </div>

			        <!-- Number input -->
			        <div class="form-outline mb-4">
			          <label class="form-label">Telephone</label>
			          <input type="tel" name="phone" class="form-control" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
			        </div>

			        <!-- Image Upload -->
			        <div class="form-outline mb-4">
			          <label style="font-weight: bold;">Upload Image</label>
			          <input type="file" name="profilepic" id="profilepic"><br>
			          <small><i>Image must be in jpeg, jpg, pnd or webp formats only. Not more than 2mb size.</i></small>
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
			          <input type="date" name="dob" placeholder="dd-m-yyyy" value="" min="1950-01-01" max="2005-01-01" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>">
			        </div>

		        	<!-- Select State Dropdown -->

		            <?php
		             // create instance of state             
		            
		               //create object of the category class
		              $obj = new States;
		              $states = $obj->getStates();
		              //execute run the query
		            ?>
			        <div class="form-outline mb-4">
			          <label class="form-label">State of Residence</label>
			          <select class='form-select btn btn-outline-info btn-rounded btn-sm' name="state" id="state" aria-label='Default select example' value="<?php if(isset($_POST['state'])){echo $_POST['state'];} ?>">
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
			        <div class="form-outline mb-4">
			        <label class="form-label">Select LGA </label>
			          <select class='form-select btn btn-outline-info btn-rounded btn-sm ml-5' name="lcda" id="lcda" aria-label='Default select example' value="<?php if(isset($_POST['lcda'])){echo $_POST['lcda'];} ?>">
			            <option value="">Select LGA/LCDA</option>
			          </select>
			        </div>

			        <!-- Text input -->
			        <div class="form-outline mb-4">
			          <label class="form-label" for="form6Example4">Street Address</label>
			          <input type="text" name="street" class="form-control" value="<?php if(isset($_POST['street'])){echo $_POST['street'];} ?>">
			        </div>

			        <!-- Valid ID Upload -->
			        <div class="form-outline mb-4">
			          <label>Change Valid ID Card</label>
			          <input class='form-select btn btn-outline-info btn-rounded btn-sm state' type="file" name="validid" id="validid"><br>
			          <small><i>Valid ID card must be in pdf or jpeg formats only. Not more than 2mb size.</i></small>
			        </div>

			        <!-- Current Utility Bill Upload -->
			        <div class="form-outline mb-4">
			          <label>Upload Current Utility Bill</label>
			          <input class='form-select btn btn-outline-info btn-rounded btn-sm state' type="file" name="utilitybill" id="utilitybill"><br>
			          <small><i>Document must be in pdf or jpeg formats only. Not more than 2mb size.</i></small>
			        </div>

			        <!-- Message input -->
			        <div class="form-outline mb-4">
			          <label class="form-label">User's Description</label>
			          <textarea class="form-control" name="description" cols="120" rows="4" value="<?php if(isset($_POST['description'])){echo $_POST['description'];} ?>"></textarea>
			        </div>

			        <!-- Membership dropdown -->
			        <?php
			            
			           //create object of the membershipType class
			          $obj = new MembershipType;
			          $memtype = $obj->getMembershipType();
			        ?>
			        <div class="form-outline mb-4">
			          <label class="form-label">Membership type</label>
			          <select class='form-select btn btn-outline-info btn-rounded btn-sm' id="membertype" name="membertype" aria-label="Default select example">
			            <option value="">Edit member type</option>
			            <?php
			            // Fetch membership types
			            $memtypeid = "memtype_id";
			            foreach ($memtype as $key => $value) {
			              $memtypeid = $value['memtype_id'];
			              $memtypename = $value['memtype_type'];
			              echo "<option value='$memtypeid'>".$memtypename."</option>";
			            }

			            ?>
			          </select>
			        </div>

			        <!-- Fee input -->
			         <script>
			          $(document).ready(function(){
			            $("#membertype").change(function(){
			              var selectedMemType = $('#membertype').val();
			              $.ajax({
			                type: "POST",
			                url: "membership.php",
			                data: {"membertype":selectedMemType},
			                success: 
			                function(success){
			                  // alert(success);
			                  $('#memberfee').val(parseInt(success));
			                },
			                error: function(error){
			                  console.log(error);
			                  //an error the developer will see
			                  alert("Oops, something went wrong. Try again later!");
			                }
			              });
			              });
			            });
			        </script>
			        <div class="form-outline mb-4">
			          <label>Fee</label>
			          <input type="number" id="memberfee" class="form-control validate text-success" name="memberfee" readonly>
			        </div>

			        <div class="form-outline mb-4">
			          <label class="form-label">Subscription duration</label>
			          <select class="form-select btn btn-outline-success btn-rounded btn-sm" name="memberduration" aria-label="Default select example">
			            <option>Edit User's membership duration</option>
			            <option value="1">1 month</option>
			            <option value="3">3 months</option>
			            <option value="6">6 months</option>
			            <option value="12">12 months</option>
			          </select>
			        </div>
			        <div class="form-outline mb-4">
			            <label>User Status</label>
			            
			            <select class="btn btn-primary ml-5" name='userstatus' id='userstatus'>
			              <?php $userdetail = $_GET['userstatus']; ?>
			              <option value="active" <?php if($userdetail['user_status']=='active'){echo "selected";} ?> >Active</option>
			              <option value="inactive" <?php if($userdetail['user_status']=='inactive'){echo "selected";} ?> >Inactive</option>
			            </select>
			        </div>
			            <input type="hidden" name="userid" value="<?php
			              if(isset($userdetail['user_id'])) {
			              echo $userdetail["user_id"];
			              }
			            ?>">
			        <div class="form-outline justify-content-center mb-4">

			          <!-- Submit button -->
			          <input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Submit to Edit this BestGig Account">
			        </div>
	    		</form>
			</div>
		</div>

	

	  	<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

	</body>
</html>