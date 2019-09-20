<?php
require_once '../includes/init.php';

	$msg = '';
	$employee = '';
	$employee_type = '';
	$position = '';
	$result = '';
	$school_name = '';

	// if(isset($_GET['submit_search'])) {
		$employee_type = trim($db->fix_string($_GET['employee_type']));

		if($_GET['employee'] == "no_value") {
			$employee = '';
		}else {
			$employee  = trim($db->fix_string($_GET['employee']));
		}
		
			$position = trim($db->fix_string($_GET['position']));

		if($_GET['school_name'] == "no_value") {
			$school_name = '';
		}else {
			$school_name  = trim($db->fix_string($_GET['school_name']));
		}		

		if($employee_type == '' && $employee == '' && $position == '' && $school_name == '') {
			$msg = "No results found";
		}elseif($employee_type == '' && $employee == '' && $position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM other_info RIGHT JOIN info ON other_info.tin_num = info.tin_num WHERE school_name='".$school_name."'";
			$result = $db->query($sql);
		}elseif($employee_type == '' && $school_name == '' && $position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee='$employee'";
			$result = $db->query($sql);	
		}elseif($employee == '' && $school_name == '' && $position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee_type='$employee_type'";
			$result = $db->query($sql);	
		}elseif($employee == '' && $school_name == '' && $employee_type == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE position='$position'";
			$result = $db->query($sql);										
		}elseif ($school_name == '' && $employee == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee_type = '$employee_type' AND position='$position'";
			$result = $db->query($sql);
		}elseif ($school_name == '' && $employee_type == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee = '$employee' AND position='$position'";
			$result = $db->query($sql);									
		}elseif ($school_name == '' && $position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee_type = '$employee_type' AND employee='$employee'";
			$result = $db->query($sql);			
		}elseif ($employee_type == '' && $position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE school_name = '$school_name' AND employee='$employee'";
			$result = $db->query($sql);
		}elseif($employee == '' && $position == ''){
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE school_name='$school_name' AND employee_type='$employee_type'";
			$result = $db->query($sql);
		}elseif($employee_type == '' && $employee == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE school_name = '$school_name' AND position='$position'";
			$result = $db->query($sql);			
		}elseif($employee_type == ''){
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee='$employee' AND position='$position' AND school_name = '$school_name'";
			$result = $db->query($sql);
		}elseif($position == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE employee='$employee' AND employee_type='$employee_type' AND school_name='$school_name'";
			$result = $db->query($sql);
		}elseif($employee == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE position='$position' AND employee_type='$employee_type' AND school_name='$school_name'";
			$result = $db->query($sql);
		}elseif($school_name == '') {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE position='$position' AND employee_type='$employee_type' AND employee= '$employee'";
			$result = $db->query($sql);
		}else {
			$sql = "SELECT info.id,info.first_name,info.last_name,other_info.employee,other_info.employee_type,info.tin_num,other_info.position,info.school_name FROM info JOIN other_info ON info.tin_num = other_info.tin_num WHERE position='$position' AND employee_type='$employee_type' AND employee= '$employee' AND school_name='$school_name'";
			$result = $db->query($sql);
		}

		if($result !== '') {
			if($result->num_rows > 0) {
				$msg = $result->num_rows . " total results found";
				while($row = $result->fetch_array()) {				
					echo $position;
					echo "<tr>
							<td><a style='color: #000; font-weight: 700;' href='/divoffadmin/admin/mydetails/".$row['tin_num']."'>".$row['tin_num']."</a></td>
							<td>".$row['first_name']."</td>
							<td>".$row['last_name']."</td>
							<td>".$row['school_name']."</td>
							<td>".$row['employee']."</td>
							<td>".$row['employee_type']."</td>
							<td>".$row['position']."</td>
						  </tr>";
				}	
			}else {
				$msg = "No results found";
			}
		}
	// }
			                       
