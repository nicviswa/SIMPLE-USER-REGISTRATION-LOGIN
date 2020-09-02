<?php 
//require_once("includes/config.php");
include('include/config.php');
if(!empty($_POST["email"])) 
{
	$email= $_POST["email"];
	
	$query = "SELECT  email FROM  user1 WHERE  email='$email'";
	$result = pg_exec($db_handle, $query);
	if ($result)
	{
		$count = pg_numrows($result);
		//echo $count;
	
		//$result =mysqli_query($con,"SELECT  email FROM  user1 WHERE  email='$email'");
		//$count=mysqli_num_rows($result);
		if($count>0)
		{
			echo "<span style='color:red'><b>$count</b> Email already exists. Try with some other ID .</span>";
			//echo "<script>$('#submit').prop('disabled',true);</script>";
		} 
		else
		{
			
			echo "<span style='color:green'> Email available for Registration .</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}

}
?>
