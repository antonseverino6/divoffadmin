<?php 

	require_once '../includes/init.php';

	if(isset($_POST['id'])) {
		$output = '';
		$sql = "SELECT * FROM details WHERE id=" .$db->fix_string($_POST['id']) ."";

		$result = $db->query($sql);

		
		$output .= "<table class='table table-bordered' id='modal_civil_table'>";
		if($result->num_rows > 0) {
			while($detials_row = $result->fetch_array()):

            
         			  
			$output .= "


						<tr>
							<td style='width: 200px;'>Special Order Number/ Nature of Appt.</td><td class='person-info'>".$detials_row['special_order_no']."</td>
							<td>Station / <br> Nature of Ass. / School</td><td class='person-info'>".$detials_row['nature_of_assignment']."</td>
						</tr>

						<tr>
							<td>Regular, Temporary or Subtitute</td><td class='person-info'>".$detials_row['reg_temp_sub']."</td>
							<td>Item Number</td><td class='person-info'>".$detials_row['details_item_number']."</td>
						</tr>

						<tr>
							<td>Effective Date</td><td class='person-info'>".$detials_row['reg_effective_date']."</td><td>Position</td>
							<td class='person-info'>".$detials_row['position']."</td>
						</tr>

						<tr>
							<td>Annual Salary</td><td class='person-info'>".$detials_row['annual_salary']."</td><td>Remarks</td>
							<td class='person-info'>".$detials_row['remarks']."</td>
						</tr>
						<tr>
							<td>Source of Fund</td><td class='person-info'>".$detials_row['source_fund']."</td>
							<td></td><td></td>
						</tr>";
						
			
			endwhile;
				 $output .= "</table>";
			
		echo $output;

		}
	}