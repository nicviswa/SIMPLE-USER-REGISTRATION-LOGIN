<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Dashboard</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<br/><br/>
		<table border="1" align="center" id='customers'>
			<tr>
				<th colspan="9" align="center">LOGIN DETAIL</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>FULL NAME</th>
				<th>ADDRESS</th>
				<th>DISTRICT</th>
				<th>CITY</th>
				<th>GENDER</th>
				<th>EMAIL</th>
				<th>EDIT</th>
				<th>DELETE</th>
				
			</tr>
			
				
		<?php
		
			$query = "select id, fullname, address, district, city, gender, email from user1";
			$result = pg_exec($db_handle, $query);
			if ($result)
			{
			$row = 0;
			while($row < pg_numrows($result))
			{
				echo "<tr>";
					echo "<td>";	echo pg_result($result, $row, 'id');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'fullname');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'address');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'district');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'city');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'gender');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'email');	echo "</td>";
					$userid = pg_result($result, $row, 'id');
					echo "<td>";	echo "<a href='edituser.php?userid=$userid' >EDIT</a>";	echo "</td>";
					//echo "<td>";	echo $userid;	echo "</td>";
					echo "<td>";	echo "<a href='deleteuser.php?userid=$userid' >DELETE</a>";	echo "</td>";
					//echo "<td>";	echo "<a href='edituser.php?userid='> EDIT</a>"; echo "<td>";
					//echo "<td>";	echo pg_result"<a href='edituser.php?userid=$row1[id]' target='_blank'>EDIT</a>";	echo "</td>";
					//echo "<td>";	echo "<a href='deleteuser.php?userid=$row1[id]' target='_blank'>DELETE</a>";	echo "</td>";
					
					
					
					 
				echo "</tr>";
				$row++;
			}
			}
		?>
		
		<tr>
			<td colspan="7" align="center">
				<h2><a href="logout.php">LOGOUT</a></h2>
			</td>
		</tr>
<style>
	#customers 
	{
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 50%;
	}

	#customers td, #customers th 
	{
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th 
	{
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: center;
	  background-color: #4CAF50;
	  color: white;
	}
</style>


	</body>
</html>