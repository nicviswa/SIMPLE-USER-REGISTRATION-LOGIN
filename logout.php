<?php
session_start();
	include('include/config.php');
	$_SESSION['login']=="";
	date_default_timezone_set('Asia/Kolkata');
	$ldate=date( 'd-m-Y h:i:s A', time () );
	
	/*
	$query = "UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1";
			//echo $query;
			$result = pg_exec($db_handle, $query);
			if($result)
			{
				echo "<script>alert('You are logged out');</script>" ;
			}
	//mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
	*/
	echo "<script>alert('You are logged out');</script>" ;
	session_unset();
	//session_destroy();
	$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="user-login.php";
</script>
