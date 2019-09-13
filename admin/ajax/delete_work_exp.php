<?php 

require_once '../includes/init.php';

$work_exp_id = '';
$tin_num = '';


if(isset($_POST['work_exp_id'])) {
	$work_exp_id = trim($db->fix_string($_POST['work_exp_id']));
	$tin_num = trim($db->fix_string($_POST['tin_num']));


	$sql = "DELETE FROM work_exp WHERE id= $work_exp_id";

	if($db->query($sql)) {
        $query = "SELECT * FROM work_exp WHERE tin_num='$tin_num'";
        $result = $db->query($query);

		while($work_row = $result->fetch_array()):
	        	echo "<tr>";
	            echo "<td class='person-info'>" . $work_row['comp_name'] . "</td>";
	            echo "<td class='person-info'>". $work_row['status'] ."</td>";
	            echo "<td class='person-info'>". $work_row['designation'] ."</td>";
	            echo "<td class='person-info'>". $work_row['branch'] ."</td>";
	            echo "<td class='person-info'><a class='view_workexp'  id='".$work_row['id']."' title='View'><i class='far fa-eye'></i></a> ";
	            echo "<a name='edit_workexp_btn' class='edit_workexp_btn' id='".$work_row['id']."' title='Edit'><i class='far fa-edit'></i></a> ";
				echo "<a name='delete_workexp_btn' class='delete_workexp_btn' id='".$work_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td>";

	            echo "</tr>";
	    endwhile;        
	}

}