<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html>
<body align="center">
<?php
	$userid= $_REQUEST['userid']; 
	
	
	$selectquery = "SELECT * FROM user1 where id='".$userid."'";
	$result=pg_exec($db_handle,$selectquery);
	if ($result) 
	{

?>							
	<form name="update" action="" method="post" enctype="multipart/form-data">
		<table border="1" align="center" >
			<tr align="center">
				<th colspan="3" align="center">
					<b> USER DATA EDIT</b>
				</th>
			</tr>
			
			<tr align="center">
				<th>
					<b>FIELD NAME </b>
				</th>
				<th>
					<b>ORIGINAL VALUES </b>
				</th>
				<th>
					<b>TYPE NEW VALUE</b>
				</th>
			</tr>
			<?php 
				$row = 0;
				//$noofrows = "noofvaluesfromdb=".pg_numrows($result);
				while($row < pg_numrows($result))
				{
			?>
			<tr align="center">
				<th>
					ID
				</th>
				<td>
					<?php $id1 = pg_result($result, $row, 'id'); ?>
					<input type="text" id="id" name="id" readonly="readonly" value="<?php echo $id1;?>" />
				</td>
				<td>
					<input type="text" id="id" name="id" readonly="readonly" value="<?php echo $id1;?>" />
				</td>
			</tr>
			
			
			
			<tr align="center">
				<th>
					NAME
				</th>
				<td>
					<?php $fullname1 = pg_result($result, $row, 'fullname'); ?>
					<input type="text" id="fullname" name="fullname" readonly="readonly" value="<?php echo $fullname1;?>" />
				</td>
				<td>
					<input type="text" id="fullnamenew" name="fullnamenew" value="<?php echo $fullname1;?>" />
				</td>
			</tr>
				
			<tr align="center">
				<th>
					ADDRESS
				</th>
				<td>
					<?php $address1 = pg_result($result, $row, 'address'); ?>
					<input type="text" id="address" name="address" readonly="readonly" value="<?php echo $address1;?>" />
				</td>
				<td>
					<input type="text" id="addressnew" name="addressnew" value="<?php echo $address1;?>" />
				</td>
			</tr>
			
			<tr align="center">
				<th>
					DISTRICT
				</th>
				<td>
					<?php $district1 = pg_result($result, $row, 'district'); ?>
					<input type="text" id="district" name="district" readonly="readonly" value="<?php echo $district1;?>" />
				</td>
				<td>
					<select name="districtnew" id="districtnew" required>
						<option value="chennai">chennai</option>
						<option value="villupuram">villupuram</option>
					</select> 
				</td>
			</tr>
			
			<tr align="center">
				<th>
					CITY
				</th>
				<td>
					<?php $city1 = pg_result($result, $row, 'city'); ?>
					<input type="text" id="city" name="city" readonly="readonly" value="<?php echo $city1;?>" />
				</td>
				<td>
					<select name="citynew" id="citynew" required>
						<option value="Alandur">Alandur</option>
						<option value="Guindy">Guindy</option>
						<option value="Besant Nagar">Besant Nagar</option>
						<option value="Tindivanam">Tindivanam</option>
						<option value="Gingee">Gingee</option>
						<option value="Thirukoilur">Thirukoilur</option>
					</select> 
				</td>
			</tr>
			
			
			
			<tr align="center">
				<th>
					GENDER
				</th>
				<td>
					<?php $gender1 = pg_result($result, $row, 'gender'); ?>
					<input type="text" id="gender" name="gender" readonly="readonly" value="<?php echo $gender1;?>" />
				</td>
				<td>
					<select name="gendernew" id="gendernew" required>
						<option value="female">female</option>
						<option value="male">male</option>
					</select> 
				</td>
			</tr>
			
			<tr align="center">
				<th>
					EMAIL
				</th>
				<td>
					<?php $email1 = pg_result($result, $row, 'email'); ?>
					<input type="text" id="email" name="email" readonly="readonly" value="<?php echo $email1;?>" />
				</td>
				<td>
					<input type="text" id="emailnew" name="emailnew" value="<?php echo $email1;?>" />
				</td>
			</tr>
			<?php $row++; } ?>
			<tr align="center">
				<th colspan="5">
					<center>
						<input type="submit" value="DELETE" name="submit">
					</center>
				</th>
			</tr>
		</table>
	</form>
	<?php } ?>
	
	
<?php
$status = "";
if(isset($_POST['submit']))
{
	$id = $_POST['id'];	
		
		$delete = "DELETE from user1 where id='".$id."'";
		//echo $update;
		$deleteresult = pg_exec($db_handle, $delete);
		if ($deleteresult) 
		{
		
			//echo "<br/>*** USER DELETED SUCSSFULLY ***<br/>";
			$status = "USER DELETED SUCSSFULLY </br></br>
			<a href='dashboard.php'>View Updated Record</a>";
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			//echo window.history.back();
		}
		else 
		{
			echo "The query failed with the following error:<br>";
			echo pg_errormessage($db_handle);
		}
		
}
?>	