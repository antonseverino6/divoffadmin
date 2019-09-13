<?php
require_once '../includes/init.php';

	$msg = '';
	$employee = '';
	$employee_type = '';
	$position = '';
	$result = '';

	// if(isset($_GET['submit_search'])) {
		$employee_type = trim($db->fix_string($_GET['employee_type']));

		if($_GET['employee'] == "no_value") {
			$employee = '';
		}else {
			$employee  = trim($db->fix_string($_GET['employee']));
		}
		
		$position 	   = trim($db->fix_string($_GET['position']));

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
			if($result->num_rows == 1) {
				if($employee_type !== '' && $position !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\" Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($employee_type !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Employee : \"$employee\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($position !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Employee : \"$employee\", Position : \"$position\"</small></h3>";	
				}elseif($position !== '' && $employee_type !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($position !== '' && $employee_type !== '' && $employee !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($school_name !== '' && $employee !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Employee : \"$employee\"</small></h3>";
				}elseif($school_name !== '' && $employee_type !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($school_name !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for School Name : \"$school_name\", Position : \"$position\"</small></h3>";
				}elseif($employee !== '' && $employee_type !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Employee : \"$employee\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($employee !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Employee : \"$employee\", Position : \"$position\"</small></h3>";
				}elseif($employee_type !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($school_name !== ''){
					echo "<h3 class='page-header'>$result->num_rows" . " result found <small>for School Name : \"$school_name\"</small></h3>";	
				}elseif($employee !== ''){
					echo "<h3 class='page-header'>$result->num_rows" . " result found <small>for Employee : \"$employee\"</small></h3>";
				}elseif($employee_type !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Employee Type : \"$employee_type\"</small></h3>";
				}elseif($position !== '') {
					echo "<h3>$result->num_rows" . " result found <small>for Position : \"$position\"</small></h3>";
				}
			}elseif($result->num_rows > 1){
				if($employee_type !== '' && $position !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\" Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($employee_type !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Employee : \"$employee\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($position !== '' && $employee !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Employee : \"$employee\", Position : \"$position\"</small></h3>";	
				}elseif($position !== '' && $employee_type !== '' && $school_name !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($position !== '' && $employee_type !== '' && $employee !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($school_name !== '' && $employee !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Employee : \"$employee\"</small></h3>";
				}elseif($school_name !== '' && $employee_type !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($school_name !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for School Name : \"$school_name\", Position : \"$position\"</small></h3>";
				}elseif($employee !== '' && $employee_type !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Employee : \"$employee\", Employee Type : \"$employee_type\"</small></h3>";
				}elseif($employee !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Employee : \"$employee\", Position : \"$position\"</small></h3>";
				}elseif($employee_type !== '' && $position !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
				}elseif($school_name !== ''){
					echo "<h3 class='page-header'>$result->num_rows" . " results found <small>for School Name : \"$school_name\"</small></h3>";	
				}elseif($employee !== ''){
					echo "<h3 class='page-header'>$result->num_rows" . " results found <small>for Employee : \"$employee\"</small></h3>";
				}elseif($employee_type !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Employee Type : \"$employee_type\"</small></h3>";
				}elseif($position !== '') {
					echo "<h3>$result->num_rows" . " results found <small>for Position : \"$position\"</small></h3>";
				}
			}else {
				echo "<h3>No result found <small>for School Name : \"$school_name\" Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
			}
		}else {
			echo "<h3>No result found <small>for School Name : \"$school_name\" Employee : \"$employee\", Employee Type : \"$employee_type\", Position : \"$position\"</small></h3>";
		}
	// }
			                       
