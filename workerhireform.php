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
      $("#includefooter").load("footer.php");
    }) 
    </script>
	</head>
	<body>
	<!--MAIN NAVIGATION BAR-->
  <div id="includemainnavbar"></div>
  <!--Main Navbar-->
      
<div class="container-fluid mt-5" id="hire-worker">
  <div class="row">
    <div class="col-md-7 offset-2">
      <h5 id="projectForm">Hire this <?php echo APP_NAME ?> Worker</h5><br>
      <small>Dear User,
        <br>Kindly ensure that your project budget sum is available in your BestGig account before you submit this form.</small>
      <form>
        <div class="form-group">
          <div class="form-outline mb-4">
            <label>Project Name</label>
            <input type="text" class="form-control" name="proj_name">
          </div>
          <div class="form-outline mb-4">
            <label>Project description</label>
            <textarea class="form-control validate text-success" name="proj_description"></textarea>
          </div>
          <div class="form-outline mb-4">
            <label for="Form-pass5">Timeframe</label>
            <input type="number" class="form-control validate text-success" name="proj_timeframe">
          </div>
          <div class="form-outline mb-4">
            <label>What is your budget?</label>
            <input type="number" class="form-control validate text-success" name="proj_offerpay">
          </div>
          <div class="form-outline mb-4">
            <label>Project Location Address</label>
            <input type="text" class="form-control" name="proj_address1">
          </div>
          <div class="form-outline mb-4">
            <label>Town</label>
            <input type="text" class="form-control" name="proj_town">
          </div>
          <div class="form-outline mb-4">
            <select class="form-select btn btn-outline-info btn-rounded btn-sm" aria-label="Default select example" name="lga">
              <option selected>Select LGA/LCDA</option>
              <option value="1">Alimosho</option>
              <option value="2">Ifako-Ijaiye</option>
            </select>
            <select class="form-select btn btn-outline-info btn-rounded btn-sm" aria-label="Default select example" name="state">
              <option selected>Select State</option> 
              <option value="1">Lagos State</option>
              <option value="2">Ogun State</option>
            </select>
          </div>
          <div class="form-outline mb-4">
            <label>Select skill category required for this project</label>
            <select class="form-select btn btn-outline-info btn-rounded btn-sm" aria-label="Default select example" name="state">
              <option selected>Web Development</option> 
              <option value="1">Educational Service</option>
              <option value="2">Artisan</option>
            </select>
          </div>
          <div class="form-outline mb-4">
            <label>Radio input list to be triggered by category selected</label>
            <input type="text" class="form-control validate text-success" proj_offerpay>
          </div>
          <div class="form-outline mb-4">
            <button type="submit" class="btn btn-success mb-4">Send</button>
            <button type="reset" class="btn btn-outline-info mb-4">Refresh</button>
          </div>
        </div>
      </form>
    </div>
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