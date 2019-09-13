<?php 
require_once 'includes/init.php';

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
$align = new Alignment();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A6', 'Hello World !');


// $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
// $drawing->setName('Logo');
// $drawing->setDescription('Logo');
// $drawing->setPath('resources/img/service_record_kagawaran.png');
// $drawing->setHeight(90);
// $drawing->setWorksheet($spreadsheet->getActiveSheet());

// $drawing->setCoordinates('A1');
// $drawing->setOffsetX(25);;
// $drawing->setOffsetY(15);       
// // $drawing->setRotation(25);
// $drawing->getShadow()->setVisible(true);
// $drawing->getShadow()->setDirection(45);


$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Logo');
$drawing->setDescription('Logo');
$drawing->setPath('resources/img/divoff_logo_bigger.png');
// $drawing->setHeight(140);
// $drawing->setWidth(300);
$drawing->setWidthAndHeight(1300,140);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing->setCoordinates('A1');
$drawing->setOffsetX(45);
// $drawing->setOffsetY(15);       
// $drawing->setRotation(25);

// $font::setAutoSizeMethod(AUTOSIZE_METHOD_EXACT);

$sheet->mergeCells('A8:N9');
$sheet->getStyle('A8:N9')->getAlignment()->setHorizontal('center');
$sheet->setCellValue('A8', 'SUMMARY OF INFORMATION');

$sheet->getStyle('A8')->getFont()->setBold(true);
$sheet->getStyle('A8')->getFont()->setSize(16);


$sheet->setCellValue('A10', 'NAME');
$sheet->setCellValue('B10', 'SCHOOL');
$sheet->setCellValue('C10', 'SCHOOL ID');
$sheet->setCellValue('D10', 'GENDER');
$sheet->setCellValue('E10', 'BIRTH DATE');
$sheet->setCellValue('F10', 'AGE');
$sheet->setCellValue('G10', 'ADDRESS');
$sheet->setCellValue('H10', 'CONTACT NO.');
$sheet->setCellValue('I10', 'POSITION');
$sheet->setCellValue('J10', 'EMPLOYEE NO.');
$sheet->setCellValue('K10', 'TIN NO.');
$sheet->setCellValue('L10', 'PAG-IBIG NO.');
$sheet->setCellValue('M10', 'PHILHEALTH NO.');
$sheet->setCellValue('N10', 'LBP ACCOUNT NO.');
$sheet->setCellValue('O10', 'LEVELS OF CIVIL SERVICE ELEGIBILITY');
$sheet->setCellValue('P10', 'GSIS BP NO.');
$sheet->setCellValue('Q10', 'PRC LICENSE');


$sheet->getStyle('A10:Q10')->getFont()->setBold(true);


// $sql  = "SELECT info.first_name,info.middle_name,info.last_name,info.school_name,info.school_id,info.gender,";
// $sql .= "info.birth_date,info.age,info.per_address,info.contact_num,info.employee_id,info.tin_num,";
// $sql .= "other_info.position,other_info.pag_ibig_no,other_info.philhealth_no,other_info.lbp_no ";
// $sql .= "FROM info INNER JOIN other_info ON info.tin_num = other_info.tin_num";

$sql  = "SELECT first_name,middle_name,last_name,school_name,school_id,gender,birth_date,age,";
$sql .= "per_address,contact_num,employee_id,tin_num FROM info";

$result = $db->query($sql);

$num_of_results = $result->num_rows;

if($num_of_results > 0) {



$starting_point = 11;

for ($i=0; $i < $num_of_results; $i++) {
	$row = $result->fetch_array();

	$sql_other_info = "SELECT position,pag_ibig_no,philhealth_no,lbp_no,gsis_no,prc_license,level_civil_service FROM other_info WHERE tin_num='".$row['tin_num']."'";

	$select_from_other_info = $db->query($sql_other_info);
	$other_info_row = $select_from_other_info->fetch_array();
	$full_name = $row['first_name'] ." ". $row['middle_name'] ." ". $row['last_name'];


		$sheet->setCellValue('A'.$starting_point, $full_name);
		$sheet->setCellValue('B'.$starting_point, $row['school_name']);
		$sheet->setCellValue('C'.$starting_point, $row['school_id']);
		$sheet->setCellValue('D'.$starting_point, $row['gender']);
		$sheet->setCellValue('E'.$starting_point, $row['birth_date']);
		$sheet->setCellValue('F'.$starting_point, $row['age']);
		$sheet->setCellValue('G'.$starting_point, $row['per_address']);
		$sheet->setCellValue('H'.$starting_point, $row['contact_num']);
		$sheet->setCellValue('I'.$starting_point, $other_info_row['position']);
		$sheet->setCellValue('J'.$starting_point, $row['employee_id']);
		$sheet->setCellValue('K'.$starting_point, $row['tin_num']);
		$sheet->setCellValue('L'.$starting_point, $other_info_row['pag_ibig_no']);
		$sheet->setCellValue('M'.$starting_point, $other_info_row['philhealth_no']);
		$sheet->setCellValue('N'.$starting_point, $other_info_row['lbp_no']);
		$sheet->setCellValue('O'.$starting_point, $other_info_row['level_civil_service']);
		$sheet->setCellValue('P'.$starting_point, $other_info_row['gsis_no']);
		$sheet->setCellValue('Q'.$starting_point, $other_info_row['prc_license']);

	$starting_point++;	

}



foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
        $sheet
                ->getColumnDimension($col)
                ->setAutoSize(true);
    } 

} else {
	$session->message("<script>Swal.fire('','Don\'t have any record yet!','warning');</script>");
	redirect("gen_all_pdf");
}

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Summary.Xlsx"');
header('Cache-Control: max-age=0');


$writer = IOFactory::createWriter($spreadsheet,'Xlsx');
$writer->save('php://output');