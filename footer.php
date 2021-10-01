<?php session_start();
include ("bestgigconstants.php");
include ("bestgigclasses.php");
?>
<!-- FOOTER -->
<div class="container-fluid" id="footerdiv">
  <div class="row mb-5">
    <div class="col-md-4">
      <div class="mt-2 mb-3">
        <!-- SOCIAL MEDIA ICONS -->
        <a href="https://www.facebook.com/idehai.kj" id="socialMedia" class="fa fa-facebook-square"><small>facebook</small></a>
        <a href="https://twitter.com/kj_hova" id="socialMedia" class="fa fa-facebook-square"><small>twitter</small></a>
        <a href="https://github.com/kj-hova" id="socialMedia" class="fa fa-github"><small>GitHub</small></a>
        <a href="#" id="socialMedia" class="fa fa-facebook-square"><small>instagram</small></a>
        <a href="#" id="socialMedia" class="fa fa-facebook-square"><small>youtube</small></a>
        <!-- End Social Media Icons -->
      </div>

      <div class="mt-2 ml-3 mb-3">
        <!-- LINKS TO LEGAL/EXTRA PAGES -->
        <a href="legal.php#codeofconduct" class="links"><small>Code of Conduct</small></a><br><br>
        <a href="legal.php#useragreement" class="links"><small>User Agreement</small></a><br><br>
        <a href="legal.php#privacypolicy" class="links"><small>Privacy Policy</small></a><br><br>
        <a href="extra.php#aboutus" class="links"><small>About Us</small></a>
        <!-- End Legal/Extra Pages -->
      </div>
    </div>

    <div class="col-md-3 mt-2 ml-3">
      <h6>Contact</h6>
      <ul class="list-group" id="footer-contact">
        <li class="icon fa-phone"><small> +2347035084567</small></li>
        <li class="icon fa-envelope"><small> info@johnidehai.com</small></li>
        <li class="icon fa-location-arrow"><small> <?php echo APP_NAME ?> Work Station<br> &nbsp;&nbsp;&nbsp;&nbsp;Lagos, Nigeria
        <br> &nbsp;&nbsp;&nbsp;&nbsp;W/Africa.<br></small></li>
      </ul>
    </div>

    <div class="col-md-4 ml-3">
      <!-- NEWSLETTER SIGNUP -->
      <p class="pt-2">
        <strong>Sign up for our newsletter</strong>
      </p>
      <label>Email</label><br>
      <input type="email" name="emailaddress" id="email" class="form-control">

      <label>Fullname</label><br>
      <input type="text" name="fullname" id="fullname" class="form-control">

      <button type="submit" class="btn btn-light mt-4">Subscribe</button>
    </div>
    <!-- End Newsletter sign up -->
    
  </div>

  <div class="row mb-3">
    
  </div>
  <div class="row" style="" id="footerdiv2">
    <div class="col-md-4 justify-text-right">
      <small class="justify-text-right">Powered by Undground</small>
    </div>
    <div class="col-md-7 ml-3">
      <small><?php echo APP_NAME ?>® is the intellectual property of John "KJ" Idehai.</small><br>
      <small>Copyright 2021 | <?php echo APP_NAME ?> social networking and freelance app is a work-in-progress project for Undground Technologies Ltd</small>
    </div>
  </div>
</div>
<!-- footer ends