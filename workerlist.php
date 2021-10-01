<?php
include ("bestgigconstants.php");
include ("bestgigclasses.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Members - <?php echo APP_NAME ?>.com</title>
    <meta name='keyword' content='bestgig, best gig, crowdsourcing app in Lagos, Nigeria freelancer, freelance Lagos Nigeria'>
    <meta name='author' content='john KJ idehai'>
    <meta name='description' content='bestgig is a crowdsourcing platform that matches projects and workers in Nigeria.'>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/js/fontawesome.min.js">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/jquery.dataTables.min.js">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script>
     $(function(){
      $("#includemainnavbar").load("mainnavbar1.php");
      $("#includeauxnavbar").load("auxnavbar2.php");
      $("#includefooter").load("footer.php");
    }) 
    </script>
	</head>
	<body>
	<!--MAIN NAVIGATION BAR-->
  <div id="includemainnavbar"></div>
  <!--Main Navbar-->

  <!--AUXILIARY NAVIGATION BAR-->
  <div id="includeauxnavbar"></div>
  <!--Auxiliary Navbar-->
   

<div class="container-fluid mb-3">
  <div class="row">
    <div class="col-sm-10 mt-2 table-responsive-sm justify-content-between">
      <table class='table table-responsive-sm table-bordered table-striped border-success table-sm table-hover table-condensed table-active align-top' id="membertable">
        <thead>
              <tr class="bg-light">
                <th scope="col" width="10%">S/N</th>
                <th scope="col" width="30%">User Name</th>
                <th scope="col" width="10%">Membership Type</th>
                <th scope="col" width="10%">Skill Category</th>
                <th scope="col" width="10%">Projects Completed</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="20%">DP</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //create object of user class
                $obj = new User;
                $user = $obj->getUsersPublic();

                // echo "<pre>";
                // print_r($user);
                // echo "</pre>";
                $kounter = 0;
                foreach ($user as $key => $value) {  
              ?>
              <tr>
                <td><?php echo ++$kounter; ?></td>
                <td>
                  <a class="btn btn-light" href="userpublic.php?user_id=<?php echo $value['user_id'];?>&&user_fname=<?php echo $value['user_fname'];?>&&user_lname=<?php echo $value['user_lname'];?>&&user_picture=<?php echo $value['user_picture'];?>&&user_datereg=<?php echo $value['user_datereg'];?>&&user_email=<?php echo $value['user_email'];?>&&user_phone=<?php echo $value['user_phone'];?>&&user_gender=<?php echo $value['user_gender'];?>&&user_description=<?php echo $value['user_description'];?>&&memtype_id=<?php echo $value['memtype_id'];?>&&skillcategory_id=<?php echo $value['skillcategory_id'];?>&&localgov_id=<?php echo $value['localgov_id'];?>&&states_id=<?php echo $value['states_id'];?>">
                    <?php echo $value['user_fname']." ".$value['user_lname'] ?>
                  </a>
                </td>
                <td><?php echo $value['memtype_id'] ?></td>
                <td><?php echo $value['skillcategory_id'] ?></td>
                <td>
                  <?php echo $value['user_datereg'] ?>
                  <span class="badge bg-warning rounded-pill">14</span>
                </td>
                <td><?php echo $value['user_status'] ?></td>
                <td>
                  <img src="workimg/<?php echo $value['user_picture'];?>" class="img-thumbnail img-rounded mt-2" id="dp2" alt="Display Picture">
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
      </table>
    </div>
      
      <!-- REVIEW DIV DEPRECATED TILL V.2 -->
    <!-- <div class="col-md-4 align-items-stretch mt-2 text-justify" id="reviewDiv">
      <h6 id="revHead">Best Review</h6><br>
      <p id="revBody" class="justify-content-center">He is such a great chef. His Niger Deltan cuisine is unmatched! He has exposed my entire family to a wide range of soups and dishes we would never have discovered on our own. He's sooo part of the family now!!!</p>
    </div> -->
  </div>
</div>

    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->
	<script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $('#membertable').DataTable();
    }
    );
	</script>


		<!-- Optional JavaScript -->
		<!-- Popper.js, then Bootstrap JS -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>