<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
       ale();
} 
function ale() {
$uname = $_POST['uname'];
$psw = $_POST['psw'];
if($uname == 'admin' && $psw == 'admin@locker')
{	session_start();
  $_SESSION["uname"] = "admin123";
  header("Location: assign1.php");
}
else
{  header("Location: index.php");
}
}
?>
<html>
<head>
<head><link rel="stylesheet" href="project.css">
<head><link rel="stylesheet" href="login.css">
<img src="logo.png" align="left" height="120" width="100%">
<br><br><br><br><br><br><br><br><br><br><br>
<style>
input[type=text]:focus {
  background-color: lightblue;
 }
input[type=password]:focus {
  background-color: lightblue;
}
h2 {
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
h3 {
  text-shadow: 0 0 3px #FF0000;
}
</style>
</head>
<body background="cllg.jpg" style="background-repeat: no-repeat; background-size: 100% 100%;">
<div class="container">
<form method="post" action="index.php">
<h2><b><u>LOCKER PORTAL</u></b></h2>
<b><h3>USER ID:</h3></b>
<input type="text" placeholder="Enter username" name="uname" required> 
<br><br>
<b><h3>PASSWORD:</h3></b>
<input type="password" placeholder="Enter password" name="psw" required>
<br><br>
<input type="submit" value="Login" name="submit">
</form>
</div>
</body>
</html>
