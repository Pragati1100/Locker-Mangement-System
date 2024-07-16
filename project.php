<html>
<head>
<a href="assign1.php"><button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button></a>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<?php include_once 'boot.php'; ?>
<link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
<?php
include "data.php";
$studentName = $_POST['sname'];
$email = $_POST['email'];
$lockerNumber = $_POST['lockerno'];
$lockerKey = $_POST['lockerkeyno'];
$yearofstudying = $_POST['yos'];
$chooseyourstream = $_POST['cys'];
$academicyear = $_POST['year'];
$mobilenost = $_POST['number'];
$mobilenopar = $_POST['mnumber'];
$dateofissue = $_POST['doi'];
$dateofsubmission = $_POST['dos'];

$query = "UPDATE `availability` SET `keyno`='$lockerKey',`available`= 1 WHERE `lockerno`='$lockerNumber'";
$result = mysqli_query($conn, $query);

$query = "INSERT INTO issue(sname, stream, year, lockerno, lockerkeyno, doi, dos) VALUES ('$studentName','$chooseyourstream','$academicyear','$lockerNumber','$lockerKey','$dateofissue','$dateofsubmission')";
$result = mysqli_query($conn, $query);

$query = "INSERT INTO portal(sname, email, lockerno, lockerkeyno, yos, cys, year, number, mnumber, doi, dos) VALUES ('$studentName','$email','$lockerNumber','$lockerKey','$yearofstudying','$chooseyourstream','$academicyear','$mobilenost','$mobilenopar','$dateofissue','$dateofsubmission')";
$result = mysqli_query($conn, $query);

	if($result)
 {
	?>
	<center>
	<div class="container" id="rcorners2" style="border: 1px solid black; margin-top:2%; background-color:white; ">
		<div class="row">
			<div class="col-md-12" style="text-align:center;">
			<br>
				<img src="logo.png" height="90px" width="800px">
			</div>
		</div>
			<h2>RECIEPT</h2>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
				<label class="col-md-2"><b>NAME:</b></label>
				<div class="col-md-8" style="border-bottom:2px solid black;">
				<?php echo $studentName;?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
				<label class="col-md-2" style="text-align:right;"><b>EMAIL:</b></label>
				<div class="col-md-8" style="border-bottom:2px solid black;"><?php echo $email;?></div>
				</div>
			</div>
		</div>
		<br>
		
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>LOCKER NO.:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;">
					<?php echo $lockerNumber;?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>KEY NO.:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;">
					<?php echo $lockerKey;?></div>	
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>YEAR OF STUDYING:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;">
					<?php echo $yearofstudying;?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>STREAM:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;">
					<?php echo $chooseyourstream;?></div>

				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>DATE OS ISSUE:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;">
					<?php echo $dateofissue;?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>DATE OF SUBMISSION:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;">
					<?php echo $dateofsubmission;?></div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12" style="display:flex;">
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-3"><b>STUDENT'S NUMBER:</b></label>
					<div class="col-md-8" style="border-bottom:2px solid black;">
					<?php echo $mobilenost;?></div>
				</div>
				<div class="col-md-6" style="display:flex;">
					<label class="col-md-2"><b>PARENT'S NUMBER:</b></label>
					<div class="col-md-9" style="border-bottom:2px solid black;">
					<?php echo $mobilenopar;?></div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12"  style="text-align:center;">
				<button onclick="window.print();" class="btn btn-primary">Print</button>
			</div>
		</div>
		<br>
	</div>
	</center>
<?php
}
else{?>
<script type="text/javascript">
	window.location="projectform.php";
	 alert('Locker Number already assigned');
</script>
<?php
}
 ?>
</body>
</html>