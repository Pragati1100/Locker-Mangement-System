<!DOCTYPE html>
<?php
session_start();
  if($_SESSION["uname"] == "admin123")
  {
?>
<html>
<head>
	<title>first</title>
	<?php include_once 'head.php'; ?>
  <link rel="stylesheet" type="text/css" href="assign1.css">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body style="background-color:">
  <img src="logo.png"  align="left" height="110" width="100%" class="img">
  <a href="index.php"><button style='font-size:24px'>LOGIN PAGE<i class='fas fa-caret-square-left'></i></button></a><br>
  <div style="position: absolute; right: 10px;"><a href="logout.php"><button style='font-size:24px'>LOGOUT<i class='fas fa-caret-square-left'></i></button></a><br></div>
<div class="container" style="margin-top:5%; background-color:#006080;"><br>
  <h1 style="text-align:center; color:white; font-size: 70px;"><b>Locker Management Portal</b></h1><br><br>
  <div class="row">
    <div class="col-md-12" style="display:flex;">
      <div class="col-md-6" style="display:flex; margin-left:15%;">
        <div class="card" style="max-width: 18rem;">
            <div class="card-body shadow">
              <h5 class="card-title"><b>To Assign the locker</b></h5>
              <a href="projectform.php" class="btn btn-primary">Assign</a>
            </div>
        </div>
      </div>
      <div class="col-md-6" style="display:flex;">
      <div class="card" style="max-width: 18rem;">
        <div class="card-body shadow">
        <h5 class="card-title"><b>To Search a locker</b></h5>
        <a href="report.php" class="btn btn-primary">Search</a>
        </div></div>
      </div>
    </div>
  </div>

    <br><br>
       <div class="row">
    <div class="col-md-12" style="display:flex;">
      <div class="col-md-6" style="display:flex; margin-left:40%;">
        <div class="card" style="max-width: 18rem;">
            <div class="card-body shadow">
              <h5 class="card-title"><b>To Check Availability</b></h5>
              <a href="availability.php" class="btn btn-primary">Available</a>
            </div>
        </div>
      </div>
    </div>
  </div>

    <br><br>

    
    <div class="row">
    <div class="col-md-12" style="display:flex;">
      <div class="col-md-6" style="display:flex; margin-left:15%;">
        <div class="card" style="max-width: 18rem;">
            <div class="card-body shadow">
              <h5 class="card-title"><b>To Return the locker</b></h5>
              <a href="return.php" class="btn btn-primary">Return</a>
            </div>
        </div>
      </div>
      <div class="col-md-6" style="display:flex;">
      <div class="card" style="max-width: 18rem;">
        <div class="card-body shadow">
        <h5 class="card-title"><b>To Generate Report</b></h5>
        <a href="history.php" class="btn btn-primary">Report</a>
        </div></div>
      </div>
    </div>
  </div>

    <br><br>
 
</div>


<!--  <marquee width="100%" direction="right" height="100%">  -->
<h2 style="text-align:left; margin-top:35px; color: #9064e3;">Project By:</h2>
<p style="text-align:left; color: #9064e3;"><b>Janvi Sanjay Shree Shirmal</b></p>
<p style="text-align:left; color: #9064e3;"><b>Pallavi Pandurang Pawar</b></p>
<p style="text-align:left; color: #9064e3;"><b>Pragati Mahesh Tiwari</b></p>
<!-- < </marquee>  -->

</body>
</html>
  <?php 
  }
  else{
    header("Location: index.php");
  }
  ?>