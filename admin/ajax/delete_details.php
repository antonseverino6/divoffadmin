<?php 

require_once '../includes/init.php';

$details_id = '';
$tin_num = '';


if(isset($_POST['details_id'])) {
	$details_id = trim($db->fix_string($_POST['details_id']));
	$tin_num = trim($db->fix_string($_POST['tin_num']));


	$sql = "DELETE FROM details WHERE id= $details_id";

	if($db->query($sql)) {

            $query = "SELECT * FROM details WHERE tin_num= '$tin_num'";
            $result = $db->query($query);
            while($details_row = $result->fetch_array()):

                echo "<tr><td class='person-info'>" . $details_row['special_order_no'] . "</td>";
                echo "<td class='person-info'>".$details_row['reg_temp_sub'] ."</td>";
                echo "<td class='person-info'>".$details_row['reg_effective_date'] ."</td>";
                echo "<td class='person-info'>".$details_row['source_fund'] ."</td>";
                echo "<td class='person-info  table-data-action'><a name='view_details' class='view_details' id='".$details_row['id']."' title='View'><i class='far fa-eye'></i></a> ";
                echo "<a name='edit_details_btn' class='edit_details_btn' id='".$details_row['id']."' title='Edit'><i class='far fa-edit'></i></a> ";
                echo "<a name='delete_details_btn' class='delete_details_btn' id='".$details_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td></tr>";  

            endwhile; 
	}

}