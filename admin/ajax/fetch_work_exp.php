<?php 

	require_once '../includes/init.php';

	if(isset($_POST['id'])) {
		$output = '';
		$sql = "SELECT * FROM work_exp WHERE id=" . $db->fix_string($_POST['id']) ."";

		$result = $db->query($sql);

		
		$output .= "<table class='table table-bordered' id='modal_workexp_table'>";
		if($result->num_rows > 0) {
			while($workexp_row = $result->fetch_array()):

            
         			  
			$output .= "<tr><td colspan='2' style='text-align: center; background-color: #dddfeb;'>Service (Inclusive Dates)</td></tr>
						<tr><td style='width: 200px;'>From</td><td class='person-info'>".$workexp_row['exp_date_from']."</td></tr>
						<tr><td>To</td><td class='person-info'>".$workexp_row['exp_date_to']."</td></tr>

						<tr><td colspan='2' style='text-align: center; background-color: #dddfeb;'>Record of Appointment</td></tr>
						<tr><td>Designation</td><td class='person-info'>".$workexp_row['designation']."</td></tr>
						<tr><td>Status</td><td class='person-info'>".$workexp_row['status']."</td></tr>
						<tr><td>Salary</td><td class='person-info'>".$workexp_row['salary']."</td></tr>

						<tr><td colspan='2' style='text-align: center; background-color: #dddfeb;'>Office/Division</td></tr>
						<tr><td>Station/Place of Assignment</td><td class='person-info'>".$workexp_row['comp_name']."</td></tr>	
						<tr><td>Branch</td><td class='person-info'>".$workexp_row['branch']."</td></tr>

						<tr><td colspan='2' style='text-align: center; background-color: #dddfeb;'>Separation</td></tr>
						<tr><td>Lv. of abs. w/o pay</td><td class='person-info'>".$workexp_row['leave_abs']."</td></tr>
						<tr><td>Date</td><td class='person-info'>".$workexp_row['leave_abs_date']."</td></tr>";
						
			
			endwhile;
				 $output .= "</table>";
			
		echo $output;

		}
	}