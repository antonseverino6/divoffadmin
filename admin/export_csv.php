<?php require_once 'includes/init.php'; 


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output =  fopen("php://output", "w");
// $info_table = ;
fputcsv($output, array('title','first_name','middle_name','last_name','birth_date','place_birth','per_address','civil_status','role_type',
					'email','employee_id','tin_num','div_code','job_title_code','employ_status','date_join','contact_num','work_shift','biometric_id',
					'region_org_code','school_id','suffix','item_number','date_orig_appointment'));



$sql = "SELECT * FROM info ORDER BY id DESC";
$result = $db->query($sql);


while($row = $result->fetch_assoc()) {
	$table_row = array($row['title'],$row['first_name'],$row['middle_name'],$row['last_name'],$row['birth_date'],$row['place_birth'],$row['per_address'],$row['civil_status'],$row['role_type'],
					$row['email'],$row['employee_id'],$row['tin_num'],$row['div_code'],$row['job_title_code'],$row['employ_status'],$row['date_join'],$row['contact_num'],$row['work_shift'],$row['biometric_id'],
					$row['region_org_code'],$row['school_id'],$row['suffix'],$row['item_number'],$row['date_orig_appointment']);
	
	fputcsv($output, $table_row);
}

fclose($output);