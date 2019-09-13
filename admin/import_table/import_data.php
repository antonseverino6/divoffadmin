<?php
// require_once '../includes/header.php';
require_once '../includes/init.php';
require_once '../../vendor/autoload.php';
header('Content-Type: text/html; charset=utf-8');
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;	

use PhpOffice\PhpSpreadsheet\Calculation\DateTime;	

// use \PhpOffice\PhpSpreadsheet\Reader\Csv;

if(isset($_POST['imprt_data'])){
	$error = '';
	$allowedFileType = ['application/vnd.ms-excel','text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){
  	 $targetPath = '../imported_data_files/'.$_FILES['file']['name'];	
  	 

 
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)){


	$inputFileType = 'csv';

$inputFileName = $targetPath;
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
$spreadsheet = $reader->load($inputFileName);

$first_col_head = '';
$second_col_head = '';
$third_col_head = '';
$fourth_col_head = '';
$fifth_col_head = '';

	foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
        $first_col_head = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
        $second_col_head = $worksheet->getCellByColumnAndRow(2, 1)->getValue();
        $third_col_head = $worksheet->getCellByColumnAndRow(3, 1)->getValue();
        $fourth_col_head = $worksheet->getCellByColumnAndRow(4, 1)->getValue();
    } 


/* **************************************************** CIVIL SERVICE ********************************************************** */

    if($first_col_head == 'id' && $second_col_head == 'tin_num' && $third_col_head == 'cs_exam' && $fourth_col_head == 'cs_passed_rating') {

		foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
			$highesetRow = $worksheet->getHighestRow();

			for($row = 2; $row<=$highesetRow; $row++) {

				$enc_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$tin_num = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$cs_exam = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$cs_passed_rating = trim($worksheet->getCellByColumnAndRow(4, $row)->getValue());
				$cs_date_passed = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$tin_num = trim($tin_num);

				if(empty($tin_num)){
					continue;
				}else {

					$get_same_emp_id = $db->query("SELECT cs_exam FROM civil_service WHERE enc_id = $enc_id");

					if($get_same_emp_id->num_rows < 1) {
						$sql = "INSERT INTO civil_service(enc_id,tin_num,cs_exam,cs_passed_rating,cs_date_passed) ";
						$sql .= "VALUES('$enc_id','$tin_num','$cs_exam','$cs_passed_rating','$cs_date_passed')";

						$result = $db->query($sql);		
					}else {
						$sql  = "UPDATE civil_service SET tin_num='$tin_num', cs_exam='$cs_exam',";
						$sql .= "cs_passed_rating='$cs_passed_rating',cs_date_passed='$cs_date_passed' ";
						$sql .= "WHERE enc_id=$enc_id AND tin_num='$tin_num'"; 

						$result = $db->query($sql);
					}


					if($result) {
						$session->message("<script>Swal.fire('','Civil Service imported successfully!','success');</script>");
						redirect('../backuptables.php');
					}else {
						 $error = 'Something went wrong';
					}			
				}
			}	
		}
    }

/* **************************************************** DETAILS ********************************************************** */

    if($first_col_head == 'id' && $second_col_head == 'tin_num' && $third_col_head == 'special_order_no' && $fourth_col_head == 'reg_temp_sub') {


		foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
			$highesetRow = $worksheet->getHighestRow();

			for($row = 2; $row<=$highesetRow; $row++) {

				$enc_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$tin_num = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$special_order_no = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$reg_temp_sub = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$reg_effective_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$annual_salary = trim($worksheet->getCellByColumnAndRow(6, $row)->getValue());
				$source_fund = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$nature_of_assignment = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$nat_effective_date = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				$primary_or_intermediate = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
				$tin_num = trim($tin_num);

				if(empty($tin_num)){
					continue;
				}else {

					$get_same_emp_id = $db->query("SELECT special_order_no FROM details WHERE enc_id = $enc_id");

					// if($get_same_emp_id->num_rows < 1) {
					// 	$sql = "INSERT INTO details(enc_id,employee_id,special_order_no,reg_temp_sub,reg_effective_date,";
					// 	$sql .= "annual_salary,source_fund,nature_of_assignment,nat_effective_date,primary_or_intermediate) ";
					// 	$sql .= "VALUES('$enc_id','$employee_id','$special_order_no','$reg_temp_sub','$reg_effective_date','$annual_salary',";
					// 	$sql .= "'$source_fund','$nature_of_assignment','$nat_effective_date','$primary_or_intermediate')";


					// 	$result = $db->query($sql);	
					// }else {
					// 	$sql  = "UPDATE details SET employee_id='$employee_id',special_order_no='$special_order_no',";
					// 	$sql .= "reg_temp_sub='$reg_temp_sub',reg_effective_date='$reg_effective_date',annual_salary='$annual_salary',";
					// 	$sql .= "source_fund='$source_fund',nature_of_assignment='$nature_of_assignment',nat_effective_date='$nat_effective_date',";
					// 	$sql .= "primary_or_intermediate='$primary_or_intermediate' WHERE enc_id=$enc_id AND employee_id='$employee_id'";

					// 	$result = $db->query($sql);	
					// }

					if($get_same_emp_id->num_rows < 1) {
						$sql = "INSERT INTO details(enc_id,tin_num,special_order_no,reg_temp_sub,reg_effective_date,";
						$sql .= "annual_salary,source_fund,nature_of_assignment,details_item_number,position,remarks) ";
						$sql .= "VALUES('$enc_id','$tin_num','$special_order_no','$reg_temp_sub','$reg_effective_date','$annual_salary',";
						$sql .= "'$source_fund','$nature_of_assignment','$details_item_number','$position','$remarks')";


						$result = $db->query($sql);	
					}else {
						$sql  = "UPDATE details SET tin_num='$tin_num',special_order_no='$special_order_no',";
						$sql .= "reg_temp_sub='$reg_temp_sub',reg_effective_date='$reg_effective_date',annual_salary='$annual_salary',";
						$sql .= "source_fund='$source_fund',nature_of_assignment='$nature_of_assignment',details_item_number='$details_item_number',";
						$sql .= "position='$position',remarks='$remarks' WHERE enc_id=$enc_id AND tin_num='$tin_num'";

						$result = $db->query($sql);	
					}					



					if($result) {
						$session->message("<script>Swal.fire('','Details imported successfully!','success');</script>");
						redirect('../backuptables.php');
					}				
				}
			}	
		}
    }

/* **************************************************** WORK EXPERIENCE ********************************************************** */

    if($first_col_head == 'id' && $second_col_head == 'tin_num' && $third_col_head == 'comp_name' && $fourth_col_head == 'status') {


		foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
			$highesetRow = $worksheet->getHighestRow();

			for($row = 2; $row<=$highesetRow; $row++) {
				$enc_id = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$tin_num = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$comp_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$status = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$designation = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$salary = trim($worksheet->getCellByColumnAndRow(6, $row)->getValue());
				$branch = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$exp_date_from = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$exp_date_to = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				$leave_abs = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
				$leave_abs_date = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
				$tin_num = trim($tin_num);

				if(empty($tin_num)){
					continue;
				}else {

					$get_same_emp_id = $db->query("SELECT comp_name FROM work_exp WHERE enc_id = $enc_id");

					if($get_same_emp_id->num_rows < 1) {
						$sql = "INSERT INTO work_exp(enc_id,tin_num,comp_name,status,designation,";
						$sql .= "salary,branch,exp_date_from,exp_date_to,leave_abs,leave_abs_date) ";
						$sql .= "VALUES('$enc_id','$tin_num','$comp_name','$status','$designation','$salary',";
						$sql .= "'$branch','$exp_date_from','$exp_date_to','$leave_abs','$leave_abs_date')";

						$result = $db->query($sql);
					}else {

						$sql  = "UPDATE work_exp SET comp_name='$comp_name',";
						$sql .= "status='$status',designation='$designation', salary='$salary', branch='$branch',";	
						$sql .= "exp_date_from='$exp_date_from',exp_date_to='$exp_date_to',leave_abs='$leave_abs',";
						$sql .= "leave_abs_date='$leave_abs_date' WHERE enc_id=$enc_id AND tin_num='$tin_num'";

						$result = $db->query($sql);
					}


					if($result) {
						$session->message("<script>Swal.fire('','Work Experience imported successfully!','success');</script>");
						redirect('../backuptables.php');
					}			
				}
			}	
		}
    }

/* **************************************************** OTHER INFO ********************************************************** */

    if($first_col_head == 'tin_num' && $second_col_head == 'spouse_name' && $third_col_head == 'spouse_occ' && $fourth_col_head == 'spouse_add') {


		foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
			$highesetRow = $worksheet->getHighestRow();

			for($row = 2; $row<=$highesetRow; $row++) {

				$tin_num = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$spouse_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$spouse_occ = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$spouse_add = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$high_deg_received = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$year_received = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
				$name_of_institution = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$spec_qualification = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$prev_experience = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				$teach_comp_exam_score = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
				$teach_comp_exam_date = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
				$gsis_no = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
				$level_civil_service = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
				$employee = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
				$employee_type = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
				$position = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
				$philhealth_no = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
				$prc_license = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
				$lbp_no = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
				$pag_ibig_no = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
				$tin_num = trim($tin_num);

				if(empty($tin_num)){
					continue;
				}else {

					$get_same_emp_id = $db->query("SELECT spouse_name FROM other_info WHERE tin_num='$tin_num'");

					if($get_same_emp_id->num_rows < 1) {

						$sql  = "INSERT INTO other_info(tin_num,spouse_name,spouse_occ,spouse_add,high_deg_received,year_received,";
						$sql .= "name_of_institution,spec_qualification,prev_experience,teach_comp_exam_score,teach_comp_exam_date,";
						$sql .= "gsis_no,level_civil_service,employee,employee_type,position,philhealth_no,prc_license,lbp_no,";
						$sql .= "pag_ibig_no) ";

						$sql .= "VALUES('$tin_num','$spouse_name','$spouse_occ','$spouse_add','$high_deg_received','$year_received',";
						$sql .= "'$name_of_institution','$spec_qualification','$prev_experience','$teach_comp_exam_score','$teach_comp_exam_date',";
						$sql .= "'$gsis_no','$level_civil_service','$employee','$employee_type','$position','$philhealth_no',";
						$sql .= "'$prc_license','$lbp_no','$pag_ibig_no')";
						$result = $db->query($sql);

					} else {

						$sql  = "UPDATE other_info SET spouse_name='$spouse_name', spouse_occ='$spouse_occ',spouse_add='$spouse_add',";
						$sql .= "high_deg_received='$high_deg_received', year_received='$year_received', name_of_institution='$name_of_institution',";
						$sql .= "spec_qualification='$spec_qualification', prev_experience='$prev_experience',";
						$sql .= "teach_comp_exam_score='$teach_comp_exam_score', teach_comp_exam_date='$teach_comp_exam_date',";
						$sql .= "gsis_no='$gsis_no',level_civil_service='$level_civil_service',employee='$employee',";
						$sql .= "employee_type='$employee_type',position='$position',philhealth_no='$philhealth_no',";
						$sql .= "prc_license='$prc_license',lbp_no='$lbp_no',pag_ibig_no='$pag_ibig_no' WHERE tin_num= '$tin_num'";

						$result = $db->query($sql);
					}

					if($result) {
						$session->message("<script>Swal.fire('','Other Info imported successfully!','success');</script>");
						redirect('../backuptables.php');
					}			
				}
			}	
		}
    }


/* **************************************************** INFO ********************************************************** */

    if($first_col_head == 'title' && $second_col_head == 'first_name' && $third_col_head == 'middle_name' && $fourth_col_head == 'last_name') {
    	$first_name_arr = [];

		foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
			$highesetRow = $worksheet->getHighestRow();

			for($row = 2; $row<=$highesetRow; $row++) {

				$title = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$first_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$middle_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$last_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$birth_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$place_birth = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
				$per_address = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$civil_status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$role_type = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				$email = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
				$employee_id = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
				$tin_num = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

				$div_code = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
				$job_title_code = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
				$employ_status = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
				$date_join = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
				$contact_num = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
				$work_shift = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
				$biometric_id = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
				$region_org_code = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
				$school_id = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
				$suffix = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
				$item_number = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
				$date_orig_appointment = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
				$school_name = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
				$employee_img = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
				$gender = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
				$age = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
				$tin_num = trim($tin_num);
				$employee_id = trim($employee_id);

				if(empty($tin_num)){
					continue;
				}else {

					$get_first_name = '';
					$get_same_emp_id = $db->query("SELECT first_name FROM info WHERE tin_num='$tin_num'");


					if($get_same_emp_id->num_rows < 1) {
						$sql  = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,per_address,";
						$sql .= "civil_status,role_type,email,employee_id,tin_num,div_code,job_title_code,employ_status,";
						$sql .= "date_join,contact_num,work_shift,biometric_id,region_org_code,school_id,suffix,item_number,";
						$sql .= "date_orig_appointment,school_name,employee_img,gender,age) ";
						$sql .= "VALUES('$title','$first_name','$middle_name','$last_name','$birth_date',";
						$sql .= "'$place_birth','$per_address','$civil_status','$role_type','$email','$employee_id','$tin_num',";
						$sql .= "'$div_code','$job_title_code','$employ_status','$date_join','$contact_num','$work_shift',";
						$sql .= "'$biometric_id','$region_org_code','$school_id','$suffix','$item_number',";
						$sql .= "'$date_orig_appointment','$school_name','$employee_img','$gender','$age')";


						$result = $db->query($sql);
					}else {
						$sql  = "UPDATE info SET title='$title', first_name='$first_name', middle_name='$middle_name',";
						$sql .= "last_name='$last_name', birth_date='$birth_date', place_birth='$place_birth', per_address='$per_address',";
						$sql .= "civil_status='$civil_status', role_type='$role_type', email='$email', employee_id='$employee_id',";
						$sql .= "tin_num='$tin_num', div_code='$div_code', job_title_code='$job_title_code', employ_status='$employ_status',";
						$sql .= "date_join='$date_join', contact_num='$contact_num', work_shift='$work_shift', biometric_id='$biometric_id',";
						$sql .= "region_org_code='$region_org_code', school_id='$school_id', suffix='$suffix', item_number='$item_number',";
						$sql .= "date_orig_appointment='$date_orig_appointment', school_name='$school_name', employee_img='$employee_img', ";
						$sql .= "gender='$gender', age='$age' WHERE tin_num = '$tin_num'";

						$result = $db->query($sql);
					}


						if($result) {
							$session->message("<script>Swal.fire('','Info imported successfully!','success');</script>");
							redirect('../backuptables.php');
						}
						
				}
			}	
		}
    }    



	
}else {

	$error .= "<script>alert('Something went wrong');</script>";

	
}


echo $error;


	}
}

?>

