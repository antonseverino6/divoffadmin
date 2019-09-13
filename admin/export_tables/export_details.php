<?php require_once '../includes/init.php'; 


	$error = '';

	if(isset($_GET['sn'])) {

		$result = $db->query("SELECT * FROM details");

		if($result->num_rows < 1) {
			$error = "<script>Swal.fire('','Details doesn\'t have any record!','warning');</script>";
		}else {
			$file_name = 'details';

			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='. $file_name .'_'. $_GET['sn'] .'.csv');

			$output =  fopen("php://output", "w");
			$details_head = array('id','tin_num','special_order_no','reg_temp_sub','reg_effective_date','annual_salary','source_fund',
								  'nature_of_assignment','details_item_number','position','remarks');

			fputcsv($output, $details_head);

			$sql = "SELECT * FROM details ORDER BY id ASC";
			$result = $db->query($sql);


			while($row = $result->fetch_assoc()) {

				$table_row = array($row['id'],"\t".$row['tin_num'],$row['special_order_no'],$row['reg_temp_sub'],$row['reg_effective_date'],
								   $row['annual_salary'],$row['source_fund'],$row['nature_of_assignment'],$row['details_item_number'],
								   $row['position'],$row['remarks']);
				
				fputcsv($output, $table_row);
			}

			fclose($output);
		}
	}else {
		redirect('../index.php');
	}


	if($error !== '') {
		$session->message($error);
		redirect('../backuptables.php');
	}	