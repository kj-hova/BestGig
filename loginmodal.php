<?php session_start();


  if (isset($_SESSION['email'])) {
      header("location: user.php");
      exit;
    }


    if(!empty($_POST)){
      var_dump($_POST); 
      $msg = '';
        if(empty(trim($_POST['email']))){
          $error_msg="Email is required. Please enter this and retry.";
        }

        if(empty(trim($_POST['password']))){
          $msg="Password is required. Please enter this and retry";
        }

        if (empty($msg)) {
        
            include('bestgigclasses.php');
          // $_SESSION['email'];
            $user = new User;
            $result = $user->loginUser($_POST['email'], $_POST['password']);

            echo $result;
            
        }
                
    }
?>

<!--MODAL FORM FOR LOGIN-->
<div class="modal fade" id="logindarkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('images/blackmodal.jpg');">
      <div class="text-success rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h6 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel">Welcome to
            <p class="text-success font-weight-light"><img src="images/logo2_bestgig.png" id="logo"><span id="navname">BestGig</span></p></h6>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div>
          <?php if (isset($msg)) {
            echo $msg;
          } ?>
        </div>
        <div class="modal-body">
          <!--Body-->
          <form action="" method="post">
            <div class="md-form mb-5">
              <input type="email" id="Form-email5" class="form-control validate text-success" name="email" placeholder="Email">
              <label data-error="wrong" data-success="right" for="Form-email5">Your email</label>
            </div>

            <div class="md-form pb-3">
              <input type="password" name="password" id="Form-pass5" class="form-control validate white-text">
              <label data-error="wrong" data-success="right" for="Form-pass5">Your password</label>
              <div class="form-group mt-3">
                <input class="form-check-input" type="checkbox" id="checkbox624">
                <label for="checkbox624" class="white-text form-check-label">Remember<span class="green-text font-weight-bold">
                    my password</span></label>
                <a href="" class="text-light align-items-left">Forgot<span class="green-text font-weight-bold">
                    your password?</span></a>
              </div>
            </div>

            <!--Grid row-->
            <div class="row d-flex align-items-center mb-4">

              <!--Grid column-->
              <div class="text-center mb-3 col-md-12">
                <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Log in</button>
              </div>
            </div>
          </form>
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-12">
              <p class="font-small white-text d-flex justify-content-end">Are you new to BestGig?
              <a href="register.php" class="text-success ml-1 font-weight-bold">Sign up</a></p>
            </div>
            <!--Grid column-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal For Login -->