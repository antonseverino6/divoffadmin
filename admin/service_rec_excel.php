<?php
require_once 'includes/init.php';
require_once '../vendor/autoload.php';
// header('Content-Type: text/html; charset=utf-8');

//load spreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call iofactory instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

if(isset($_POST['id'])){
    $tin_num = $_POST['id'];


//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("service_record.xls");

    
   
    $fetch_info = $db->query("SELECT employee_id,tin_num,last_name,first_name,middle_name,birth_date,place_birth FROM info WHERE tin_num = '$tin_num'");
    $info_row = $fetch_info->fetch_array();    
    // Info
    if($info_row['birth_date'] !== ''){
        $birthday_arr = explode("-",$info_row['birth_date']);
        $birth_date = date("F d, Y",strtotime($birthday_arr[2] ."-". $birthday_arr[0] ."-". $birthday_arr[1]));
    }else {
        $birth_date = '';
    }


    // $birth_date = date_format($true_birth_day,"F d, Y"); 
    $spreadsheet->getActiveSheet()->setCellValue('H7', $info_row['employee_id']);
    $spreadsheet->getActiveSheet()->setCellValue('H8', $info_row['tin_num']);
    $spreadsheet->getActiveSheet()->setCellValue('B11', $info_row['last_name']);
    $spreadsheet->getActiveSheet()->setCellValue('D11', $info_row['first_name']);
    $spreadsheet->getActiveSheet()->setCellValue('F11', $info_row['middle_name']);
    $spreadsheet->getActiveSheet()->setCellValue('B15', $birth_date);
    $spreadsheet->getActiveSheet()->setCellValue('D15', $info_row['place_birth']);
    
 
    

    

    
// CHILDREN    
$fetch_exp = $db->query("SELECT * FROM work_exp WHERE tin_num='$tin_num'");
$num_of_cells = array();
$no_exp = $fetch_exp->num_rows;

	$num_of_cells = range(24, 47);
    
    for($j = 0; $j < $no_exp; $j++){
    $exp_row = $fetch_exp->fetch_array();
        $spreadsheet->getActiveSheet()->setCellValue("F$num_of_cells[$j]", $exp_row['comp_name']);
        $spreadsheet->getActiveSheet()->setCellValue("E$num_of_cells[$j]", $exp_row['salary']);
        $spreadsheet->getActiveSheet()->setCellValue("D$num_of_cells[$j]", $exp_row['status']);
        $spreadsheet->getActiveSheet()->setCellValue("C$num_of_cells[$j]", $exp_row['designation']);
        $spreadsheet->getActiveSheet()->setCellValue("A$num_of_cells[$j]", $exp_row['exp_date_from']);
        $spreadsheet->getActiveSheet()->setCellValue("B$num_of_cells[$j]", $exp_row['exp_date_to']);
        $spreadsheet->getActiveSheet()->setCellValue("G$num_of_cells[$j]", $exp_row['branch']);
        $spreadsheet->getActiveSheet()->setCellValue("H$num_of_cells[$j]", $exp_row['leave_abs']);
        $spreadsheet->getActiveSheet()->setCellValue("I$num_of_cells[$j]", $exp_row['leave_abs_date']);
      
} 
     
    
//write it again to Filesystem with the same name (=replace)
if($info_row['middle_name'] == '') {
    $filename = $info_row['last_name']. $info_row['first_name'][0] .'.xlsx';
}else {
   $filename = $info_row['last_name']. $info_row['first_name'][0].$info_row['middle_name'][0].'.xlsx'; 
}


// Uncomment this if something went wrong

 $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet); // Uncomment this if something went wrong

 $writer->save('service_records/'. $filename); // Uncomment this if something went wrong




// header('Location: mydetails.php?id=' .$info_id);

}
?>
<form action="" method="post" id="service_record_form">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" id="submit_service_record" type="submit" name="submit_service_record"><i class="fas fa-download fa-sm text-white-50"></i> Generate Service Record</button>
</form>    