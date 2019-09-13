<?php 


	require_once '../includes/init.php';

	if(isset($_POST['id'])) {
		$output = '';

		$sql = "SELECT id,tin_num FROM work_exp WHERE id= ".$db->fix_string($_POST['id'])."";
		$result = $db->query($sql);

		$work_exp_row = $result->fetch_array();

		$output .= "<p>Are you sure you want to delete this?</p>";
		$output .= "<form action='ajax/delete_work_exp.php' method='post' id='delete_work_exp_form'>
					<input type='hidden' name='work_exp_id' value='". $work_exp_row['id']."'>
					<input type='hidden' name='tin_num' value='". $work_exp_row['tin_num']."'>
					</form>";

		echo $output;			
	}