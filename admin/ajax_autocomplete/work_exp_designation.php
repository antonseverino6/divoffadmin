<?php  

	require_once '../includes/init.php';

		$keyword = $db->fix_string(strval($_POST['query']));
		$search_param = "{$keyword}%";

		$result = $db->query("SELECT DISTINCT designation FROM work_exp WHERE designation LIKE '".$search_param."'");

		$data = [];

		if($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				$data[] = $row['designation'];
			}
			echo json_encode($data);
		}	

?>		