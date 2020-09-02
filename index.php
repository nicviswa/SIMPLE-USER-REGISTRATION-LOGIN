<?php
	session_start(); 
	include_once('include/config.php');
	if(isset($_POST['submit']))
	{
		$emailidcheck = $_POST['email'];
		if ($_POST["captcha"] != $_SESSION["captchaimgval"])  
		{
			echo "<script>alert('Incorrect verification code');</script>" ;
		}
		
		else
		{
			$fname=$_POST['full_name'];
			$address=$_POST['address'];
			$city=$_POST['city'];
			$gender=$_POST['gender'];
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$district=$_POST['district'];
			$city=$_POST['city'];
			
			
			$query = "SELECT  email FROM  user1 WHERE  email='$email'";
			$result = pg_exec($db_handle, $query);
			$count = pg_numrows($result);
			if($count>0)
			{
				echo "<script>alert('Email already exists. Try with some other ID ');</script>" ;
				//echo "<span style='color:red'> Email already exists. Try with some other ID .</span>";
			}
			else
			{
				$insertquery = "insert into user1(fullname,address,district,city,gender,email,password) values('$fname','$address','$district','$city','$gender','$email','$password')";
				$insertqueryresult = pg_exec($db_handle, $insertquery);
				//$query=mysqli_query($con,"insert into users(fullname,address,district,city,gender,email,password) values('$fname','$address','$district','$city','$gender','$email','$password')");
				if($insertqueryresult)
				{
					echo "<script>alert('Successfully Registered. You can login now');</script>";
					//header('location:dashboard.php');
				}
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script>
		$(document).ready(function(){
			$("select.district").change(function(){
				var selecteddistrict = $(".district option:selected").val();
				$.ajax({
					type: "POST",
					url: "process-request.php",
					data: { district : selecteddistrict } 
				}).done(function(data){
					$("#response").html(data);
				});
			});
		});
		</script>
		
<script type="text/javascript">
	function valid()
	{
		//var full_name = document.forms["myForm"]["fname"].value;
		var full_name = document.registration.full_name.value;
		if (full_name != "") 
		{
			var full_name_length = full_name.length;
			if (full_name_length < 2 )
			{
				alert("Name must atleast two character");
				return false;
			}
		}
		else
		{
			alert("Name should not empty");
			return false;
		}
		
		var address = document.registration.address.value;
		if (address != "") 
		{
			var address_length = address.length;
			if (address_length < 2 )
			{
				alert("Address must atleast two character");
				return false;
			}
		}
		else
		{
			alert("Address should not empty");
			return false;
		}
		
		var district = document.registration.district.value;
		if (district == "") 
		{
			alert("District should select");
			return false;
		}
		
		var city = document.registration.city.value;
		if (city == "") 
		{
			alert("city should select");
			return false;
		}
		
		var gender = document.registration.gender.value;
		if (gender == "") 
		{
			alert("Gender should select");
			return false;
		}
		
		var email = document.registration.email.value;
		var emailregexp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (emailregexp.test(email) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }
		/*
		else
		{
			
				$("#loaderIcon").show();
				jQuery.ajax({
				url: "check_availability.php",
				data:'email='+$("#email").val(),
				type: "POST",
				success:function(data){
				$("#user-availability-status1").html(data);
				$("#loaderIcon").hide();
				},
				error:function (){}
				});
			
		}
		*/
		
		var password = document.registration.password.value;
		if (password != "") 
		{
			var password_length = password.length;
			if (password_length < 6 )
			{
				alert("Passwordmust contain atleast 6 character");
				return false;
			}
		}
		
		if(document.registration.password.value!= document.registration.password_again.value)
		{
			alert("Password and Confirm Password Field do not match  !!");
			document.registration.password_again.focus();
			return false;
		}
		return true;
	}
</script>

		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2> NIC REGISTRATION</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<!-- <form name="registration" id="registration"  method="post" onSubmit="return valid();" > -->
					<form name="registration" id="registration"  method="post" onSubmit="return valid();" class="form-login">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<!--
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" required>
							</div>
							-->
							<div class="form-group">
								<label class="block">
									District
								</label>
								<select class="district" name="district" required>
									<option value ="">Select District</option>
									<option value="chennai">Chennai</option>
									<option value="villupuram">Villupuram</option>
								</select>
								<label class="block">
									City
								</label>
								<span id="response">
									<!--Response will be inserted here-->
								</span>
							</div>
							
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" required>
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<!-- <input type="email" class="form-control" name="email" id="email" onBlur="EmailAvailability()"  placeholder="Email" required> -->
									<input type="email" class="form-control" name="email" id="email" onblur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							
							
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							
							<label for="rg-male">
								Captcha: &nbsp;<img src="captcha.php" style="margin-top: 1%" id="captcha">
									<input type="button" id="reload" value="Reload" />
							</label>
							<div class="form-group">
								<input type="number" class="form-control" name="captcha" placeholder="Enter Captcha Value" required>
							</div>
							<!--
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							-->
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
<script>
	function userAvailability() 
	{
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
	}
</script>	

<script>
	$(function() 
	{ // Handler for .ready() called.
		$('#reload').click(function(){
			//$('#captcha').attr('src', 'captcha.php?' + (new Date).getTime());
			$('#captcha').attr('src', 'captcha.php?');
		});
	});
</script>
		
	</body>
	<!-- end: BODY -->
</html>