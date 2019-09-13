<?php 

	require_once '../includes/init.php';

	if(isset($_POST['id'])) {
		$output = '';
		$sql = "SELECT * FROM civil_service WHERE id=" . $db->fix_string($_POST['id']) ."";

		$result = $db->query($sql);

		
		$output .= "<table class='table table-bordered' id='modal_civil_table'>";
		if($result->num_rows > 0) {
			while($civil_row = $result->fetch_array()):

            
         			  
			$output .= "
						<tr><td style='width: 200px;'>C.S. Examination</td><td class='person-info'>".$civil_row['cs_exam']."</td></tr>
						<tr><td>Passed Rating</td><td class='person-info'>".$civil_row['cs_passed_rating']."</td></tr>
						<tr><td>Date Examination</td><td class='person-info'>".$civil_row['cs_date_passed']."</td></tr>";
						
			
			endwhile;
				 $output .= "</table>";
			
		echo $output;

		}
	}