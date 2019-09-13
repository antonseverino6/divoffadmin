<?php require_once '../includes/init.php'; 

	$error = '';

	if(isset($_GET['sn'])) {

		$result = $db->query("SELECT * FROM info");

		if($result->num_rows < 1) {
			$error = "<script>Swal.fire('','Info doesn\'t have any record!','warning');</script>";
		}else {
			$file_name = 'info';
			header('Content-Encoding: UTF-8');
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='.$file_name.'_'. $_GET['sn'] .'.csv');

			$output =  fopen("php://output", "w");
			// $info_table = ;

			$info_head = array('title','first_name','middle_name','last_name','birth_date','place_birth','per_address','civil_status','role_type',
							   'email','employee_id','tin_num','div_code','job_title_code','employ_status','date_join','contact_num','work_shift',
							   'biometric_id','region_org_code','school_id','suffix','item_number','date_orig_appointment','school_name','employee_img','gender','age');

			fputcsv($output, $info_head);



			$sql = "SELECT * FROM info ORDER BY id ASC";
			$result = $db->query($sql);


			while($row = $result->fetch_assoc()) {
				$table_row = array($row['title'],$row['first_name'],$row['middle_name'],$row['last_name'],$row['birth_date'],$row['place_birth'],$row['per_address'],$row['civil_status'],$row['role_type'],
								$row['email'],"\t".$row['employee_id'],"\t".$row['tin_num'],$row['div_code'],$row['job_title_code'],$row['employ_status'],$row['date_join'],$row['contact_num'],$row['work_shift'],$row['biometric_id'],
								$row['region_org_code'],$row['school_id'],$row['suffix'],$row['item_number'],$row['date_orig_appointment'],$row['school_name'],$row['employee_img'],$row['gender'],$row['age']);
				
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
