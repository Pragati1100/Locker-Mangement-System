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


<?php
include "data.php";
?>
<center><p>Number of Lockers available :</p><?php
	$count = mysqli_fetch_array(mysqli_query($conn, "select count(*) from availability where available = 0"));
    echo $count[0];?>
</center>
	
	<?php

	$query = "select * from availability where available = 0";
	$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    ?>
	<br><br>
	<center>
	<caption><h1><u>LOCKER RECORDS</u></h1></caption>
	<br>
	<table border="2" cellspacing="5" cellpadding="5" bgcolor="white">
	<tr>
	<th>Locker Number</th>
	<th>Locker Key Number</th>
	</tr><?php
	while($row = $result->fetch_assoc()) {
        ?>
		<tr>
		<td><a href="projectform.php?lno=<?php echo $row["lockerno"];?>"><?php echo $row["lockerno"];?></a></td>
		<td><?php echo $row["keyno"];?></td>
		</tr>
		<?php
    }?></table>
	<br><br>
	<input class="hide-from-printer" type="submit" name="submit1" value="Print" onclick="myFunction()">
	</center>
<?php
} else {
    echo "No Lockers available";
}


?>
<script>

function myFunction() {
  window.print();
}
</script>
</body>
<?php include_once 'name.php'?>
</html>
<?php 
  }
  else{
    header("Location: index.php");
  }
  ?>

