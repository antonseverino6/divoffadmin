<?php  

	require_once '../includes/init.php';

		$keyword = $db->fix_string(strval($_POST['query']));
		$search_param = "{$keyword}%";

		$result = $db->query("SELECT DISTINCT remarks FROM details WHERE remarks LIKE '".$search_param."'");

		$data = [];

		if($result->num_rows > 0) {
			while($row = $result->fetch_array()) {
				$data[] = $row['remarks'];
			}
			echo json_encode($data);
		}	

?>		