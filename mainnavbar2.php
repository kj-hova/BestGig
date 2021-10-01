<?php
include ("bestgigconstants.php");
include ("bestgigclasses.php");
?>
<!-- MAIN NAVIGATION BAR 2 -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img src="images/logo2_bestgig.png" id="logo"></a>
  <a class="navbar-brand" href="index.php"><span id="navname"><?php echo APP_NAME ?></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active ml-3 mr-3">
        <a class="nav-link" href="extra.php">How it Works<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ml-3 mr-3">
        <a class="nav-link" href="projectlist.php">Find Projects</a>
      </li>
      <li class="nav-item active ml-3 mr-3">
        <a class="nav-link" href="workerlist.php">Find Workers</a>
      </li>
      <li class="nav-item active ml-3 mr-3">
        <div class="text-center">
          <a href="userlogin.php" class="btn btn-default btn-rounded btn-outline-success">Log in</a>
        </div>
      </li>
      <li class="nav-item active ml-3 mr-3">
        <div class="text-center">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" arial-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>    
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav><hr>
<!-- End Main Navbar 2 -->