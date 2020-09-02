<?php
	if(isset($_POST["district"]))
	{
		$district = $_POST["district"];
     
		$districtArr = array(	"chennai" => array("Alandur", "Guindy", "Besant Nagar"),
								"villupuram" => array("Tindivanam", "Gingee", "Thirukoilur")
							);
     
		if($district !== 'Select')
		{
			echo "<label>City:</label>";
			echo "<select name='city'>";
				echo "<option>Select City</option>";
			foreach($districtArr[$district] as $value)
			{
				echo "<option>". $value . "</option>";
			}
			echo "</select>";
		} 
	}
?>