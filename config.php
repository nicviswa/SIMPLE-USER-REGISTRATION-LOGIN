<?php

	$db_handle = pg_connect("host=localhost port=5432 dbname=nic1 user=postgres password=password");
	if ($db_handle) 
	{
		//echo 'Connection attempt succeeded.';
	} 
	else 
	{
		echo 'Connection attempt failed.';
	}

	//print_r(get_loaded_extensions());
	
    //echo extension_loaded('pgsql') ? 'yes':'no';
	
	//echo "<h3>Connection Information</h3>";
	//echo "DATABASE NAME:" . pg_dbname($db_handle) . "<br>";
	//echo "HOSTNAME: " . pg_host($db_handle) . "<br>";
	//echo "PORT: " . pg_port($db_handle) . "<br>";
?>

<?php
/*
    $db = pg_connect("host=localhost port=5432 dbname=db_test user=postgres password=123abc");//line 5
    if($db){
        echo "Connected\n";
    } else {
        echo "Error NotConnected\n";
    }
	
	CREATE DATABASE cppp893 WITH OWNER = cppp ENCODING = 'UTF8' CONNECTION LIMIT = -1;
*/


?>
