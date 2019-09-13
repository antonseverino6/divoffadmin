<?php 

require_once '../includes/init.php';

$civil_id = '';
$tin_num = '';


if(isset($_POST['civil_id'])) {
	$civil_id = trim($db->fix_string($_POST['civil_id']));
	$tin_num = trim($db->fix_string($_POST['tin_num']));


	$sql = "DELETE FROM civil_service WHERE id= $civil_id";

	if($db->query($sql)) {

            $query = "SELECT * FROM civil_service WHERE tin_num= '$tin_num'";
            $result = $db->query($query);
            while($civil_row = $result->fetch_array()):

                echo "<tr><td class='person-info'>" . $civil_row['cs_exam'] . "</td>";
                echo "<td class='person-info'>". $civil_row['cs_passed_rating'] ."</td>";
                echo "<td class='person-info'>". $civil_row['cs_date_passed'] ."</td>";
                echo "<td class='person-info table-data-action'><a name='view_civil' class='view_civil' id='".$civil_row['id']."' title='View'><i class='far fa-eye'></i></a>&nbsp;";
                echo "<a name='edit_civilserv_btn' class='edit_civilserv_btn' id='".$civil_row['id']."' title='Edit'><i class='far fa-edit'></i></a>&nbsp;";
                echo "<a name='delete_civilserv_btn' class='delete_civilserv_btn' id='".$civil_row['id']."' title='Delete'><i class='far fa-trash-alt'></i></a></td></tr>";

            endwhile; 
	}

}