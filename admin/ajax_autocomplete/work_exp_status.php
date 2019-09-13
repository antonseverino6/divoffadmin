<?php  

	require_once '../includes/init.php';

		$keyword = $db->fix_string(strval($_POST['query']));
		$search_param = "{$keyword}%";

		$result = $db->query("SELECT DISTINCT status FROM work_exp WHERE status LIKE '".$search_param."'");

		$data = [];

		if($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				$data[] = $row['status'];
			}
			echo json_encode($data);
		}	

?>		