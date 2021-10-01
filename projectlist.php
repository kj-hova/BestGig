<?php
include("bestgigconstants.php");
include("bestgigclasses.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
		<title><?php echo APP_NAME ?>.com - Projects Page</title>

    <!-- SEO META TAGS -->
		<meta name='keyword' content='<?php echo APP_NAME ?>, best gig, crowdsourcing app in Lagos, Nigeria freelancer, project, freelance Lagos Nigeria'>
		<meta name='author' content='john "KJ" idehai'>
		<meta name='description' content='<?php echo APP_NAME ?> list of new projects is expanding daily. Becoame gainfully employed by bidding for more projects on the fastest growing freelancing app in Nigeria.'>
    <!-- End of SEO Meta Tags -->

    <!-- OTHER REQUIRED TAGS/LINKS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- BestGig Custom CSS -->
    <link rel="stylesheet" type="text/css" href="bestgig.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Datatables Pluggin for functional table -->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/dataTables.bootstrap5.min.js">
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.11.2/js/jquery.dataTables.min.js">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <!-- End of Required Tags -->
    
    <!-- JS TO INCLUDE EXTERNAL PAGES -->
    <script>
     $(function(){
      $("#includemainnavbar").load("mainnavbar1.php");
      $("#includeprojectcard").load("project-card.php");
      $("#includeauxnavbar").load("auxnavbar4.php");
      $("#includefooter").load("footer.php");
      });
    </script>
	</head>
  <body>
    <!--MAIN NAVIGATION BAR-->
     <div id="includemainnavbar"></div>
    <!--Main Navbar-->

    

    <div class="container-fluid">
      <!-- FEATURED PROJECTS BANNER -->
      <div class="row" id="smallbanner">
        <div class="col" id="insideSmallbanner">
          <h1>Featured Projects</h1><br>
        </div>
      </div>
      <!-- End Featured Projects Banner -->

    <!-- BANNER -->
    <div class="container-fluid" class="overlayBanner">
      <div class="row">
        <div class="col" id="bannerdiv4-project">
          <div id="alignVertical" class="xyz">
            <h1>You Can Become Gainfully Employed</h1>
            <h6>By bidding for more <?php echo APP_NAME ?> projects!</h6>
          </div>
        </div>
      </div>
    </div><hr>
    <!-- End Banner 2 -->

      <!-- FEATURED PROJECTS PANEL -->
       <div id="includeprojectcard"></div>
      <!-- End Featured Projects -->

      <!-- ALL PROJECTS BANNER -->
      <div class="row" id="smallbanner">
        <div class="col" id="insideSmallbanner">
          <h1>See All Projects</h1><br>
        </div>
      </div>
      <!-- End All Projects Banner -->

      <!--MAIN NAVIGATION BAR-->
       <div id="includeauxnavbar"></div>
      <!--Main Navbar-->

      <!-- PROJECTS TABLE -->
      <div class="row mt-2 mb-2">
          <div class="col-md-12 table-responsive-sm justify-content-between">
            <table class='table table-responsive-sm table-bordered table-striped border-warning table-sm table-hover table-condensed table-active align-top' id="listed">
            <thead>
              <tr class="bg-light">
                <th scope="col" width="3%">S/N</th>
                <th scope="col" width="4%">Project ID</th>
                <th scope="col" width="10%">Project Name</th>
                <th scope="col" width="28%">Project Description</th>
                <th scope="col" width="5%">Timeframe<br><small>(no. of days)</small></th>
                <th scope="col" width="5%">Offer Amount<br><small>(Naira only)</small></th>
                <th scope="col" width="10%">LGA/LCDA<br><small>(project location)</small></th>
                <th scope="col" width="5%">State</th>
                <th scope="col" width="10%">Skill Category<br><small>(required for this project)</small></th>
                <th scope="col" width="5%">Promoter</th>
                <th scope="col" width="10%">Date Posted</th>
                <th scope="col" width="5%">Action Call!</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //create object of admin class
                $proj_obj = new Project;
                $project = $proj_obj->getProjects();

                $kounter = 0;
                foreach ($project as $key => $value) {
              ?>
              <tr>
                <td><?php echo ++$kounter; ?></td>
                <td><?php echo $value['proj_id'] ?></td>
                <td><?php echo $value['proj_name'] ?></td>
                <td><?php echo $value['proj_description'] ?></td>
                <td><?php echo $value['proj_timeframe'] ?></td>
                <td><?php echo $value['proj_offerpay'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['state_name'] ?></td>
                <td><?php echo $value['skillcategory_name'] ?></td>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['project_postdate'] ?></td>
                <td>
                  <a href="bidform.php?projid=<?php echo $value['proj_id'] ?>" class='btn btn-success btn-sm'>Bid</a>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      <!-- End Projects Table -->
    </div>

    <!-- FOOTER -->
    <div id="includefooter"></div>
    <!-- footer ends -->

    <script type="text/javascript" language="javascript">
      $(document).ready(function() {
        $('#listed').DataTable();
      }
      );
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>