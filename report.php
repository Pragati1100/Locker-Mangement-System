<?php
session_start();
  if($_SESSION["uname"] == "admin123")
  {
?>
<html>
<head><link rel="stylesheet" href="project.css">
<style>
body {
  background-color: white;
}</style>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<body>
<a href="assign1.php"><button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button></a>
<div style="position: absolute; right: 10px;"><a href="logout.php"><button style='font-size:24px'>LOGOUT<i class='fas fa-caret-square-left'></i></button></a><br></div>
<br><br>
<form method="post">
<label><b>CHOOSE YOUR STREAM:</b></label>
<select name="stream">
<option value="" disabled selected>Please choose your stream</option>
<option value="COMPUTER">COMPUTER</option>
<option value="IT">IT</option>
<option value="EXTC">EXTC</option>
<option value="ETRX">ETRX</option>
<option value="CIVIL">CIVIL</option>
</select>
<label><b>YEAR OF STUDYING:</b></label>
<select name="yos">
<option value="" disabled selected>Please choose your year of studying</option>
<option value="FE">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
</select>
<b>Locker No.:</b><input type="text" name="lockerno" placeholder="All">
<input type="submit" name="submit" value="Search">
</form>
<?php
include "data.php";
if(isset($_POST['submit']))
{
	$lockerno = $_POST['lockerno'];
	if(isset($_POST['yos']))
		$yos = $_POST['yos'];

	if(isset($_POST['stream']))
		$cys = $_POST['stream'];

	if($lockerno!="")
    {   if(isset($_POST['stream']))
		{
			$cys = $_POST['stream'];
			if(isset($_POST['yos']))
			{
				$yos = $_POST['yos'];
				$query = "select * from portal where lockerno='$lockerno' and cys='$cys' and yos='$yos'";
			}
			else{
				$query = "select * from portal where lockerno='$lockerno' and cys='$cys'";
			}
		}
		else
		{
			if(isset($_POST['yos']))
			{
				$yos = $_POST['yos'];
				$query = "select * from portal where lockerno='$lockerno' and yos='$yos'";
			}
			else{
				$query = "select * from portal where lockerno='$lockerno'";
			}
		}
	}
    else
        {   if(isset($_POST['stream']))
			{
				$cys = $_POST['stream'];
				if(isset($_POST['yos']))
				{
					$yos = $_POST['yos'];
					$query = "select * from portal where cys='$cys' and yos='$yos'";
				}
			else{
					$query = "select * from portal where cys='$cys'";
				}
			}
			else
			{
				if(isset($_POST['yos']))
				{
					$yos = $_POST['yos'];
					$query = "select * from portal where yos='$yos'";
				}
				else{
					$query = "select * from portal";
				}
			}
	}
$result = mysqli_query($conn, $query);


if ($result->num_rows > 0) {
    ?>
	<br><br>
	<center>
	<caption><h1><u>LOCKER RECORDS</u></h1></caption>
	<br>
	<table border="2" cellspacing="5" cellpadding="5" bgcolor="white">
	<tr>
	<th>Student Name</th>
	<th>Locker Number</th>
	<th>Key Number</th>
	<th>Year of Studying</th>
	<th>Stream</th>
    <th>Year</th>
	<th>Student Number</th>
	<th>Mobile Number</th>
	<th>Date of Issue</th>
	<th>Date of Submission</th>
	</tr><?php
	while($row = $result->fetch_assoc()) {
        ?>
		<tr>
		<td><?php echo $row["sname"];?></td>
		<td><?php echo $row["lockerno"];?></td>
		<td><?php echo $row["lockerkeyno"];?></td>
		<td><?php echo $row["yos"];?></td>
		<td><?php echo $row["cys"];?></td>
		<td><?php echo $row["year"];?></td>
		<td><?php echo $row["number"];?></td>
		<td><?php echo $row["mnumber"];?></td>
		<td><?php echo $row["doi"];?></td>
		<td><?php echo $row["dos"];?></td>
		</tr>
		<?php
    }?></table>
	<br><br>
	<input class="hide-from-printer" type="submit" name="submit1" value="Print" onclick="myFunction()">
	</center>
<?php
} else {
    echo "Locker Does Not Exists!....";
}

}

?>
	<p>Number of Lockers Issued :</p><?php
	$count = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM portal"));
     echo $count[0];
    ?>
<script>

function myFunction() {
  window.print();
}
</script>
</body>
<?php  include_once 'name.php'?>
</html>
<?php 
  }
  else{
    header("Location: index.php");
  }
  ?>

