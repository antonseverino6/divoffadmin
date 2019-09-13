<?php require_once '../includes/init.php'; 

	$error = '';


	if(isset($_GET['sn'])) {

		$result = $db->query("SELECT * FROM other_info"); 

		if($result->num_rows < 1 ) {
			$error = "<script>Swal.fire('','Other info doesn\'t have any record!','warning');</script>";
		}else {
			$file_name = 'other_info';

			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='. $file_name .'_'. $_GET['sn'] .'.csv');

			$output =  fopen("php://output", "w");

			$other_info_head = array('tin_num','spouse_name','spouse_occ','spouse_add','high_deg_received','year_received','name_of_institution',
									 'spec_qualification','prev_experience','teach_comp_exam_score','teach_comp_exam_date','gsis_no','level_civil_service','employee','employee_type','position','philhealth_no',
									 'prc_license','lbp_no','pag_ibig_no');

			fputcsv($output, $other_info_head);



			$sql = "SELECT * FROM other_info ORDER BY id ASC";
			$result = $db->query($sql);


			while($row = $result->fetch_assoc()) {
				$table_row = array("\t".$row['tin_num'],$row['spouse_name'],$row['spouse_occ'],$row['spouse_add'],$row['high_deg_received'],
								   $row['year_received'],$row['name_of_institution'],$row['spec_qualification'],$row['prev_experience'],
								   $row['teach_comp_exam_score'],$row['teach_comp_exam_date'],$row['gsis_no'],$row['level_civil_service'],$row['employee'],$row['employee_type'],$row['position'],$row['philhealth_no'],$row['prc_license'],
								   $row['lbp_no'],$row['pag_ibig_no']);
				
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