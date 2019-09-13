<?php require_once '../includes/init.php'; 

	$error = '';

	if(isset($_GET['sn'])) {

		$result = $db->query("SELECT * FROM work_exp");

		if($result->num_rows < 1 ) {
			$error = "<script>Swal.fire('','Work Experience doesn\'t have any record!','warning');</script>";
		}else {
			$file_name = 'work_exp';

			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='. $file_name .'_'. $_GET['sn'] .'.csv');

			$output =  fopen("php://output", "w");

			$work_exp_head = array('id','tin_num','comp_name','status','designation','salary','branch','exp_date_from','exp_date_to',
							  'leave_abs','leave_abs_date');

			fputcsv($output, $work_exp_head);



			$sql = "SELECT * FROM work_exp ORDER BY id ASC";
			$result = $db->query($sql);


			while($row = $result->fetch_assoc()) {
				$table_row = array($row['id'],"\t".$row['tin_num'],$row['comp_name'],$row['status'],$row['designation'],$row['salary']."\t",
								   $row['branch'],$row['exp_date_from'],$row['exp_date_to'],$row['leave_abs'],$row['leave_abs_date']);
				
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
