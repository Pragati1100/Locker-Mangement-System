<!DOCTYPE html>
<?php
session_start();
  if($_SESSION["uname"] == "admin123")
  {
?>
<html>
<head><link rel="stylesheet" href="project.css">
<!-- <link rel="stylesheet" href="project-form.css"> -->
<?php
include_once 'boot.php';
$lno='';
if(isset($_GET['lno']) && !empty($_GET['lno'])){
	$lno = $_GET["lno"];
}
?>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<a href="assign1.php"><button style='font-size:24px'>HOME<i class='fas fa-caret-square-left'></i></button></a>
<dav style="position: absolute; right: 10px;"><a href="logout.php"><button style='font-size:24px'>LOGOUT<i class='fas fa-caret-square-left'></i></button></a><br></dav>
<style>
div {
  position:relative;
  height: 90%;
  width: 50%;
  background-color:#e9ebee;
  border-radius: 25px;
}
  body {
  background-color: white;
}
h1{
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
h2 {
  text-shadow: 0 0 3px #FF0000;
}
/*input[type="reset"] {
  background-color: #4caf50;
  border-radius: 10px;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}*/

</style>
</head>
<br>
<center>
<div>
<form action="project.php" method="post" autocomple="off">
<img src="logo.png" align="left" height="110" width="95%">
<center><b><h2><u>STUDENT'S LOCKER OWNER FORM</u></h2></b></center>

<table>
<tr>
<td><label><b>STUDENT'S NAME:</b></label></td>
<td><input type="text" placeholder="eg:abc" name="sname" required></td>
</tr>
<tr>
<td><label><b>EMAIL:</b></label></td>
<td><input type="text" placeholder="eg:abc@gmail.com" name="email" id="email" required>
<div class="emfb">
</div></td>
</tr>
<tr>
<td><label><b>LOCKER NUMBER:</b></label></td>
<?php if($lno!='') {?>
<td><input type="number" placeholder="eg:1112" name="lockerno" value= "<?php echo $lno;?>" maxlength="4" required></td>
<?php } else{ ?>
<td><input type="number" placeholder="eg:1112" name="lockerno" maxlength="4" required></td>
<?php } ?>
</tr>
<tr>
<td><label><b>LOCKER KEY NUMBER:</b></label></td>
<td><input type=" key number" placeholder="eg:1112" name="lockerkeyno" maxlength="4"></td>
</tr>
<tr>
<td><label><b>YEAR OF STUDYING:</b></label></td>
<td><select name="yos">
<option value="" disabled selected>Please choose your year of studying</option>
<option value="FE">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
</select></td>
</tr>
<tr>
<td><label><b>CHOOSE YOUR STREAM:</b></label></td>
<td><select name="cys">
<option value="" disabled selected>Please choose your stream</option>
<option value="COMPUTER">COMPUTER</option>
<option value="IT">IT</option>
<option value="EXTC">EXTC</option>
<option value="ETRX">ETRX</option>
<option value="CIVIL">CIVIL</option>
</select></td>
</tr>
<tr>
<td><label><b>ADMISSION YEAR:</b></label></td>
<td><input type="text" placeholder="eg:2019-20" name="year" required></td>
</tr>
<tr>
<td><label><b>MOBILE NO.OF STUDENT:</b></label></td>
<td><input type="number" placeholder="" name="number" maxlength="10" id="number" required>
<div class="mbfb"></div></td>
</tr>
<tr>
<td><label><b>MOBILE NO.OF PARENT:</b></label></td>
<td><input type="number" placeholder="" name="mnumber" maxlength="10" id="mnumber">
<div class="mobfb"></div></td>
</tr>
<tr>
<td><label><b>DATE OF ISSUE:</b></label></td>
<td><input type="date" name="doi"></td>
</tr>
<tr>
<td><label><b>YEAR OF SUBMISSION:</b></label></td>
<td><input type="text" name="dos" placeholder="eg: 2019-20"></td>
</tr>
</table>
<input type="submit" name="submit" value="Submit" id="sub">
<input type="reset" value="Reset">

</form>
<script type="text/javascript">
	
	var e=0;
	$('#email').blur(function  () {
		emailVerification();
		console.log(e);
	});
	function emailVerification () {
			var mail = $('#email').val();
			if (mail == "" || mail == null) {
				e=0;
			$('#email').css('border-color','red');
			$('.emfb').html("<span style='color:red'>Enter valid email id</span>");
			} else{
			var emailReg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (emailReg.test(mail)) {
		 	e = 1;
		 	$('#email').css('border-color','#CDE4DA');
		 	$(".emfb").html("");
		 	}else{
		 	e = 0;
		 	$('#email').css('border-color','red');
		 	$(".emfb").html("<span style='color:red'>Enter Valid Email-id!.....</span>");
		 	  	} 
			}
	}
		var m=0;
	$('#number').blur(function  () {
		mobileVerification();
		console.log(m);
	});	
	function mobileVerification () 
	{
		var mobile = $('#number').val();
		if (mobile == "" || mobile == null) {
			m=0;
			$('#number').css('border-color','red');
			$('.mbfb').html("<span style='color:red'>Enter Valid Mobile-Number!.....</span>")
		} else{
			  if (mobile.length != 10)
            {	
            	m=0;
               alert('Phone number must be 10 digits.');
               $('#number').css('border-color','red');
               $('.mbfb').html("<span style='color:red'>Enter valid mobile-number</span>");
           	}else{
           	   m=1;
           	   $('#number').css('border-color','#CDE4DA');
               $('.mbfb').html("");
           }
		}
	}
			var n=0;
	$('#mnumber').blur(function  () {
		mobilenVerification();
		console.log(n);
	});	
	function mobilenVerification () 
	{
		var mobilen = $('#mnumber').val();
		if (mobilen == "" || mobilen == null) {
			n=0;
			$('#mnumber').css('border-color','red');
			$('.mobfb').html("<span style='color:red'>Enter Valid Mobile-Number!.....</span>")
		} else{
			  if (mobilen.length != 10)
            {	
            	n=0;
               alert('Phone number must be 10 digits.');
               $('#mnumber').css('border-color','red');
               $('.mobfb').html("<span style='color:red'>Enter Valid Mobile-Number</span>");
           	}else{
           	   n=1;
           	   $('#mnumber').css('border-color','#CDE4DA');
               $('.mobfb').html("");
           }
		}
	}
	

	$('#sub').click(function  () {
		emailVerification();
		mobileVerification();
		console.log("mail="+e+"mobile="+m);
		if (e==0 || m==0 || n==0) {
			event.preventDefault();
			event.stopPropagation();		
		}

	});
	
	


</script>
</div>
</center>
<?php  include_once 'name.php'?>
<?php 
  }
  else{
    header("Location: index.php");
  }
  ?>
</html>