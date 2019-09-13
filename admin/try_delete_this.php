<?php 

require_once 'includes/init.php';

$sql  = "SELECT info.first_name,info.middle_name,info.last_name,info.school_name,info.school_id,info.gender,";
$sql .= "info.birth_date,info.age,info.per_address,info.contact_num,info.employee_id,info.tin_num,";
$sql .= "other_info.position,other_info.pag_ibig_no,other_info.philhealth_no,other_info.lbp_no ";
$sql .= "FROM info INNER JOIN other_info ON info.tin_num = other_info.tin_num";

$result = $db->query($sql);

echo "The num of results is : ".$result->num_rows . "<br>";

$row = $result->fetch_array();

print_r($row) . "<br>";

echo $row['first_name'] ." ". $row['middle_name'] ." ". $row['last_name'];