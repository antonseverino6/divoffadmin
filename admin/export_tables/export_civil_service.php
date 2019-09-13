<?php require_once '../includes/init.php'; 

	$error = '';

	if(isset($_GET['sn'])) {

		$result = $db->query("SELECT * FROM civil_service");		

		if($result->num_rows < 1) {
			$error = "<script>Swal.fire('Warning','Civil Service doesn\'t have any record!','warning');</script>";
		}else {
			$file_name = 'civil_service';

			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='. $file_name .'_'. $_GET['sn'] .'.csv');

			$output =  fopen("php://output", "w");
			// $info_table = ;
			fputcsv($output, array('id','tin_num','cs_exam','cs_passed_rating','cs_date_passed'));



			$sql = "SELECT * FROM civil_service ORDER BY id ASC";
			$result = $db->query($sql);


			while($row = $result->fetch_assoc()) {
				$table_row = array($row['id'],"\t".$row['tin_num'],$row['cs_exam'],$row['cs_passed_rating'],$row['cs_date_passed']);
				
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


