<?php

    require_once '../includes/init.php';


    if(isset($_POST['id'])) {
    	$output = '';

		$sql = "SELECT id,tin_num FROM civil_service WHERE id= ".$db->fix_string($_POST['id'])."";
		$result = $db->query($sql);

		$civil_row = $result->fetch_array();

		$output .= "<p>Are you sure you want to delete this?</p>";
		$output .= "<form action='ajax/delete_civil_service.php' method='post' id='delete_civil_service_form'>
					<input type='hidden' name='civil_id' value='". $civil_row['id']."'>
					<input type='hidden' name='tin_num' value='". $civil_row['tin_num']."'>
					</form>";

		echo $output;
    }