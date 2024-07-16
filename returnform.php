<html>
<head>
	<title></title>
	<link rel="stylesheet" href="returnform.css">
	<?php include_once 'boot.php'; ?>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<a href="assign1.php">
	<button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button>
</a><br><br><br>
<body style="background-color:#e9ebee;">
<?php
include "data.php";
if($_POST['lockerno']!='' || $_POST['lockerkeyno']!='')
{
	$lockerNumber = $_POST['lockerno'];
	$lockerKey = $_POST['lockerkeyno'];
	$query = "SELECT * FROM `portal` WHERE `lockerno` = '$lockerNumber' OR `lockerkeyno` = '$lockerKey'";
	$result = mysqli_query($conn, $query);
	if ($result->num_rows != 1) {
		echo "Your Locker number and Locker key number does not match.";
	}
	else{
			$row = $result->fetch_assoc();
			$studentName = $row["sname"];
			$lockerNumber = $row["lockerno"];
			$lockerKey = $row["lockerkeyno"];
			$yearofstudying = $row["yos"];
			$chooseyourstream = $row["cys"];
			$year = $row["year"];
			$doi = $row["doi"];
			?>
<div class="container"  id="rcorners2" style="border: 1px solid black; margin-left:100px; background-color:white; ">
		<div class="row">
			<div class="col-md-12" style="text-align:center;">
				<img src="logo.png" height="100px" width="700px">
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>Name.:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;"><?php echo "$studentName";?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-7" style="text-align:right;"><b>Date of Return.:</b></label>
					<div class="col-md-3"><?php echo date("Y-m-d");?></div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>locker.No.:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;"><?php echo "$lockerNumber";?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>key.No.:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;"><?php echo "$lockerKey";?></div>	
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>Year of Studying.:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;"><?php echo "$yearofstudying";?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>Stream.:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;"><?php echo "$chooseyourstream";?></div>

				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12"  style="text-align:center;">
				<button onclick="window.print();" class="btn btn-primary">Print</button>
			</div>
		</div>
		<br>

	</div>
			<?php
			$query = "UPDATE `availability` SET `keyno`='$lockerKey',`available`= 0 WHERE `lockerno`='$lockerNumber'";
			$result = mysqli_query($conn, $query);
			$query = "INSERT INTO `history`(`sname`, `stream`, `year`, `lockerno`, `lockerkeyno`, `dateofissue`) VALUES ('$studentName','$chooseyourstream','$year','$lockerNumber','$lockerKey','$doi')";
			$result = mysqli_query($conn, $query);
			$query = "DELETE FROM `portal` WHERE `lockerno`= '$lockerNumber'";
			$result = mysqli_query($conn, $query);
			$cdate = date('Y-m-d H:i:s');
			$query = "UPDATE `issue` SET `dos`='$cdate' WHERE `lockerno`='$lockerNumber'";
			$result = mysqli_query($conn, $query);
	}

}
else{
	?>
	<script type="text/javascript">
	 window.location="return.php";
	 alert('Enter any 1 value');
	</script>
<?php
}
?>
 <script>

// function myFunction() {
//   window.print();
// }
 </script>
</body>
</html>