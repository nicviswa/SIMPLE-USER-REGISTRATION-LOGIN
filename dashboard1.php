<?php
	session_start();
	error_reporting(0);
	include "include/config.php";
//	include('include/config.php');
	include('include/checklogin.php');
	check_login();
	


	$query = "select id, fullname, address, district, city, email from user1";
	$result = pg_exec($db_handle, $query);
	if ($result) 
	{		
		echo "<table border='1' align='center'>";
			echo "<tr>";
				echo "<td colspan='6' align='center'> <h2><b>NIC LOGIN DETAIL </b></h2></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td> ID </td>";	echo "<td> FULLNAME </td>";	echo "<td> ADDRESS </td>";
				echo "<td> DISTRICT </td>";	echo "<td> CITY </td>";	echo "<td> EMAIL </td>";
			echo "</tr>";
			
			$row = 0;
			while($row < pg_numrows($result))
			{
				echo "<tr>";
					echo "<td>";	echo pg_result($result, $row, 'id');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'fullname');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'address');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'district');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'city');	echo "</td>";
					echo "<td>";	echo pg_result($result, $row, 'email');	echo "</td>";
					
				echo "</tr>";
				$row++;
			}
			echo "<tr>";
				echo "<td colspan='6' align='center'> <h2><b><a href='logout.php' >LOG OUT</a> </b></h2></td>";
			echo "</tr>";
/*
		for ($row = 0; $row < pg_numrows($result); $row++) 
		{
			$firstname = pg_result($result, $row, 'id');
			echo $firstname ." ";
			$lastname = pg_result($result, $row, 'email');
			echo $lastname ."<br>";
		}
*/
	}

	else 
	{
		echo "The query failed with the following error:<br>";
		echo pg_errormessage($db_handle);
	}
	pg_close($db_handle);
?>