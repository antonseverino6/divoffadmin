<?php  

	require_once '../includes/init.php';

		$keyword = $db->fix_string(strval($_POST['query']));
		$search_param = "{$keyword}%";

		$result = $db->query("SELECT DISTINCT nature_of_assignment FROM details WHERE nature_of_assignment LIKE '".$search_param."'");

		$data = [];

		if($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				$data[] = $row['nature_of_assignment'];
			}
			echo json_encode($data);
		}	

?>		