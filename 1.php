<?php
	$db_handle = pg_connect("host=localhost dbname=nic user=postgres password=password");
	if ($db_handle) 
	{
		//echo 'Connection attempt succeeded.';
	} 
	else 
	{
		echo 'Connection attempt failed.';
	}

	echo "<h3>Connection Information</h3>";
	echo "DATABASE NAME:" . pg_dbname($db_handle) . "<br>";
	echo "HOSTNAME: " . pg_host($db_handle) . "<br>";
	echo "PORT: " . pg_port($db_handle) . "<br>";


	$query = "select id, fullname, address, district, city, email from user1";
	//$query = "SELECT id,email from user1";
	$result = pg_exec($db_handle, $query);
	if ($result) 
	{
		//echo "The query executed successfully.<br>";
		
		echo "<table border='1' align='center'>";
			echo "<tr>";
				echo "<td colspan='6' align='center'> <h2><b>NIC REGISTER DETAIL </b></h2></td>";
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