<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");

  if(isset($_POST['submit'])){
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['street']) || empty($_POST['lcda']) || empty($_POST['state'])) {
      $msg = "Please supply all the required fields";
    }else{
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $street = $_POST['street'];
      $lcda = $_POST['lcda'];
      $state = $_POST['state'];
      //var_dump($lcda);
      // create object of user class
      $obj = new User;
      
      // reference update user method
      $output = $obj->updateUser($_SESSION['user_fname'],$_SESSION['user_mname'],$_SESSION['user_lname'],$_SESSION['user_email'],$_SESSION['user_pwd'],$_SESSION['user_phone'],$_SESSION['user_gender'],$_SESSION['user_dob'],$_POST['street'],$_POST['lcda'],$_POST['state'],$_POST['description'],$_POST['skillcategory'],$_POST['membertype'],$_POST['memberduration'],$_SESSION['user_id']);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo APP_NAME ?> - Profile Update Page</title>

  <!-- SEO META TAGS -->
  <meta name='keyword' content='<?php echo APP_NAME ?>, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
  <meta name='author' content='john "KJ" idehai'>
  <meta name='description' content='<?php echo APP_NAME ?> member profile update page for the fast rising crowdsourcing and freelance platform in Nigeria.'>
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
    $("#includefooter").load("footer.php");
  }) 
  </script>
</head>
<body>
  <!--MAIN NAVIGATION BAR-->
   <div id="includemainnavbar"></div>
  <!--Main Navbar-->
  
  <div class="container-fluid">
    <div class='row'>
    <?php
    if(isset($output)) {
      echo "<div class='col-md-6 alert alert-danger'>".$msg."</div>";
     } ?>
    </div>
    <div class="row">
      <div class='col-md-4'>
        <a href="user.php" class="btn btn-info btn-secondary btn-sm offset-2 mt-4">Back to Profile Page</a>
      </div>
      <div class='col-md-8'>
        <h2>Update Your <?php echo APP_NAME ?> Profile</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
      <form action="" method="post" enctype="multipart/form-data">
        <!-- grid layout with text inputs for the names -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <label class="form-label">First name</label>
              <input type="text" id="firstname" name="firstname" class="form-control"  value="<?php
              if(isset($_SESSION['user_fname'])){
                echo $_SESSION['user_fname'];
              }?>

              ">
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <label class="form-label">Middle name</label>
              <input type="text" id="middlename" name="middlename" class="form-control" value="<?php
              if(isset($_SESSION['user_mname'])){
                echo $_SESSION['user_mname'];
              }?>

              ">
            </div>
          </div>
        </div>

        <!-- Text input -->
        <div class="form-outline mb-4">
          <label class="form-label">Last name</label>
          <input type="text" id="lastname" name="lastname" class="form-control" value="<?php
              if(isset($_SESSION['user_lname'])){
                echo $_SESSION['user_lname'];
              }
                ?>
              ">
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php
              if(isset($_SESSION['user_email'])){
                echo $_SESSION['user_email'];
              }
                ?>
              ">
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-control" value="<?php
              if(isset($_SESSION['user_pwd'])){
                echo $_SESSION['user_pwd'];
              }
                ?>
              ">
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
          <label class="form-label">Telephone</label>
          <input type="tel" name="phone" class="form-control" value="<?php
              if(isset($_SESSION['user_phone'])){
                echo $_SESSION['user_phone'];
              }
                ?>
              ">
        </div>

        <!-- Image Upload -->
        <div class="form-outline mb-4">
          <label style="font-weight: bold;">Upload Image</label>
          <input type="file" name="profilepic" id="profilepic"><br>
          <small><i>Upload your profile image in jpeg, jpg, pnd or webp formats only. Not more than 2mb size.</i></small>
        </div>

        <!-- Gender input -->
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline ml-2">
              <label class="form-label">Gender</label><br>
              <input type="radio" value="male"
                   name="gender"><small>Male</small>
              <input type="radio" value="female" name="gender"><small>Female</small>
            </div>
          </div>
          <!-- DOB input type 2 -->
          <div class="col">
            <div class="form-outline">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dob" <?php
                  if(isset($_SESSION['user_dob'])){
                    echo $_SESSION['user_dob'];
                  }
                    ?>  min="1950-01-01" max="2005-01-01" >
            </div>
          </div>
        </div>

        <!-- Select State Dropdown -->

            <?php
             // create instance of state             
            
               //create object of the states class
              $obj = new States;
              $states = $obj->getStates();
              //execute run the query
            ?>
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">State of Residence</label>
          </div>
          <div class="col">
            <div class="form-outline mb-4">
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
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Select LGA/LCDA of Residence</label>
          </div>
          <div class="col-md-6">
            <div class="form-outline mb-4">
              <select class='form-select btn btn-outline-info btn-rounded btn-sm' name="lcda" id="lcda" aria-label='Default select example'>
                <option value="">Select LGA/LCDA</option>
              </select>
            </div>
          </div>
        </div>
        

        <!-- Text input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form6Example4">Street Address</label>
          <input type="text" name="street" class="form-control" value="<?php
              if(isset($_SESSION['user_street'])){
                echo $_SESSION['user_street'];
              }
                ?>
              ">
        </div>

        <!-- Valid ID Upload -->
        <div class="row mb-4">
          <div class="col-md-6">
            <label>Upload Valid ID Card</label>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input class='form-select btn btn-outline-info btn-rounded btn-sm state' type="file" name="validid" id="validid"><br>
          <small><i>pdf or jpeg formats only. Not more than 2mb size.</i></small>
            </div>
          </div>
        </div>

        <!-- Current Utility Bill Upload -->
        <div class="row mb-4">
          <div class="col-md-6">
            <label>Upload Current Utility Bill</label><br>
            
          </div>
          <div class="col-md-6">
            <div class="form-outline">
              <input class='form-select btn btn-outline-info btn-rounded btn-sm state' type="file" name="utilitybill" id="utilitybill"><br>
              <small><i>pdf or jpeg formats only. Not more than 2mb size.</i></small>
            </div>
          </div>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
          <label class="form-label">Personal Description</label>
          <input class="form-control" name="description" cols="120" rows="4" value="<?php
              if(isset($_SESSION['user_description'])){
                echo $_SESSION['user_description'];
              }
                ?>
              ">
        </div>

        <?php
          //create object of the SkillCategory class
          $obj = new SkillCategory;
          $skillcat = $obj->getSkillCategories();
        ?>
        <!-- Skill Category dropdown -->
        <div class="row mb-4">
          <div class="col-md-6">
            <label class="form-label">Choose your skill category</label>
          </div>
          <div class="col-md-6">
            <div class="form-outline">
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

        <!-- Membership dropdown -->
        <?php
            
           //create object of the membershipType class
          $obj = new MembershipType;
          $memtype = $obj->getMembershipType();
        ?>
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Membership type</label>
          </div>
          <div class="col-md-6">
            <div class="form-outline mb-4">
              <select class='form-select btn btn-outline-info btn-rounded btn-sm' id="membertype" name="membertype" aria-label="Default select example">
                <option value="">Choose your member type</option>
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
          </div>
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
          <label>Applicable monthly subscription fee</label>
          <input type="number" id="memberfee" class="form-control validate text-success" name="memberfee" readonly>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Select the duration you are paying for</label>
          </div>
          <div class="col-md-6">
            <div class="form-outline mb-4">
              <select class="form-select btn btn-outline-success btn-rounded btn-sm" name="memberduration" aria-label="Default select example">
                <option>Subscription duration</option>
                <option value="1">1 month</option>
                <option value="3">3 months</option>
                <option value="6">6 months</option>
                <option value="12">12 months</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Submit button -->
        <div class="form-check form-group d-flex justify-content-center mb-4">
          <input type="submit" class="btn btn-primary btn-block mb-4" value="Update My <?php echo APP_NAME ?> Account" name="submit">
        </div>
        
      </form>
    </div>
  </div>
</div>


<!-- FOOTER -->
<div id="includefooter"></div>
<!-- footer ends -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>