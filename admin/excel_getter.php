<?php
require_once 'includes/header.php';
require_once 'includes/init.php';
require_once '../vendor/autoload.php';
header('Content-Type: text/html; charset=utf-8');
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;	

use PhpOffice\PhpSpreadsheet\Calculation\DateTime;	

if(isset($_POST['import_excel'])){
	$error = '';
	$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){
  	 $targetPath = 'excel_file/'.$_FILES['file']['name'];	
  	 

 
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)){

if($_FILES["file"]["type"] == 'text/xls'){
	$inputFileType = 'Xls';
}else{
	$inputFileType = 'Xlsx';
}

// $inputFileType = 'Xlsx';
$inputFileName = $targetPath;
$reader = IOFactory::createReader($inputFileType);
$spreadsheet = $reader->load($inputFileName);


$title_col = '';
$first_name_col = '';
$middle_name_col = '';
$last_name_col = '';
$birth_date_col = '';


	foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
        $title_col = $worksheet->getCellByColumnAndRow(1, 1)->getValue();
        $first_name_col = $worksheet->getCellByColumnAndRow(2, 1)->getValue();
        $middle_name_col = $worksheet->getCellByColumnAndRow(3, 1)->getValue();
        $last_name_col = $worksheet->getCellByColumnAndRow(4, 1)->getValue();
        $birth_date_col = $worksheet->getCellByColumnAndRow(5, 1)->getValue();
    } 



if($title_col == 'Title' && $first_name_col == 'First Name' && $last_name_col == 'Last Name' && $birth_date_col == 'Birth Date (dd-mm-yyyy)'){
$first_name_arr = [];
foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
	$highesetRow = $worksheet->getHighestRow();

	for($row = 2; $row<=$highesetRow; $row++) {

		$title = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
		$first_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
		$middle_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
		$last_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

		if($worksheet->getCellByColumnAndRow(5, $row)->getValue() == '') {
			$birth_date = '';
		}else {
		$birth_date = date('m-d-Y', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($worksheet->getCellByColumnAndRow(5, $row)->getValue()));
		}
		$place_birth = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
		$role_type = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
		$email = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
		$employ_id = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
		$tin_num = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
		$div_code = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
		$job_title = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
		$employ_status = $worksheet->getCellByColumnAndRow(13, $row)->getValue();

		if($worksheet->getCellByColumnAndRow(14, $row)->getValue() == '') {
			$date_join = '';
		}else {
		$date_join = date('m-d-Y', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($worksheet->getCellByColumnAndRow(14, $row)->getValue()));
		}

		$contact_num = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
		$work_shift = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
		$biometric_id = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
		$region_org_code = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
		$school_id = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
		$suffix = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
		$item_number = $worksheet->getCellByColumnAndRow(21, $row)->getValue();

		if($worksheet->getCellByColumnAndRow(22, $row)->getValue() == '') {
			$date_orig_appointment = '';
		}else {
		$date_orig_appointment = date('m-d-Y', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($worksheet->getCellByColumnAndRow(22, $row)->getValue()));
		}

		// $check_if_not_empty = $db->query("SELECT employee_id FROM info");

		// if($check_if_not_empty->num_rows > 0) {
	
		// }
		if(empty($employ_id)){
			continue;
		}else {

			$get_first_name = '';
			$get_same_emp_id = $db->query("SELECT first_name FROM info WHERE employee_id='$employ_id'");

				while($get_first_name_row = $get_same_emp_id->fetch_array()) {
					$get_first_name = $get_first_name_row['first_name'];
				}

				if($get_first_name !== '')  {
					$first_name_arr[] = $get_first_name;
				}

			if(!empty($first_name_arr)) {
				// $error = "<script>Swal.fire('Oops...', 'Something went wrong!', 'error');</script>";
				$error = "<script>Swal.fire('Oops...','";
				foreach($first_name_arr as $db_first_name) :
					$error .= $db_first_name. ",";
				endforeach;
				$error .= " already exists','warning');</script>";
				// $error .= "<script>alert(Someone with the same employee ID already exists);</script>";
				continue;
			}else {
				$sql = "INSERT INTO info(title,first_name,middle_name,last_name,birth_date,place_birth,role_type,email,employee_id,tin_num,";
				$sql .= "div_code,job_title_code,employ_status,date_join,contact_num,work_shift,biometric_id,region_org_code,";
				$sql .= "school_id,suffix,item_number,date_orig_appointment) ";

				$sql .= "VALUES('".$title. "','". $first_name ."','" . $middle_name ."','" . $last_name."','" . $birth_date ."','";
				$sql .= "". $place_birth."','". $role_type  ."','". $email ."','" .$employ_id."','" . $tin_num ."','";
				$sql .= "".$div_code. "','".$job_title."','".$employ_status."','".$date_join."','".$contact_num."','";
				$sql .= "".$work_shift."','".$biometric_id."','".$region_org_code."','".$school_id."','".$suffix."','".$item_number."','";
				$sql .= "".$date_orig_appointment."')";


				$result = $db->query($sql);

				if($result) {
					redirect('employees.php');
				}

				if(!$result) {
					die('Query Failed ' . $db->error);
				}else {
					echo "It WOrks";
				}	
			}		
		}
	



	}	
}


	
}elseif($title_col == '' || $first_name_col == '' || $last_name_col == '' || $birth_date_col == '') {
	redirect('employees.php');
}else {
	// $error = "<script>Swal.fire('Please use the recommended file','warning');</script>";
	$error .= "<script>alert('Please use the recomended file');</script>";
	
	// redirect('employees.php');
	
}


echo $error;


	}
}

}



?>
<div style="right: 5px;">
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file" accept=".xls,.xlsx" style="display: block; right: 5px;" required="">
	<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-1"  type="submit" name="import_excel"><i class="fas fa-download fa-sm text-white-50"></i> Import Employees</button>
	</form>   
</div>
<!-- d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" -->
