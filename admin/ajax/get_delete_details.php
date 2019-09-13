<?php

    require_once '../includes/init.php';


    if(isset($_POST['id'])) {
    	$output = '';

		$sql = "SELECT id,tin_num FROM details WHERE id= ".$db->fix_string($_POST['id'])."";
		$result = $db->query($sql);

		$details_row = $result->fetch_array();

		$output .= "<p>Are you sure you want to delete this?</p>";
		$output .= "<form action='ajax/delete_details.php' method='post' id='delete_details_form'>
					<input type='hidden' name='details_id' value='". $details_row['id']."'>
					<input type='hidden' name='tin_num' value='". $details_row['tin_num']."'>
					</form>";

		echo $output;
    }