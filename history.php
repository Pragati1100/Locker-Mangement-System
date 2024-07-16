<?php
session_start();
  if($_SESSION["uname"] == "admin123")
  {
?>
<html>
<head>
<a href="assign1.php"><button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button></a>
<div style="position: absolute; right: 10px;"><a href="logout.php"><button style='font-size:24px'>LOGOUT<i class='fas fa-caret-square-left'></i></button></a><br></div>
</head>
<body>
<center>
<br><br>
<form method="post">
<label><b>Academic Year:</b></label>
<select name="year">
<option value="" disabled selected>Please choose your stream</option>
<option value="2013">2013-14</option>
<option value="2014">2014-15</option>
<option value="2015">2015-16</option>
<option value="2016">2016-17</option>
<option value="2017">2017-18</option>
<option value="2018">2018-19</option>
<option value="2019">2019-20</option>
</select>
<input type="submit" name="submit" value="Get Report">
</form>

<?php
include "data.php";
if(isset($_POST['submit']))
{
	$year = $_POST['year'];
	?><br/><br/>
	<center><input class="hide-from-printer" type="submit" name="submit1" value="Print" onclick="myFunction()"></center>
	<?php
	switch($year)
	{
		case 2013: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2013-14</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2013-07-01' && `doi` <= '2014-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2013-07-01' && `dateofreturn` <= '2014-06-30'";
		break;
		case 2014: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2014-15</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2014-07-01' &&  `doi` <= '2015-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2014-07-01' && `dateofreturn` <= '2015-06-30'";
		break;
		case 2015: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2015-16</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2015-07-01' &&  `doi` <= '2016-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2015-07-01' && `dateofreturn` <= '2016-06-30'";
		break;
		case 2016: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2016-17</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2016-07-01' &&  `doi` <= '2017-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2016-07-01' && `dateofreturn` <= '2017-06-30'";
		break;
		case 2017: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2017-18</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2017-07-01' &&  `doi` <= '2018-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2017-07-01' && `dateofreturn` <= '2018-06-30'";
		break;
		case 2018: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2018-19</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2018-07-01' &&  `doi` <= '2019-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2018-07-01' && `dateofreturn` <= '2019-06-30'";
		break;
		case 2019: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2019-20</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2019-07-01' &&  `doi` <= '2020-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2019-07-01' && `dateofreturn` <= '2020-06-30'";
		break;
		case 2020: 
			?><center><caption><h1><u>ACADEMIC YEAR: 2020-21</u></h1></caption></center><?php
			$query = "SELECT * FROM `issue` WHERE `doi` >= '2020-07-01' &&  `doi` <= '2021-06-30'";
			$query1 = "SELECT * FROM `history` WHERE `dateofreturn` >= '2020-07-01' && `dateofreturn` <= '2021-06-30'";
		break;
	}

$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);

    ?>
	<br>
	<h2>Assigned Lockers</h2>
	<?php
	if ($result->num_rows > 0) {?>
	<table border="2" cellspacing="5" cellpadding="5" bgcolor="white">
	<tr>
	<th>Student Name</th>
	<th>Stream</th>
	<th>Admission Year</th>
	<th>Locker Number</th>
	<th>Key Number</th>
	<th>Date of Issue</th>
	<th>Date of Submission</th>
	</tr><?php
	while($row = $result->fetch_assoc()) {
        ?>
		<tr>
		<td><?php echo $row["sname"];?></td>
		<td><?php echo $row["stream"];?></td>
		<td><?php echo $row["year"];?></td>
		<td><?php echo $row["lockerno"];?></td>
		<td><?php echo $row["lockerkeyno"];?></td>
		<td><?php echo $row["doi"];?></td>
		<td><?php echo $row["dos"];?></td>
		</tr>
		<?php
		
	} 
	?></table><?php
	}
	else {
    ?><center>No Records found...</center><?php
	}?>
	<h2>Returned Lockers</h2>
	<?php
	if ($result1->num_rows > 0) {
	?>
		<table border="2" cellspacing="5" cellpadding="5" bgcolor="white">
		<tr>
		<th>Student Name</th>
		<th>Stream</th>
		<th>Admission Year</th>
		<th>Locker Number</th>
		<th>Key Number</th>
		<th>Date of Issue</th>
		<th>Date of Return</th>
		</tr><?php
		while($row = $result1->fetch_assoc()) {
        ?>
			<tr>
			<td><?php echo $row["sname"];?></td>
			<td><?php echo $row["stream"];?></td>
			<td><?php echo $row["year"];?></td>
			<td><?php echo $row["lockerno"];?></td>
			<td><?php echo $row["lockerkeyno"];?></td>
			<td><?php echo $row["dateofissue"];?></td>
			<td><?php echo $row["dateofreturn"];?></td>
			</tr>
		<?php
		} 
		?></table><?php
	}
	else {
		?><center>No Records found...</center><?php
	}
	?>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	<br><br>
	</center>
<?php
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
