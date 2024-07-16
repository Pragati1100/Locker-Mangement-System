<!DOCTYPE html>
<?php
session_start();
  if($_SESSION["uname"] == "admin123")
  {
?>

<html>
<head><link rel="stylesheet" href="project.css">
<head><link rel="stylesheet" href="return.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<a href="assign1.php"><button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button></a>
<div style="position: absolute; right: 10px;"><a href="logout.php"><button style='font-size:24px'>LOGOUT<i class='fas fa-caret-square-left'></i></button></a><br></div>

<br><br><br><br>
<style>
h1{
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
h2 {
  text-shadow: 0 0 3px #FF0000;
}
body {
  background-color: white;
}
</style>
</head>
<body>
<center>
<div class="box">
<form action="returnform.php" method="post">
<img src="logo.png" align="left" height="90" width="100%">
<br>
<center><b><h2><u>STUDENT'S LOCKER OWNER FORM</u></h2></b></center>

<label><b>LOCKER NUMBER:</b></label>
<input type="number" name="lockerno" maxlength="4">
<br><br>
<label><b>OR</b></label>
<br><br>
<label><b>LOCKER KEY NUMBER:</b></label>
<input type=" key number" name="lockerkeyno" maxlength="4">
<br><br>

<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">
</form>
</div>
</center>
</body>
<?php include_once 'name.php'?>
</html>
<?php 
  }
  else{
    header("Location: index.php");
  }
  ?>
