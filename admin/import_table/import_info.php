<?php
// require_once '../includes/header.php';
require_once '../includes/init.php';
require_once '../../vendor/autoload.php';
header('Content-Type: text/html; charset=utf-8');
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;	

use PhpOffice\PhpSpreadsheet\Calculation\DateTime;	

// use \PhpOffice\PhpSpreadsheet\Reader\Csv;

if(isset($_POST['import_excel'])){
	$error = '';
	$allowedFileType = ['application/vnd.ms-excel','text/csv','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

  if(in_array($_FILES["file"]["type"],$allowedFileType)){
  	 $targetPath = '../excel_file/'.$_FILES['file']['name'];	
  	 

 
if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)){


	$inputFileType = 'csv';


// $inputFileType = 'Xlsx';
$inputFileName = $targetPath;
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
$spreadsheet = $reader->load($inputFileName);




foreach ($spreadsheet->getWorkSheetIterator() as $worksheet) {
	$highesetRow = $worksheet->getHighestRow();

	for($row = 2; $row<=$highesetRow; $row++) {

		$title = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
		$first_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
		$middle_name = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
		$last_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

		$birth_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
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


		if(empty($employee_id)){
			continue;
		}else {

				$sql = "INSERT INTO civil_service(employee_id,cs_exam,cs_passed_rating,cs_date_passed) ";
				$sql .= "VALUES('$employee_id','$cs_exam','$cs_passed_rating','$cs_date_passed')";


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


	
}else {
	// $error = "<script>Swal.fire('Please use the recommended file','warning');</script>";
	$error .= "<script>alert('Please use the recomended file');</script>";
	
	// redirect('employees.php');
	
}


echo $error;


	}
}




// $helper = new Sample();

// $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
// $reader = IOFactory::createReader($inputFileType);
// $helper->log('Turning Formatting off for Load');
// $reader->setReadDataOnly(true);
// $spreadsheet = $reader->load($inputFileName);
// $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
// 	var_dump($sheetData); exit;


// $sql = '';
// for($row=2; $row < count($sheetData); $row++) {
// 	$xx = "'" . implode("','", $sheetData[$row]) . "'";
// 	// $sql = "INSERT INTO info(title,first_name,last_name,role_type,email,employee_id,div_code,job_title_code,employ_status,";
// 	// $sql .= "date_join,contact_num,work_shift,biometric_id,region_org_code,school_id,suffix,item_number,date_orig_appointment) VALUES($xx)"; 

// 	if($conn->query($sql)) {
// 		echo "Its fucking successful";
// 	}else {
// 		echo "No, its not fucking successful bro";
// 	}

// }





// 
?>
<div style="right: 5px;">
	<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file" accept=".csv" style="display: block; right: 5px;" required="">
	<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-1"  type="submit" name="import_excel"><i class="fas fa-download fa-sm text-white-50"></i> Add Employee Info</button>
	</form>   
</div>
<!-- d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" -->
