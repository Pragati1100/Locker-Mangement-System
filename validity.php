<?php 
$uname = $_POST['uname'];
$psw = $_POST['psw'];
if($uname == 'admin' && $psw == 'admin@locker')
{	session_start();
	$_SESSION["uname"] = "admin123";
	header("Location: assign1.php");
}
else
{   header("Location: index.php");
	echo "<script type='text/javascript'>alert('Invalid User');</script>";
}
?>